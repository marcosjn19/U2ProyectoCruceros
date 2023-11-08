<?php 
session_start();

 include ('conexion.php');
 $conexion = connection();
 $idCabina = $_POST['idcabina'];
$idCrucero = $_POST['idcrucero'];
 //------------------------------------------
require 'fpdf/fpdf.php';
// Recopila los datos necesarios desde el formulario
$nombreCrucero= $_POST['nombre-crucero'];
$cabina= $_POST['tipo-cabina'];
$nombre_Cliente= $_POST['nombre-cliente'];
$apellido_Cliente= $_POST['apellido-cliente'];
$correo_Cliente= $_POST['correo-cliente'];
$numPersonas= $_POST['numPersonas'];
$pago= $_POST['totalPagar'];
$fechaActual = date('Y-m-d'); // Obtiene la fecha y hora actual en el formato deseado (año-mes-día hora:minuto:segundo)

echo("ola")


?>
   