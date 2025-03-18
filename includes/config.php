<?php
// Site configuration
define('SITE_NAME', 'Carlot');
define('SITE_URL', 'http://localhost');
define('ADMIN_EMAIL', 'admin@carlot.com');

// Database configuration (update with your actual database credentials)
define('DB_HOST', 'localhost');
define('DB_NAME', 'carlot_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Other configurations
define('DEBUG_MODE', true);

// Error reporting
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Session start
session_start();
