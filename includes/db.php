
<?php
// Database connection function
function getDbConnection() {
    try {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        // For a production site, you'd want to log this error instead of displaying it
        if (DEBUG_MODE) {
            die('Database Connection Error: ' . $e->getMessage());
        } else {
            die('A database error occurred. Please try again later.');
        }
    }
}

// Note: In this implementation, we're not actually connecting to a database
// since we're using static data. This file is here for future expansion.
