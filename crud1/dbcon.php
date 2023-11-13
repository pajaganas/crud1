<?php

$host = "127.0.0.1";
$port = "3307";
$dbname = "crud1";
$username = "root";
$password = "";

try {
    $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!";
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}

?>
