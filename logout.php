<?php
session_start(); // Inicia la sesión

// Destruye todas las variables de sesión
session_unset(); 

// Destruye la sesión actual
session_destroy();

// Redirige al usuario overview a la página del index.php
header("Location: index.php");
exit();
?>
