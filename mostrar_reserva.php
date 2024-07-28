<?php
require 'db_connect.php';

echo "<h1>Contenido de la Tabla RESERVA</h1>";

$result = $conn->query("SELECT * FROM RESERVA");
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID Reserva</th>
                <th>ID Cliente</th>
                <th>Fecha de Reserva</th>
                <th>ID Vuelo</th>
                <th>ID Hotel</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_reserva']}</td>
                <td>{$row['id_cliente']}</td>
                <td>{$row['fecha_reserva']}</td>
                <td>{$row['id_vuelo']}</td>
                <td>{$row['id_hotel']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay reservas registradas.";
}

$conn->close();
?>