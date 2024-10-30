<?php
// se establece la conexión con la base de datos
include 'db.php';

//Se establece la creación de las tablas para la base de datos despensa_feliz_db
//Tabla Productos
$sql = "CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre_producto VARCHAR(255) NOT NULL,
    categoria VARCHAR(255) NOT NULL,
    proveedor VARCHAR(255) NOT NULL

)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla 'productos' creada con éxito.\n";
} else {
    echo "Error, tabla 'productos' no creada: " . $conn->error . "\n";
}

//Tabla Inventario
$sql = "CREATE TABLE IF NOT EXISTS inventario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    fecha_actualizacion DATE NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla 'inventario' creada con éxito.\n";
} else {
    echo "Error, tabla 'inventario' no creada: " . $conn->error . "\n";
}

//Tabla Facturacion
$sql = "CREATE TABLE IF NOT EXISTS facturacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    total DECIMAL(10, 2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla 'facturacion' creada con éxito.\n";
} else {
    echo "Error, tabla 'facturacion' no creada: " . $conn->error . "\n";
}

// Tabla Detalles de Facturacion
$sql = "CREATE TABLE IF NOT EXISTS detalles_factura (
    id INT AUTO_INCREMENT PRIMARY KEY,
    factura_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (factura_id) REFERENCES facturacion(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla 'detalles_factura' creada con éxito.\n";
} else {
    echo "Error, tabla 'detalles_factura' no creada: " . $conn->error . "\n";
}

$conn->close();

?>