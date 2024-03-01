<?php include_once "templates/header.php"; ?>

<h2>Lista de Productos</h2>

<!-- Formulario para agregar productos -->
<form action="agregar_producto.php" method="post">
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

<table style="margin-bottom: 20px;">
    <thead>
        <tr>
            <th>ID Producto</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Proveedor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once "includes/db.php";

        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID_producto"] . "</td>";
                echo "<td>" . $row["Nombre_producto"] . "</td>";
                echo "<td>" . $row["Precio"] . "</td>";
                echo "<td>" . $row["Stock"] . "</td>";
                echo "<td>" . $row["Proveedor"] . "</td>";
                echo "<td>";
                echo "<a href='editar_producto.php?id=" . $row["ID_producto"] . "'>Editar</a> | ";
                echo "<a href='eliminar_producto.php?id=" . $row["ID_producto"] . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay productos disponibles.</td></tr>";
        }
        ?>
    </tbody>
</table>

<!-- Botón de volver -->
<div class="button-container">
    <a href="index.php" class="styled-button">Volver</a>
</div>


<?php include_once "templates/footer.php"; ?>