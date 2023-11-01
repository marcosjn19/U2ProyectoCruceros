<?php
include("conexion.php");
$con = connection();

//comienzo de toma de variables


    $id=$_GET["id_crucero"];
    $sql = "DELETE FROM crucero WHERE id_crucero = '$id'";
    $query = mysqli_query($con, $sql);

    if ($query === TRUE) {
        header("Location: admin.php");
    } else {
        echo "Error al eliminar el registro: " . $con->error;
    }
   
    
    
    


?>