<?php
$servername = "127.0.0.1";
$username_DB = "admin_tiempo_maya";
$password_DB = "tiempo+Maya_2022";
$dbname = "tiempo_maya";

// Create connection
$conn = new mysqli($servername, $username_DB, $password_DB, $dbname, '3306');
if ($conn->connect_error) {
    echo 'Conexion fallida: ' . $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
} else {
    return $conn;
}
?>
