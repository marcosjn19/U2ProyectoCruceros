<?php

include("conexion.php");
$con = connection();
//------------------ Toma de variables
$idBarco = $_POST['id_barco'];
$nombreBarco = $_POST['nombreBarco'];
$descripcionCorta = $_POST['descripcionCorta'];
$fechaInicio = $_POST['fechaInicio'];
$fechaSalida = $_POST['fechaSalida'];
$itinerario = $_POST['itinerario'];
$imagenBarco =$_POST['imagenBarco'];
$destinoBarco =$_POST['destinoBarco'];

//----------------actualizacion de datos del crucero
$sql = "UPDATE crucero SET destino_crucero = '$destinoBarco',
fechainicio_crucero = '$fechaInicio',
fechacierre_crucero = '$fechaSalida',
barco_crucero = '$nombreBarco', 
descripcion_crucero = '$descripcionCorta',
itinerario_crucero = '$itinerario',
refimagen_crucero = '$imagenBarco'

WHERE id_crucero = '$idBarco'";
$query = mysqli_query($con, $sql);



//-------------------------CABINA_CRUCERO UPDATE

//------------Obtén los valores enviados por el formulario
 $id_rcc_array = $_POST["id_rcc"];
 $id_cabina_array = $_POST["id_cabina"];
 $id_crucero_array = $_POST["id_crucero"];
 $disponible_cabina_array = $_POST["disponible_cabina"];
 $precio_cabina_array = $_POST["precio_cabina"];

//------ Array contador
        $num_filas = count($id_rcc_array);

        // Recorre los valores y realiza un update en la base de datos para cada conjunto de valores
        for ($i = 0; $i < $num_filas; $i++) {
            $id_rcc = $id_rcc_array[$i];
            $id_cabina = $id_cabina_array[$i];
            $id_crucero = $id_crucero_array[$i];
            $disponible_cabina = $disponible_cabina_array[$i];
            $precio_cabina = $precio_cabina_array[$i];

            // Realiza un update en la base de datos utilizando estos valores
            $sql = "UPDATE CABINA_CRUCERO SET disponible_rcc = '$disponible_cabina', 
            precio_rcc = '$precio_cabina' WHERE id_rcc = '$id_rcc' 
            AND id_cabina = '$id_cabina' AND id_crucero = '$id_crucero'";
            $query2 = mysqli_query($con, $sql);

            if (!$query2) {
                echo "Error al actualizar el registro para el conjunto de valores ($id_rcc, $id_cabina, $id_crucero)";
            }
        }
    
        if ($query &&$query2 === TRUE) {
            header("Location: admin.php");
        } else {
            echo "Error al eliminar el registro: " . $con->error;
        }



?>