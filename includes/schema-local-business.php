<?php
/**
 * Schema.org LocalBusiness Markup
 * Mejora el SEO local y la visibilidad en Google
 */

$business_name = "Praxis Seguridad";
$business_description = "Consultoría estratégica en seguridad privada en Murcia. Especialistas en alarmas, CCTV, control de accesos y auditorías de seguridad. Servicio profesional en toda la Región de Murcia.";
$business_url = "https://praxisseguridad.es";
$business_logo = "https://praxisseguridad.es/images/logo-praxis.png";
$business_phone = "+34637474428";
$business_email = "info@praxisseguridad.es";

// Servicios ofrecidos
$services = [
    "Instalación de alarmas",
    "Sistemas CCTV",
    "Consultoría de seguridad",
    "Auditoría de riesgos",
    "Control de accesos",
    "Protección de datos (DPO)",
    "Peritaje judicial",
    "Vigilancia profesional"
];

// Área de servicio
$service_areas = [
    "Murcia",
    "Santomera",
    "Cartagena",
    "Lorca",
    "Molina de Segura",
    "Orihuela",
    "Alcantarilla",
    "Región de Murcia"
];

$schema = [
    "@context" => "https://schema.org",
    "@type" => "LocalBusiness",
    "name" => $business_name,
    "description" => $business_description,
    "url" => $business_url,
    "logo" => $business_logo,
    "telephone" => $business_phone,
    "email" => $business_email,
    
    // Categorías de negocio
    "@id" => $business_url,
    "additionalType" => [
        "https://schema.org/ProfessionalService",
        "https://schema.org/HomeAndConstructionBusiness"
    ],
    
    // Dirección
    "address" => [
        "@type" => "PostalAddress",
        "addressLocality" => "Santomera",
        "addressRegion" => "Murcia",
        "postalCode" => "30140",
        "addressCountry" => "ES"
    ],
    
    // Geolocalización
    "geo" => [
        "@type" => "GeoCoordinates",
        "latitude" => "38.0611",
        "longitude" => "-1.0475"
    ],
    
    // Área de servicio
    "areaServed" => array_map(function($area) {
        return [
            "@type" => "City",
            "name" => $area
        ];
    }, $service_areas),
    
    // Servicios ofrecidos
    "hasOfferCatalog" => [
        "@type" => "OfferCatalog",
        "name" => "Servicios de Seguridad",
        "itemListElement" => array_map(function($service) use ($business_url) {
            return [
                "@type" => "Offer",
                "itemOffered" => [
                    "@type" => "Service",
                    "name" => $service
                ]
            ];
        }, $services)
    ],
    
    // Horario
    "openingHoursSpecification" => [
        [
            "@type" => "OpeningHoursSpecification",
            "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            "opens" => "09:00",
            "closes" => "18:00"
        ]
    ],
    
    // Redes sociales
    "sameAs" => [
        "https://www.linkedin.com/in/juan-luis-palazón-nicolás-1385581b2/",
        "https://www.instagram.com/juanlupalazon/",
        "https://x.com/JuanluTropez",
        "https://t.me/Praxis_bot"
    ],
    
    // Precio
    "priceRange" => "€€",
    
    // Idiomas
    "availableLanguage" => ["Spanish"],
    
    // Métodos de pago
    "paymentAccepted" => ["Cash", "Credit Card", "Bank Transfer"],
    
    // Características
    "slogan" => "Pensamos antes de instalar"
];

// Agregar breadcrumbs si estamos en una página específica
if (isset($current_page) && $current_page !== 'inicio') {
    $breadcrumb_schema = [
        "@context" => "https://schema.org",
        "@type" => "BreadcrumbList",
        "itemListElement" => [
            [
                "@type" => "ListItem",
                "position" => 1,
                "name" => "Inicio",
                "item" => $business_url
            ]
        ]
    ];
    
    // Añadir página actual
    $page_names = [
        'servicios' => 'Servicios',
        'contacto' => 'Contacto',
        'sobre-mi' => 'Sobre Mí',
        'casos-exito' => 'Casos de Éxito',
        'tienda' => 'Tienda',
        'faq' => 'Preguntas Frecuentes',
        'conocimiento' => 'Centro de Conocimiento'
    ];
    
    if (isset($page_names[$current_page])) {
        $breadcrumb_schema['itemListElement'][] = [
            "@type" => "ListItem",
            "position" => 2,
            "name" => $page_names[$current_page],
            "item" => $business_url . "/" . $current_page . ".php"
        ];
    }
}
?>

<!-- Schema.org LocalBusiness Markup -->
<script type="application/ld+json">
<?php echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
</script>

<?php if (isset($breadcrumb_schema)): ?>
<!-- Schema.org Breadcrumb Markup -->
<script type="application/ld+json">
<?php echo json_encode($breadcrumb_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
</script>
<?php endif; ?>

<?php
// Si estamos en la página de servicios, añadir schema adicional para cada servicio
if (isset($current_page) && $current_page === 'servicios') {
    $service_schema = [
        "@context" => "https://schema.org",
        "@type" => "Service",
        "serviceType" => "Servicios de Seguridad Privada",
        "provider" => [
            "@type" => "LocalBusiness",
            "name" => $business_name,
            "url" => $business_url
        ],
        "areaServed" => [
            "@type" => "State",
            "name" => "Región de Murcia"
        ],
        "hasOfferCatalog" => [
            "@type" => "OfferCatalog",
            "name" => "Catálogo de Servicios de Seguridad",
            "itemListElement" => array_map(function($service) {
                return [
                    "@type" => "Offer",
                    "itemOffered" => [
                        "@type" => "Service",
                        "name" => $service
                    ]
                ];
            }, $services)
        ]
    ];
    ?>
    <!-- Schema.org Service Markup -->
    <script type="application/ld+json">
    <?php echo json_encode($service_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>
    <?php
}
?>
