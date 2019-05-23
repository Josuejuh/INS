<?php
$servername = "localhost";
$usuario=$_POST["usu"];
$clave=$_POST["clave"];
$BD="oneonly";
// Create connection
$conn = mysqli_connect($servername, $usuario, $clave);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE $BD";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
    include("1.php");
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
