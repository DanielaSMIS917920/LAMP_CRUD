<?php
session_start();

//Se envian los datos al servidor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usuario'];
    $password= $_POST['contrasena'];

    //Se realiza una autenticación de administrador, en este caso se asignan ya las credenciales para el administrador
    if ($username == 'admin' && $password == 'dfeliz1234') {
        $_SESSION['admin'] = true;
        header("Location: productos.php");
        exit();
    } else {
        echo "Usuario invalido";
    }
}
?>

<!-- Apartado visual del formulario del inicio de sesión -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inicio de Sesión</title>
</head>
<body>
    <h1 style="text-align: center;">Bienvenido</h1>

    <form style="width: 300px; margin: auto;" method="post" action="login.php">
        <br>
        <br>
        <input class="form-control" type="text" name="usuario" placeholder="usuario" aria-label="default input example" required>
        <input class="form-control" type="text" name="contrasena" placeholder="contraseña" aria-label="default input example" required>
        <br>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-success">Iniciar</button>
        </div>
    </form>

    
</body>
</html>


