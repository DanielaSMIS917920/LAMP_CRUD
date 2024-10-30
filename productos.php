<?php

//Llamado de la base de datos
include 'db.php';

// Se agregan y procesan los campos respectivos pedidos en el formulario de Productos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_producto'])) {
    $nombre_producto = $_POST['nombre_producto'];
    $categoria = $_POST['categoria']
    $proveedor = $_POST['proveedor'];
    $conn->query("INSERT INTO productos (nombre_producto, categoria, proveedor) VALUES ('$nombre_producto',' $categoria','$proveedor')");
}

//Pide visualizar los datos enviados 
$productos = $conn->query("SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Control de productos</title>
</head>
<body>
    <?php include 'admin.php'; ?> <!-- Incluye el Nav de admin.php -->
    <h2 style="text-align: center;">Control de Productos</h2>
<!-- Formulario para los campos de Productos -->
    <form method="post">
        <input type="text" name="nombre_producto" placeholder="Nombre del Producto" required>
        <input type="text" name="categoria" placeholder="Categoria del producto" required>
        <input type="text" name="proveedor" placeholder="Proveedor" required>
        <button type="submit" name="add_producto">Agregar Producto</button>
    </form>
 <!-- Se muestran los datos ingresados en una tabla -->   
    <table>
        <tr><th>ID</th><th>Nombre</th><th>Categoria</th><th>Proveedor</th></tr>
        <?php while ($row = $productos->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nombre_producto'] ?></td>
            <td><?= $row['categoria'] ?></td>
            <td><?= $row['proveedor'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
