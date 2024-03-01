<?php include_once "templates/header.php"; ?>

<h2>Historial de pedidos</h2>

<table>
    <thead>
        <tr>
            <th>ID Pedido</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Método de Pago</th>
            <th>Detalles</th> <!-- Columna para los botones de acción -->
        </tr>
    </thead>
    <tbody>
        <?php
        include_once "includes/db.php";

        // Consulta para obtener los pedidos
        $sql_pedidos = "SELECT * FROM pedidos";
        $result_pedidos = $conn->query($sql_pedidos);

        if ($result_pedidos->num_rows > 0) {
            // Iterar sobre cada pedido
            while ($pedido = $result_pedidos->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $pedido["ID_pedido"] . "</td>";
                echo "<td>" . $pedido["Fecha"] . "</td>";
                echo "<td>" . $pedido["Total"] . "</td>";
                echo "<td>" . $pedido["Estado"] . "</td>";
                echo "<td>" . $pedido["Metodo_pago"] . "</td>";
                echo "<td>
                        <a href='detalles_pedido.php?id=" . $pedido["ID_pedido"] . "'>Ver detalles</a>
                        
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay pedidos disponibles.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include_once "templates/footer.php"; ?>