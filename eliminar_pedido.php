<?php
include_once "includes/db.php";

// Verificar si se proporcionó un ID de pedido válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pedido_id = $_GET['id'];

    // Consulta para eliminar el pedido con el ID proporcionado
    $sql = "DELETE FROM pedidos WHERE ID_pedido = $pedido_id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Pedido eliminado correctamente.</p>";
    } else {
        echo "Error al eliminar el pedido: " . $conn->error;
    }
} else {
    echo "<p>El ID de pedido no es válido.</p>";
}

// Redireccionar a la página de pedidos después de eliminar
header("Location: index.php");
exit();
?>