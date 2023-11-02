<?php
include("conexion.php");
$con = connection();

//comienzo de toma de variables

$idBarco = $_POST['id_crucero'];
$nombreBarco = $_POST['nombreBarco'];
$descripcionCorta = $_POST['descripcionCorta'];
$fechaInicio = $_POST['fechaInicio'];
$fechaSalida = $_POST['fechaSalida'];
$itinerario = $_POST['itinerario'];
$imagenBarco =$_POST['imagenBarco'];
$destinoBarco =$_POST['destinoBarco'];

    
    $sql = "INSERT INTO CRUCERO (id_crucero, 
    destino_crucero,
    fechainicio_crucero,
    fechacierre_crucero,
    barco_crucero, 
    descripcion_crucero,
    itinerario_crucero, refimagen_crucero) 
    VALUES ('$idBarco', '$destinoBarco', 
    '$fechaInicio', '$fechaSalida', 
    '$nombreBarco', '$descripcionCorta',
     '$itinerario', '$imagenBarco')";

$query = mysqli_query($con, $sql);

if ($query === TRUE) {
    header("Location: admin.php");
} else {
    echo "Error al eliminar el registro: " . $con->error;
}







?>