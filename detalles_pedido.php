<?php
include_once "includes/db.php";
include_once "templates/header.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pedido_id = $_GET['id'];

    // Consulta para obtener los detalles del pedido con el ID proporcionado
    $sql = "SELECT * FROM pedidos WHERE ID_pedido = $pedido_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $pedido = $result->fetch_assoc();
?>
        <h2>Detalles del Pedido - ID <?php echo $pedido["ID_pedido"]; ?></h2>

        <!-- Mostrar detalles del pedido -->
        <p><strong>Fecha:</strong> <?php echo $pedido['Fecha']; ?></p>
        <p><strong>Total:</strong> <?php echo $pedido['Total']; ?></p>
        <p><strong>Estado:</strong> <?php echo $pedido['Estado']; ?></p>
        <p><strong>Método de Pago:</strong> <?php echo $pedido['Metodo_pago']; ?></p>

        <!-- Botones de acción -->
        <div class="button-container">
            <a href="index.php" class="styled-button">Volver</a>
            <a href="editar_pedido.php?id=<?php echo $pedido["ID_pedido"]; ?>" class="styled-button">Editar</a>
        </div>

        <!-- Mostrar los detalles de los productos en una tabla -->
        <h3>Productos</h3>
        <table border='1'>
            <tr><th>ID Producto</th><th>Nombre</th><th>Precio</th><th>Cantidad</th></tr>
            <?php
            // Consulta para obtener los detalles de los productos asociados al pedido
            $sql_productos = "SELECT dp.ID_producto, dp.Cantidad, pr.Nombre_producto, pr.Precio FROM detalle_pedido dp
                                INNER JOIN productos pr ON dp.ID_producto = pr.ID_producto
                                WHERE dp.ID_pedido = $pedido_id";
            $result_productos = $conn->query($sql_productos);

            if ($result_productos->num_rows > 0) {
                while ($producto = $result_productos->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $producto["ID_producto"] . "</td>";
                    echo "<td>" . $producto["Nombre_producto"] . "</td>";
                    echo "<td>$" . $producto["Precio"] . "</td>";
                    echo "<td>" . $producto["Cantidad"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay productos asociados a este pedido.</td></tr>";
            }
            ?>
        </table>
<?php
    } else {
        echo "<p>No se encontró ningún pedido con el ID: $pedido_id</p>";
    }
} else {
    echo "<p>El ID de pedido no es válido.</p>";
}

include_once "templates/footer.php";
?>