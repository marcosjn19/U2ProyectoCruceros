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


//--------------------
//----------------------------------
$sql = "UPDATE CABINA_CRUCERO SET
disponible_rcc = '0' WHERE id_crucero = '$idCrucero' and id_cabina = '$idCabina' ";
$query = mysqli_query( $conexion, $sql);


//-----------------------------

$consultaidrcc = "SELECT id_rcc From CABINA_CRUCERO 
WHERE  id_crucero = '$idCrucero' AND id_cabina = '$idCabina' ";

$resultidrcc = mysqli_query($conexion, $consultaidrcc);

if (isset($_SESSION['clientes']) ){
if($resultidrcc){
    $filaIdRCC = mysqli_fetch_assoc($resultidrcc);
    $id_rcc = $filaIdRCC['id_rcc'];
$sql1 ="INSERT INTO COMPRA
(nombre_compra,
personas_compra,
total_compra, 
correo_compra, 
id_rcc)
VALUES ('$nombre_Cliente', '$numPersonas', '$pago', '$correo_Cliente', '$id_rcc ')";
$query1 = mysqli_query( $conexion, $sql1);
    
$consultaidcompra = "SELECT id_compra FROM COMPRA WHERE id_rcc = '$id_rcc' AND correo_compra = '$correo_Cliente'";
    $resultidcompra = mysqli_query($conexion, $consultaidcompra);

    $consultaidcliente = "SELECT id_cliente FROM CLIENTES WHERE correo_cliente = '$correo_Cliente' AND apellido_cliente = '$apellido_Cliente'";
    $resultidcliente = mysqli_query($conexion, $consultaidcliente);

    if ($consultaidcliente && $resultidcliente) {
        
        $filaIdCompra = mysqli_fetch_assoc($resultidcompra);
        $id_compra = $filaIdCompra['id_compra'];

        $filaIdCliente = mysqli_fetch_assoc($resultidcliente);
        $id_cliente = $filaIdCliente['id_cliente'];

        $sql2 = "INSERT INTO COMPRA_CLIENTES
        (id_compra, id_cliente)
        VALUES ('$id_compra', '$id_cliente')";
        $query2 = mysqli_query($conexion, $sql2);
}
}
}
else{
    if($resultidrcc){
    $filaIdRCC = mysqli_fetch_assoc($resultidrcc);
    $id_rcc = $filaIdRCC['id_rcc'];
$sql1 ="INSERT INTO COMPRA
(nombre_compra,
personas_compra,
total_compra, 
correo_compra, 
id_rcc)
VALUES ('$nombre_Cliente', '$numPersonas', '$pago', '$correo_Cliente', '$id_rcc')";
$query1 = mysqli_query( $conexion, $sql1);
}else{
    echo "error";
}
}
//-------------------------------

//-----------------------
// Crea un nuevo objeto PDF
$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
// Especifica la ubicación y dimensiones de la imagen
$x = 0; // Posición en el eje X
$y = 0; // Posición en el eje Y
$width = 0; // Ancho de la imagen
$height = 300; // Si pones 0, se mantendrá la proporción original
$imagePath = 'recibo.jpg'; // Ruta de la imagen

// Agrega la imagen al documento PDF
$pdf->Image($imagePath, $x, $y, $width, $height);

$pdf->SetY(80); 
$pdf->SetX(30);
$pdf->Cell(0, 10, $fechaActual , 0, 1);
$pdf->SetY(100); // Ajusta la posición vertical a 60 unidades desde la parte superior
$pdf->Cell(0, 10, '', 0, 1, 'C');
$pdf->SetFont('Arial', '', 15);


$pdf->SetY(115);
$pdf->SetX(25);
$pdf->Cell(0, 10, 'Crusero:   ' , 0, 1);


$pdf->SetY(128);
$pdf->SetX(25);
$pdf->Cell(0, 10, 'Cabina:    ', 0, 1);


$pdf->SetY(140);
$pdf->SetX(25);
$pdf->Cell(0, 10, 'Cliente:   ', 0, 1);


$pdf->SetY(150);
$pdf->SetX(25);
$pdf->Cell(0, 10, 'Correo:    ' , 0, 1);


$pdf->SetY(162);
$pdf->SetX(25);
$pdf->Cell(0, 10, 'Numero de personas: ', 0, 1);



$pdf->SetY(115);
$pdf->setX(120);
$pdf->Cell(50, 10, $nombreCrucero,0,1);
$pdf->SetY(128);
$pdf->setX(120);
$pdf->Cell(25, 10, $cabina,0,1);
$pdf->SetY(140);
$pdf->setX(120);
$pdf->Cell(23, 10,$nombre_Cliente. '' .$apellido_Cliente,0,1);
$pdf->SetY(150);
$pdf->setX(120);
$pdf->Cell(50, 10,$correo_Cliente,0,1);
$pdf->SetY(164);
$pdf->setX(130);
$pdf->Cell(50, 10,$numPersonas,0,1);

$pdf->SetY(202);
$pdf->SetX(135);
$pdf->SetFont('Arial', '', 30);
$pdf->Cell(0, 10,$pago, 0, 1);

// Genera el PDF
$pdf->Output();



?>

   