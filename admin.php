<?php

//Se conecta con el inicio de sesión del administrador
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

//Llamado de la base de datos
include 'db.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Panel Administrativo</title>
</head>
<body>
<!--Estructura del navar para facilitar la navegación entre las tablas y paginas -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">Despensa Feliz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="admin.php">Inicio</a>
                <a class="nav-link" href="productos.php">Control de Productos</a>
                <a class="nav-link" href="inventatio.php">Inventario</a>
                <a class="nav-link" href="facturacion.php">Facturacion</a>
                <a class="nav-link" href="detalles_factura.php">Detalles de factura</a>
                <a class="nav-link" href="logout.php">Cerrar</a>
            </div>
            </div>
        </div>
    </nav>

    <br>
    <br>
<!-- Decorativos para el panel administrativo -->
    <h1 style="text-align: center;">Panel Administrativo</h1>
    <br>

</body>
</html>
