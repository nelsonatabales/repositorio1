<?php
require 'db_connect.php';

// Verificar si los datos del formulario han sido enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $plazas = $_POST['plazas'];
    $precio = $_POST['precio'];

    // Validaciones adicionales en el servidor
    if (empty($origen) || empty($destino) || empty($fecha) || empty($plazas) || empty($precio)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    if (!is_numeric($plazas) || $plazas <= 0) {
        echo "Plazas disponibles debe ser un número positivo.";
        exit();
    }

    if (!is_numeric($precio) || $precio <= 0) {
        echo "El precio debe ser un número positivo.";
        exit();
    }

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssid", $origen, $destino, $fecha, $plazas, $precio);

    if ($stmt->execute()) {
        echo "Vuelo registrado exitosamente";
    } else {
        echo "Error al registrar el vuelo: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>
