<?php
// classic-php-site/includes/db.php
// Simple MySQL database connection for the classic PHP site.
$databaseHost = 'localhost';
$databaseUser = 'root';
$databasePass = '';
$databaseName = 'classic_php_site';

$mysqli = new mysqli($databaseHost, $databaseUser, $databasePass, $databaseName);
if ($mysqli->connect_errno) {
    $dbErrorMessage = 'Database connection failed: ' . $mysqli->connect_error;
    $mysqli = null;
} else {
    $mysqli->set_charset('utf8mb4');
}
