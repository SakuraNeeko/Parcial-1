<?php
// Configuración de la conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "gestion_pedidos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}
?>