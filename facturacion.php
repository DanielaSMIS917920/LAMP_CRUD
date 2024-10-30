<?php

//Llamado de la base de datos
include 'db.php';

// Se agregan y procesan los campos respectivos pedidos en el formulario de Factura
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_factura'])) {
    $fecha = $_POST['fecha'];
    $total = $_POST['total'];
    $conn->query("INSERT INTO facturacion (fecha, total) VALUES ('$fecha', $total)");
}

//Pide visualizar los datos enviados
$facturas = $conn->query("SELECT * FROM facturacion");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sistema de Facturación</title>
</head>
<body>
    <?php include 'admin.php'; ?> <!-- Incluye el Nav de admin.php -->
    <h2 style="text-align: center;">Facturación</h2>
<!-- Formulario para los campos de Facturación -->
    <form style="width: 300px; margin: auto;" method="post">
        <input type="date" name="fecha" required>
        <input type="number" step="0.01" name="total" placeholder="Total del producto" required>
        <button type="submit" name="add_factura">Agregar a Factura</button>
    </form>
 <!-- Se muestran los datos ingresados en una tabla -->
    <table class="table">>
        <tr><th scope="col">ID</th><th scope="col">Fecha de compra</th><th scope="col">Total</th></tr>
        <?php while ($row = $facturas->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['fecha'] ?></td>
            <td><?= $row['total'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
