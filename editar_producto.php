<?php
// Incluir el archivo de conexión a la base de datos
include_once "includes/db.php";

// Verificar si se proporciona un ID de producto en la URL
if (isset($_GET['id'])) {
    // Obtener el ID del producto desde la URL
    $producto_id = $_GET['id'];
    
    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar los datos del formulario
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];
        $proveedor = $_POST["proveedor"];
        
        // Actualizar los detalles del producto en la base de datos
        $sql = "UPDATE productos SET Nombre_producto = '$nombre', Precio = '$precio', Stock = '$stock', Proveedor = '$proveedor' WHERE ID_producto = '$producto_id'";
        if ($conn->query($sql) === TRUE) {
            // Redirigir a la página de lista de productos después de la actualización exitosa
            header("Location: productos.php");
            exit(); 
        } else {
            echo "Error al actualizar el producto: " . $conn->error;
        }
    }
    
    // Obtener los detalles del producto con el ID proporcionado
    $sql_producto = "SELECT * FROM productos WHERE ID_producto = '$producto_id'";
    $result_producto = $conn->query($sql_producto);
    
    if ($result_producto->num_rows == 1) {
        // Obtener los datos del producto
        $row = $result_producto->fetch_assoc();
        $nombre_producto = $row["Nombre_producto"];
        $precio = $row["Precio"];
        $stock = $row["Stock"];
        $proveedor = $row["Proveedor"];
    } else {
        // Si no se encuentra ningún producto con el ID proporcionado, redirigir a la lista de productos
        header("Location: productos.php");
        exit(); 
    }
} else {
    // Si no se proporciona un ID de producto en la URL, redirigir a la lista de productos
    header("Location: productos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h1>Editar Producto</h1>
</header>

<main class="container">
    <form class="formulario" action="" method="post">
        <div class="input">
            <label class="label" for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre_producto; ?>" required>
        </div>
        <div class="input">
            <label class="label" for="precio">Precio:</label><br>
            <input type="number" id="precio" name="precio" value="<?php echo $precio; ?>" step="0.01" required>
        </div>
        <div class="input">
            <label class="label" for="stock">Stock:</label><br>
            <input type="number" id="stock" name="stock" value="<?php echo $stock; ?>" required>
        </div>
        <div class="input">
            <label class="label" for="proveedor">Proveedor:</label><br>
            <input type="text" id="proveedor" name="proveedor" value="<?php echo $proveedor; ?>" required>
        </div>
        <div class="input">
            <input type="submit" class="boton" value="Guardar Cambios">
        </div>
    </form>

    <a href="productos.php" class="volver">Volver</a>
</main>

<footer>
    <?php include_once "templates/footer.php"; ?>
</footer>

</body>
</html>