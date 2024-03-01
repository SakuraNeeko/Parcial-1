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
        <h2>Editar Pedido - ID <?php echo $pedido["ID_pedido"]; ?></h2>

        <!-- Formulario de edición -->
        <form action="editar_pedido_handler.php" method="post">
            <!-- Campo oculto para enviar el ID de pedido -->
            <input type="hidden" name="id" value="<?php echo $pedido_id; ?>">

            <!-- Campos del formulario -->
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo $pedido['Fecha']; ?>" required>
            <br><br>
            <label for="total">Total:</label>
            <input type="number" id="total" name="total" value="<?php echo $pedido['Total']; ?>" step="0.01" required>
            <br><br>
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="Pendiente" <?php if ($pedido['Estado'] === 'Pendiente') echo 'selected'; ?>>Pendiente</option>
                <option value="En proceso" <?php if ($pedido['Estado'] === 'En proceso') echo 'selected'; ?>>En proceso</option>
                <option value="Entregado" <?php if ($pedido['Estado'] === 'Entregado') echo 'selected'; ?>>Entregado</option>
            </select>
            <br><br>
            <!-- Botón de envío -->
            <input type="submit" value="Guardar Cambios">
        </form>
<?php
    } else {
        echo "<p>No se encontró ningún pedido con el ID: $pedido_id</p>";
    }
} else {
    echo "<p>El ID de pedido no es válido.</p>";
}

include_once "templates/footer.php";
?>
