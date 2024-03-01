<?php
// Verificar si se ha enviado el ID del producto a eliminar
if (isset($_GET['id'])) {
    // Obtener el ID del producto a eliminar
    $id_producto = $_GET['id'];
    
    // Incluir el archivo de conexión a la base de datos
    include_once "includes/db.php";
    
    // Query para eliminar el producto
    $sql = "DELETE FROM productos WHERE ID_producto = $id_producto";
    
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de productos después de eliminar el producto
        header("Location: productos.php");
        exit(); 
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
} else {
    // Si no se proporciona el ID del producto, redirigir a la página de productos
    header("Location: productos.php");
    exit();
}
?>