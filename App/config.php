<?php

// Configuraci贸n de la base de datos
define('DB_HOST', 'localhost');

//define('DB_NAME', 'richardc_wp171');
define('DB_NAME', 'bddrichardcalderon');

// Otras configuraciones
define('APP_NAME', 'MiAplicacionMVC');
$ipServidor = $_SERVER['SERVER_ADDR'];

// Define la constante BASE_URL según el entorno
if ($ipServidor == '127.0.0.1' || $ipServidor == '::1') {
    // Entorno local
    define('BASE_URL', 'http://localhost/');
    define('DB_USER', 'root');
    define('DB_PASS', '');
} else {
    // Otro entorno (por ejemplo, servidor de hosting)
    define('BASE_URL', 'https://richardcc.cl/');
    define('DB_USER', 'richardc_examen');
    define('DB_PASS', 'nimda101112admin');
}

define('HOME_URL', BASE_URL . '/');
define('ADMIN_URL', BASE_URL . 'admin/');
define('RECEPCION_DIAGNOSTICO_URL', BASE_URL . 'recepcion/');
define('TINCION_URL', BASE_URL . 'tincion/');
define('DIAGNOSTICO_URL', BASE_URL . 'diagnostico/');
define('ACCESO_CLIENTE_URL', BASE_URL . 'accesoCliente/');
define('SERVICIOS_URL', BASE_URL . 'servicios');
define('PREGUNTAS_FRECUENTES_URL', BASE_URL . 'preguntas');

// Configuraci贸n de rutas
define('CONTROLLERS_PATH', __DIR__ . '/Controllers/');
define('MODELS_PATH', __DIR__ . '/Models/');
define('VIEWS_PATH', __DIR__ . '/Views/');
define('APP_PATH', __DIR__ . '/');
define('PUBLIC_PATH',  '/');
