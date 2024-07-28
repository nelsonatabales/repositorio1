<?php
require 'db_connect.php';

// Verificar si los datos del formulario han sido enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST['id_cliente'];
    $fecha_reserva = $_POST['fecha_reserva'];
    $id_vuelo = $_POST['id_vuelo'];
    $id_hotel = $_POST['id_hotel'];

    // Validaciones adicionales en el servidor
    if (empty($id_cliente) || empty($fecha_reserva) || empty($id_vuelo) || empty($id_hotel)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isii", $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel);

    if ($stmt->execute()) {
        echo "Reserva registrada exitosamente";
    } else {
        echo "Error al registrar la reserva: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>

