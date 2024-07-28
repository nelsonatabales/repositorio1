<?php
require 'db_connect.php';

// Verificar si los datos del formulario han sido enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $habitaciones = $_POST['habitaciones'];
    $tarifa = $_POST['tarifa'];

    // Validaciones adicionales en el servidor
    if (empty($nombre) || empty($ubicacion) || empty($habitaciones) || empty($tarifa)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    if (!is_numeric($habitaciones) || $habitaciones <= 0) {
        echo "Habitaciones disponibles debe ser un número positivo.";
        exit();
    }

    if (!is_numeric($tarifa) || $tarifa <= 0) {
        echo "La tarifa por noche debe ser un número positivo.";
        exit();
    }

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nombre, $ubicacion, $habitaciones, $tarifa);

    if ($stmt->execute()) {
        echo "Hotel registrado exitosamente";
    } else {
        echo "Error al registrar el hotel: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>
