<?php
$servername = "localhost";
$username = "root";
$password = ""; // Cambia esto si tu configuración de MySQL tiene una contraseña
$dbname = "AGENCIA";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// echo "Conexión exitosa a la base de datos AGENCIA";
?>
