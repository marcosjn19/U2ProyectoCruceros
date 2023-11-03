<?php
include('conexion.php');
$con = connection();

$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$email = $_POST['Correo_Electronico'];
$telefono = $_POST['telefono'];
$contraseña = $_POST['Contraseña'];

$query = "INSERT INTO CLIENTES (nombre_cliente, apellido_cliente, correo_cliente, telefono_cliente, contraseña_cliente) 
VALUES ('$nombre','$apellido', '$email', '$telefono', '$contraseña')";

$ejecutar = mysqli_query($con, $query);

if ($ejecutar === TRUE) { // Corregir esta línea
 
 
 
   echo '<script>alert("Usuario almacenado exitosamente, Bienvenido ' . $nombre . '")
   
    window.location = "login-register.html";
   </script>';

} else {
    echo "Error al insertar el registro: " . $con->error;
}
?>