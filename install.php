<?php
// se establece la conexión con la base de datos
include 'db.php';

//Se establece la creación de las tablas para la base de datos despensa_feliz_db
$sql = "
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre_producto VARCHAR(255) NOT NULL,
    categoria VARCHAR(255) NOT NULL,
    proveedor VARCHAR(255) NOT NULL

);

CREATE TABLE IF NOT EXISTS inventario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    fecha_actualizacion DATE NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

CREATE TABLE IF NOT EXISTS facturacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    total DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS detalles_factura (
    id INT AUTO_INCREMENT PRIMARY KEY,
    factura_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (factura_id) REFERENCES facturacion(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);";


//Se verifica si la creación a sido exitosa, sino, avisar que hubo un error
if ($conn->query($sql)== TRUE) {
    echo "Tabla creada con exito";
} else {
        echo "Error, tabla no creada " . $conn->error;
}
?>