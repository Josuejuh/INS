<?php
$servername = "localhost";
$username =$_POST["usu"];
$password =$_POST["clave"];
$database= "oneonly";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
$sql1 = "CREATE TABLE Prueba (
Codigo INT(6) UNSIGNED PRIMARY KEY, 
Producto VARCHAR(30) NOT NULL,
Descripcion TEXT(30) NOT NULL,
Correo VARCHAR(50),
Precio VARCHAR(30) NOT NULL,
Categoria VARCHAR(30) NOT NULL
)";

if (mysqli_query($conn, $sql1)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>