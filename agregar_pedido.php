<?php include_once "templates/header.php"; ?>

<h2 style="color: #336699; font-family: 'Arial', sans-serif;">Agregar Pedido</h2>

<form action="agregar_pedido.php" method="post" class="pedido-form">
    <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required>
    </div>

    <!-- Campo para mostrar y calcular el total del pedido -->
    <div class="form-group">
        <label for="total">Total:</label>
        <input type="number" id="total" name="total" step="0.01" readonly>
    </div>

    <div class="form-group">
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="Pendiente">Pendiente</option>
            <option value="En proceso">En proceso</option>
            <option value="Entregado">Entregado</option>
        </select>
    </div>

    <div class="form-group">
        <label for="metodo_pago">Método de Pago:</label>
        <select id="metodo_pago" name="metodo_pago" required>
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta de crédito">Tarjeta de crédito</option>
            <option value="Transferencia bancaria">Transferencia bancaria</option>
        </select>
    </div>

    <!-- Campo para agregar productos al pedido con cantidad -->
    <div class="form-group productos-container">
        <h3 style="color: #336699; font-family: 'Arial', sans-serif;">Productos</h3>
        <?php
        include_once "includes/db.php";

        $sql = "SELECT ID_producto, Nombre_producto, Precio FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='producto'>";
                echo "<label for='producto_" . $row["ID_producto"] . "'>" . $row["Nombre_producto"] . ":</label>";
                echo "<input type='number' class='cantidad' id='producto_" . $row["ID_producto"] . "' name='cantidades[" . $row["ID_producto"] . "]' min='1' required>";
                echo "<div class='precio-container'><span class='precio' data-precio='" . $row["Precio"] . "'>$" . $row["Precio"] . "</span></div>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay productos disponibles.</p>";
        }
        ?>
    </div>

    <!-- Botón para calcular el total del pedido -->
    <button type="button" id="calcularTotal">Calcular Total</button>

    <!-- Botón de agregar pedido -->
    <input type="submit" value="Agregar Pedido">

    <!-- Botón de volver -->
    <div class="button-container">
        <a href="index.php" class="styled-button">Volver</a>
    </div>
</form>

<?php include_once "templates/footer.php"; ?>

<script src="js/scripts.js"></script>

<?php
include_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $fecha = $_POST["fecha"];
    $total = $_POST["total"];
    $estado = $_POST["estado"];
    $metodo_pago = $_POST["metodo_pago"];
    $cantidades = $_POST["cantidades"];

    // Insertar el pedido en la base de datos
    $sql_pedido = "INSERT INTO pedidos (Fecha, Total, Estado, Metodo_pago) VALUES ('$fecha', '$total', '$estado', '$metodo_pago')";
    if ($conn->query($sql_pedido) === TRUE) {
        // Obtener el ID del pedido recién insertado
        $pedido_id = $conn->insert_id;

        // Insertar los productos del pedido en la tabla detalle_pedido
        foreach ($cantidades as $producto_id => $cantidad) {
            // Si la cantidad es vacía o 0, se establece en 1 por defecto
            if (empty($cantidad) || $cantidad == 0) {
                $cantidad = 1;
            }
            $sql_detalle = "INSERT INTO detalle_pedido (ID_pedido, ID_producto, Cantidad) VALUES ('$pedido_id', '$producto_id', '$cantidad')";
            $conn->query($sql_detalle);
        }

        echo "<p>Pedido agregado exitosamente.</p>";
    } else {
        echo "Error al agregar el pedido: " . $conn->error;
    }
}

?>