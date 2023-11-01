<?php

function connection(){
    $dbhost ="localhost";//host donde esta la base de datos
    $dbname ="cruceros";
    $dbuser ="root";
    $dbpass ="";

    $conexion = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    return $conexion;

}
?>