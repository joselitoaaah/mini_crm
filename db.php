<?php
// db.php – Conexión para XAMPP

$host = 'localhost';
$user = 'root';      // Usuario por defecto en XAMPP
$password = '';      // Sin contraseña por defecto
$database = 'mini_crm'; // Asegúrate de que esta base exista

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("❌ Conexión fallida: " . $conn->connect_error);
}
?>
