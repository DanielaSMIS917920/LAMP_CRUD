<?php
$servername = "localhost";
$username = "root";
$password = ""; // Cambia esto si tienes una contraseña para MySQL
$dbname = "crud_db"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
