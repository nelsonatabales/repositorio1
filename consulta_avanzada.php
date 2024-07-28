<?php
require 'db_connect.php';

echo "<h1>Hoteles con más de dos reservas</h1>";

$sql = "SELECT H.nombre, H.ubicación, COUNT(R.id_reserva) AS num_reservas
        FROM HOTEL H
        JOIN RESERVA R ON H.id_hotel = R.id_hotel
        GROUP BY H.id_hotel
        HAVING COUNT(R.id_reserva) > 2";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Nombre del Hotel</th>
                <th>Ubicación</th>
                <th>Número de Reservas</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nombre']}</td>
                <td>{$row['ubicación']}</td>
                <td>{$row['num_reservas']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay hoteles con más de dos reservas.";
}

$conn->close();
?>
