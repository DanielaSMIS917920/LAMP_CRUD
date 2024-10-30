<?php

//Llamado de la base de datos
include 'db.php';

// Se agregan y procesan los campos respectivos pedidos en el formulario de Inventario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_inventario'])) {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];
    $conn->query("INSERT INTO inventario (producto_id, cantidad, fecha_actualizacion) VALUES ($producto_id, $cantidad, '$fecha')");
}

//Como se esta trabajando con datos de otras tablas, se pide visualizar información de ambas
$productos = $conn->query("SELECT * FROM productos");
$inventario = $conn->query("SELECT * FROM inventario");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inventario</title>
</head>
<body>
    <?php include 'admin.php'; ?> <!-- Incluye el Nav de admin.php -->
    <h2 style="text-align: center;">Inventariado</h2>
<!-- Formulario para los campos de Inventario -->
    <form style="width: 300px; margin: auto;" method="post">
<!-- Se pide escoger uno de los productos ingresados en el Control de Producto-->
        <select name="producto_id" required>
            <?php while ($row = $productos->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['nombre_producto'] ?></option>
            <?php endwhile; ?>
        </select>
        <input type="number" name="cantidad" placeholder="Cantidad del producto" required>
        <input type="date" name="fecha" required>
        <button type="submit" name="add_inventario">Agregar al Inventario</button>
    </form>
 <!-- Se muestran los datos ingresados en una tabla -->
    <table class="table">>
        <tr><th scope="col">ID</th><th scope="col">Producto ID</th><th scope="col">Cantidad</th><th scope="col">Fecha</th></tr>
        <?php while ($row = $inventario->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['producto_id'] ?></td>
            <td><?= $row['cantidad'] ?></td>
            <td><?= $row['fecha_actualizacion'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
