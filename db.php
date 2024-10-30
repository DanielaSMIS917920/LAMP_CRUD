<?php
$servername = "localhost";
$username = "admin"; //nombre del usuario de la Base de datos
$password = "despensa1234"; // contraseña del usuario para ingresar a la base de datos
$dbname = "despensa_feliz_db"; // nombre que se le asigna a la base de datos de la empresa Despensa Feliz

// Se realiza la conexión de los parametros anteriores con la base de datos en MySQL
$conn = new mysqli($servername, $username, $password);

// Se comprueba que la conexión es correcta o si no, avisa del error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//En caso que la base de datos no exista, se crea de manera automatica
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname"); //Crea la base de datos de acuerdo a los parametros establecidos en la variable $dbname
$conn->select_db($dbname);
?>
