<?php

function connection(){
    
    $dbhost = "localhost";
    $dbname = "u768297978_atlanticruiser";
    $dbuser = "u768297978_admin";
    $dbpass = "Prograweb123#";

        $conexion = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname, "3306") or die
        ("PROBLEMAS DE CONEXION");
    

    return $conexion;

}
?>