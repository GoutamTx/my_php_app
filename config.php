<?php
define('DB_SERVER', 'mysql');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'demo');

// Enable error reporting for debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($link, 'utf8mb4');
    echo "Connected successfully"; // Remove in production
} catch (mysqli_sql_exception $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
