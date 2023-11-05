<?php
include ('conexion.php');
$con = connection();

//abrimos variable session
session_start();

//------------------------
$correo_log = $_POST['correo_log'];
$pass_log = $_POST['pass_log'];

if($correo_log == "admin" && $pass_log =="admin"){
    (header("Location: admin.php"));
}

$validacion= mysqli_query($con, "SELECT * FROM CLIENTES 
where correo_cliente = '$correo_log' AND contraseña_cliente = '$pass_log'");

if(mysqli_num_rows($validacion)>0){
    //si la comprueba creara una sesion
    $_SESSION['clientes'] = $correo_log;
    header("Location: index.php");

}else{

    
    echo '<script>
    alert("usuario no encotrado vuelve a intentar");
    window.location = "login-register.html";
</script>';
   
}



?>