<?php
/**
 * Conexión a Base de Datos - Supabase
 * Praxis Seguridad
 */

// Configuración de Supabase
define('SUPABASE_URL', 'https://eqcgbxovacnlhqjoiwsb.supabase.co');
define('SUPABASE_ANON_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVxY2dieG92YWNubGhxam9pd3NiIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Njg4ODIwNTAsImV4cCI6MjA4NDQ1ODA1MH0.91pHDN_6vWyPqRmBPm3lXJKbLLdKfYVwGJhvEQpwyPE');

/**
 * Realiza una query a Supabase REST API
 * 
 * @param string $table Nombre de la tabla
 * @param string $method GET, POST, PATCH, DELETE
 * @param array $data Datos para POST/PATCH
 * @param string $query Query params adicionales (ej: "select=*&id=eq.1")
 * @return array Response con ['success' => bool, 'data' => array, 'error' => string]
 */
function supabase_query($table, $method = 'GET', $data = null, $query = '') {
    $url = SUPABASE_URL . '/rest/v1/' . $table;
    
    if ($query) {
        $url .= '?' . $query;
    }
    
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'apikey: ' . SUPABASE_ANON_KEY,
            'Authorization: Bearer ' . SUPABASE_ANON_KEY,
            'Content-Type: application/json',
            'Prefer: return=representation'
        ],
        CURLOPT_TIMEOUT => 30
    ]);
    
    // Método y datos
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    } elseif ($method === 'PATCH') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    } elseif ($method === 'DELETE') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    }
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        return [
            'success' => false,
            'data' => null,
            'error' => $error,
            'http_code' => $httpCode
        ];
    }
    
    $data = json_decode($response, true);
    
    if ($httpCode >= 200 && $httpCode < 300) {
        return [
            'success' => true,
            'data' => $data,
            'error' => null,
            'http_code' => $httpCode
        ];
    } else {
        return [
            'success' => false,
            'data' => null,
            'error' => $response,
            'http_code' => $httpCode
        ];
    }
}

/**
 * Ejecuta SQL directo en Supabase (requiere función RPC o SQL Editor)
 * Nota: Para CREATE TABLE necesitas usar el SQL Editor de Supabase directamente
 */
function supabase_rpc($function_name, $params = []) {
    $url = SUPABASE_URL . '/rest/v1/rpc/' . $function_name;
    
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($params),
        CURLOPT_HTTPHEADER => [
            'apikey: ' . SUPABASE_ANON_KEY,
            'Authorization: Bearer ' . SUPABASE_ANON_KEY,
            'Content-Type: application/json'
        ],
        CURLOPT_TIMEOUT => 30
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        return [
            'success' => false,
            'data' => null,
            'error' => $error
        ];
    }
    
    $data = json_decode($response, true);
    
    return [
        'success' => ($httpCode >= 200 && $httpCode < 300),
        'data' => $data,
        'error' => ($httpCode >= 400) ? $response : null,
        'http_code' => $httpCode
    ];
}

/**
 * Wrapper para compatibilidad con código MySQL
 * Simula mysqli para facilitar migración
 */
function get_db_connection() {
    // Retorna objeto con métodos compatibles
    return new SupabaseConnection();
}

class SupabaseConnection {
    public function prepare($query) {
        return new SupabasePreparedStatement($query);
    }
    
    public function query($sql) {
        // Nota: Supabase no ejecuta SQL directo desde PHP
        // Necesitas usar el SQL Editor o crear RPC functions
        throw new Exception('Use supabase_query() or supabase_rpc() instead of direct SQL');
    }
}

class SupabasePreparedStatement {
    private $query;
    private $params = [];
    
    public function __construct($query) {
        $this->query = $query;
    }
    
    public function bind_param($types, ...$vars) {
        $this->params = $vars;
        return true;
    }
    
    public function execute() {
        // Parsear query y convertir a Supabase REST API call
        // Esta es una implementación simplificada
        // En producción, necesitarías un parser más robusto
        
        if (preg_match('/INSERT INTO (\w+)/', $this->query, $matches)) {
            $table = $matches[1];
            // Necesitarías parsear los campos y valores
            // Por ahora, lanzar excepción
            throw new Exception('Use supabase_query() for INSERT operations');
        }
        
        if (preg_match('/SELECT .* FROM (\w+)/', $this->query, $matches)) {
            $table = $matches[1];
            throw new Exception('Use supabase_query() for SELECT operations');
        }
        
        return false;
    }
    
    public function get_result() {
        return new SupabaseResult([]);
    }
}

class SupabaseResult {
    private $data;
    public $num_rows;
    
    public function __construct($data) {
        $this->data = $data;
        $this->num_rows = count($data);
    }
    
    public function fetch_assoc() {
        return array_shift($this->data);
    }
}
