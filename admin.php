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
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand">Despensa Feliz</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="admin.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="productos.php">Control de Productos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="inventario.php">Inventario</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="facturacion.php">Factura</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="detalles_factura.php">Dettales de Facturas</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                    </li>
                </ul>
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
