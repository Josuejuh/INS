<?php
$servername = "localhost";
$usuario=$_POST["usu"];
$clave=$_POST["clave"];
$database= "one&only";
// Create connection
$conn = mysqli_connect($servername, $usuario, $clave, $database);
$sql1 = "CREATE TABLE Usuarios (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";


if (mysqli_query($conn, $sql1)) {
    header ("Location: Inicio.php");
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
