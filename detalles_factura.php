<?php

//Llamado de la base de datos
include 'db.php';


// Se agregan y procesan los campos respectivos pedidos en el formulario de Detalles Factura
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_detalle_factura'])) {
    $factura_id = $_POST['factura_id'];
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $conn->query("INSERT INTO detalles_factura (factura_id, producto_id, cantidad, precio) VALUES ($factura_id, $producto_id, $cantidad, $precio)");
}

//Como se esta trabajando con datos de otras tablas, se pide visualizar información de ambas
$facturas = $conn->query("SELECT * FROM facturacion");
$productos = $conn->query("SELECT * FROM productos");
$detalles = $conn->query("SELECT * FROM detalles_factura");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Detalles de Facturación</title>
</head>
<body>
    <?php include 'admin.php'; ?> <!-- Incluye el Nav de admin.php -->
    <h2 style="text-align: center;">Detalles de Facturación</h2>
<!-- Formulario para los campos de Detalles de Facturación -->
    <form style="width: 300px; margin: auto;" method="post">
<!-- Se pide escoger uno de los productos e ID de la factura ingresados en las tablas respectivas de estos campos-->
        <select name="factura_id" required>
            <?php while ($row = $facturas->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>">Factura #<?= $row['id'] ?></option>
            <?php endwhile; ?>
        </select>
        <select name="producto_id" required>
            <?php while ($row = $productos->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['nombre_producto'] ?></option>
            <?php endwhile; ?>
        </select>
        <input type="number" name="cantidad" placeholder="Cantidad" required>
        <input type="number" step="0.01" name="precio" placeholder="Precio" required>
        <button type="submit" name="add_detalle_factura">Agregar detalles a la factura</button>
    </form>
    <table class="table">>
        <tr><th scope="col">ID</th><th scope="col">Factura ID</th><th scope="col">Producto ID</th><th scope="col">Cantidad</th><th scope="col">Precio</th></tr>
        <?php while ($row = $detalles->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['factura_id'] ?></td>
            <td><?= $row['producto_id'] ?></td>
            <td><?= $row['cantidad'] ?></td>
            <td><?= $row['precio'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
