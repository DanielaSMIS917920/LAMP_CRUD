<?php
// se establece la conexión con la base de datos
include 'db.php';

//Se establece la creación de la tabla para la base de datos despensa_feliz_db
$sql = "CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre_producto VARCHAR(255) NOT NULL,
    cantidad INT NOT NULL,
    proveedor VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL
)";

//Se verifica si la creación a sido exitosa, sino, avisar que hubo un error
if ($conn->query($sql)== TRUE) {
    echo "Tabla creada con exito";
} else {
        echo "Error, tabla no creada " . $conn->error;
}
?>