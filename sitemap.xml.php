<?php
/**
 * Sitemap.xml dinámico
 * Genera sitemap automático con todas las páginas del sitio
 */

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';

// Fecha última modificación (hoy)
$lastmod = date('Y-m-d');

// Base URL
$base_url = 'https://praxisseguridad.es';

// Lista de páginas estáticas
$paginas_estaticas = [
    ['url' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
    ['url' => '/servicios.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['url' => '/cotizador.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['url' => '/conocimiento.php', 'priority' => '0.8', 'changefreq' => 'weekly'],
    ['url' => '/contacto.php', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['url' => '/sobre-nosotros.php', 'priority' => '0.6', 'changefreq' => 'monthly'],
    
    // Páginas de alarmas
    ['url' => '/alarmas-murcia.php', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['url' => '/alarmas-cartagena.php', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['url' => '/alarmas-molina-segura.php', 'priority' => '0.8', 'changefreq' => 'monthly'],
    
    // Páginas legales
    ['url' => '/legal/privacidad.php', 'priority' => '0.3', 'changefreq' => 'yearly'],
    ['url' => '/legal/cookies.php', 'priority' => '0.3', 'changefreq' => 'yearly'],
    ['url' => '/legal/aviso-legal.php', 'priority' => '0.3', 'changefreq' => 'yearly'],
];

// Ciudades (páginas SEO locales)
$ciudades = [
    // Murcia
    'seguridad-en-murcia',
    'seguridad-molina-segura',
    'seguridad-alcantarilla',
    'seguridad-torres-cotillas',
    'seguridad-abanilla',
    'seguridad-fortuna',
    
    // Alicante
    'seguridad-alicante',
    'seguridad-orihuela',
    'seguridad-torrevieja',
    'seguridad-elche',
    
    // Valencia
    'seguridad-valencia',
    
    // Almería
    'seguridad-almeria'
];

?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<?php foreach ($paginas_estaticas as $pagina): ?>
    <url>
        <loc><?php echo $base_url . $pagina['url']; ?></loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq><?php echo $pagina['changefreq']; ?></changefreq>
        <priority><?php echo $pagina['priority']; ?></priority>
    </url>
<?php endforeach; ?>

<?php foreach ($ciudades as $ciudad): ?>
    <url>
        <loc><?php echo $base_url . '/' . $ciudad . '/'; ?></loc>
        <lastmod><?php echo $lastmod; ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
<?php endforeach; ?>

</urlset>
