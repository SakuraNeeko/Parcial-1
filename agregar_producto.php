<?php
// Incluir el archivo de conexión a la base de datos
include_once "includes/db.php";

// Verificar si se ha enviado el formulario de agregar producto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $proveedor = $_POST["proveedor"];
    
    // Insertar el nuevo producto en la base de datos
    $sql = "INSERT INTO productos (Nombre_producto, Precio, Stock, Proveedor) VALUES ('$nombre', '$precio', '$stock', '$proveedor')";
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de lista de productos después de la inserción exitosa
        header("Location: productos.php");
        exit(); 
    } else {
        echo "Error al agregar el producto: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Agregar Nuevo Producto</h2>

<form action="" method="post">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>
    
    <label for="precio">Precio:</label><br>
    <input type="number" id="precio" name="precio" step="0.01" required><br><br>
    
    <label for="stock">Stock:</label><br>
    <input type="number" id="stock" name="stock" required><br><br>
    
    <label for="proveedor">Proveedor:</label><br>
    <input type="text" id="proveedor" name="proveedor" required><br><br>
    
    <input type="submit" value="Agregar Producto">
</form>

<a href="productos.php">Volver</a>

</body>
</html>

<?php include_once "templates/footer.php"; ?>
