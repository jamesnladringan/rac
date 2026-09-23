<?php

$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$db   = getenv('MYSQLDATABASE');
$port = getenv('MYSQLPORT') ?: 3306;

if (!$host || !$user || !$db) {
    die(
        "Missing database environment variables. " .
        "HOST=" . ($host ? "OK" : "MISSING") . " | " .
        "USER=" . ($user ? "OK" : "MISSING") . " | " .
        "DATABASE=" . ($db ? "OK" : "MISSING") . " | " .
        "PORT=" . $port
    );
}

try {
    $conn = new PDO(
        "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4",
        $user,
        $pass
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

