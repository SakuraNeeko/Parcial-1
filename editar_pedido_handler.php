<?php
include_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se proporcionó un ID de pedido válido
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $pedido_id = $_POST['id'];

        // Recuperar los datos del formulario
        $fecha = $_POST['fecha'];
        $total = $_POST['total'];
        $estado = $_POST['estado'];

        // Preparar la consulta SQL para actualizar el pedido
        $sql = "UPDATE pedidos SET Fecha='$fecha', Total='$total', Estado='$estado' WHERE ID_pedido = $pedido_id";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            // Si la actualización fue exitosa, redirigir a la página de detalles del pedido con un mensaje de éxito
            session_start();
            $_SESSION['success_message'] = "El pedido se actualizó correctamente.";
            header("Location: detalles_pedido.php?id=$pedido_id");
            exit();
        } else {
            // Si ocurrió un error durante la actualización, redirigir a la página de detalles del pedido con un mensaje de error
            session_start();
            $_SESSION['error_message'] = "Error al actualizar el pedido: " . $conn->error;
            header("Location: detalles_pedido.php?id=$pedido_id");
            exit();
        }
    } else {
        // Si no se proporcionó un ID de pedido válido, redirigir a la página de detalles del pedido con un mensaje de error
        session_start();
        $_SESSION['error_message'] = "El ID de pedido no es válido.";
        header("Location: detalles_pedido.php?id=$pedido_id");
        exit();
    }
} else {
    // Si se intenta acceder directamente a este script sin enviar datos por POST, redirigir a la página de detalles del pedido con un mensaje de error
    session_start();
    $_SESSION['error_message'] = "Acceso no permitido.";
    header("Location: detalles_pedido.php?id=$pedido_id");
    exit();
}
?>