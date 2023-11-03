<?php
session_start();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGOS</title>
    <title>ATLANTIC CRUSIERS</title>

    <link rel = "preload" href = "./css/normalize.css" as = "style">
    <link rel = "stylesheet" href = "./css/normalize.css">
    <link rel =  "preload" href = "./css/styles.css" as = "style">
    <link href = "./css/styles.css" rel = "stylesheet">  
    <link rel =  "preload" href = "./css/style-compra.css" as = "style">
    <link href = "./css/style-compra.css" rel = "stylesheet">  

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Judson:wght@400;700&display=swap" rel="stylesheet">
    <!--/*font-family: 'Judson', serif;*/ -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <!--font-family: 'Krona One', sans-serif; -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Faustina:wght@700&display=swap" rel="stylesheet">
</head>
<body>

<?php
    $dbhost = "localhost";
    $dbname = "u768297978_atlanticruiser";
    $dbuser = "u768297978_admin";
    $dbpass = "Prograweb123#";
    
    $id_crucero = $_GET['idcrucero'];
    $id_cabina = $_GET['idcabina'];

    $conexion = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname, "3306") or die
    ("PROBLEMAS DE CONEXION");
    $consultaCrucero = "SELECT * FROM CRUCERO WHERE id_crucero = '$id_crucero';";
    $resultCrucero = mysqli_query($conexion, $consultaCrucero);

    $consultaCabinas = "SELECT C.id_cabina, C.tipo_cabina, CC.disponible_rcc, C.refimagen_cabina, CC.precio_rcc FROM CABINA C, CABINA_CRUCERO CC WHERE C.id_cabina = '$id_cabina' AND C.id_cabina = CC.id_cabina AND CC.id_crucero='$id_crucero';";
    $resultCabinas = mysqli_query($conexion, $consultaCabinas);

    if (!$resultCrucero | !$resultCabinas) {
    die("Error en la consulta: " . mysqli_error($conexion));
    } else {
        $fila = mysqli_fetch_assoc($resultCrucero);
        $filaCabina = mysqli_fetch_assoc($resultCabinas);
        $precioCabina = $filaCabina['precio_rcc'];
        mysqli_close($conexion);    
    }

    if ( $filaCabina['tipo_cabina'] == "Individual"){
        $capacidad = 1;
    }else{
        $capacidad = 4;
    }

  
?>
    <section class = "encabezado">
        <div class = "contenido-encabezado"> 
            <div class = "nav-bg">
                <nav class = "nav-contenedor">
                    <a class = "nav-title" href = "index.html">ATLANTIC CRUISER</a>
                    <a class = "nav-link" href = "experiencias.html">EXPERIENCIAS</a>
                    <a class = "nav-link" href = "quienes_somos.html">¿QUIENES SOMOS?</a>
                    <a class = "nav-link" href = "reservaciones.html">RESERVACIONES</a>
                    <a class = "nav-link" href = "contactanos.html">CONTACTANOS</a>
                    <?php
  
  // Verifica si el usuario está autenticado para mostrar el
  // enlace de cierre de sesión.
  if (isset($_SESSION['clientes']) ) {
      $id_usuario = $_SESSION['clientes'];
      include ('conexion.php');
      $conexion = connection();
      //-----------------------------------------------
     // Consulta SQL para obtener los datos del cliente.
     $consulta = "SELECT nombre_cliente, apellido_cliente, correo_cliente FROM clientes
      WHERE correo_cliente = '$id_usuario';";
     $resultado = mysqli_query($conexion, $consulta);
     
     if ($resultado) {
         $datos_usuario = mysqli_fetch_assoc($resultado);
     } else {
         die("Error en la consulta: " . mysqli_error($conexion));
         echo '<a class = "nav-usuario"> Error en la sesion </a>';
     }
      $nombre = $datos_usuario['nombre_cliente'];
      $apellido =  $datos_usuario['apellido_cliente'];
      echo '<a class="nav-usuario">' . $nombre . ' ' . $apellido.'</a>';
      echo '<a class="nav-link" href="cerrar_sesion.php">CERRAR SESIÓN</a>';
     
  
      
  } else {
      
      echo '<a class="nav-link" href="login-register.html">INGRESAR</a>';
  }
  ?>
              </nav> 
       
            </div>    
        </div>


    </section>
    <main id="main">
    <section id="derecha">
    <h1>PAGO</h1>
		<form action="#">
			<div id="formulario-compra" class="campo">
				<label for="nombre-crucero">Crucero seleccionado:</label>
				<input id="nombre-crucero" maxlength="100" value = <?php echo $fila['destino_crucero']?> type = "text" readonly = "true" style = "text-align: center;">
                <br>
                <label for="tipo-cabina">Cabina seleccionada:</label>
                <input id ="tipo-cabina" maxlength="30" value = <?php echo $filaCabina['tipo_cabina']?> type = "text" readonly = "true" style = "text-align: center;">
			</div>

            <?php
//---------------------------------------------------


//------si la hay los input toman los valores del usario si no hay pues nel
if(isset($_SESSION['clientes'])){
    //-------revision de si hay una sesion 
    $id_usuario = $_SESSION['clientes'];
     $conexion = connection();
    //--------Consulta SQL para obtener los datos del usuario.
$consulta = "SELECT nombre_cliente, apellido_cliente, correo_cliente FROM CLIENTES
 WHERE correo_cliente = '$id_usuario';";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    $datos_usuario = mysqli_fetch_assoc($resultado);
} else {
    die("Error en la consulta: " . mysqli_error($conexion));
    echo "<h1> Error en la consulta </h1>";
}
   echo '<div id="formulario-datos" class="campo">';
   echo '<label for="nombre-cliente">Datos del cliente:</label>';
   echo '<div id="valores">';
   echo '<input id="nombre-cliente" placeholder = "Nombre" type = "text" value="'.$datos_usuario['nombre_cliente'].'" required>';
   echo '<input id="apellido-cliente" placeholder = "Apellido" type = "text" value="'.$datos_usuario['apellido_cliente'].'" required>';
   echo '<input id ="correo-cliente"placeholder = "Correo" type = "text"  value="'.$datos_usuario['correo_cliente'].'"required>';
   echo '</div>';
   echo '</div>';
            

}
else{
    echo '<div id="formulario-datos" class="campo">';
    echo '<label for="nombre-cliente">Datos del cliente:</label>';
    echo '<div id="valores">';
    echo '<input id="nombre-cliente" placeholder = "Nombre" type = "text" required>';
    echo '<input id="apellido-cliente" placeholder = "Apellido" type = "text" required>';
    echo '<input id ="correo-cliente"placeholder = "Correo" type = "text" required>';
    echo '</div>';
    echo '</div>';

}


?>
            
            <div id="" class="campo">
                <label>Numero de personas:</label>
                <input id = "numPersonas" class = "number" type="number" value = "1" min = "1" max = <?php echo $capacidad?> required>
            </div>

            <div id = "" class = campo>
                <label> Total a pagar: </label>
                <input id = "totalPagar" class = "total" type = "text" value = <?php echo '$'.$precioCabina ?> readonly = "true">
            </div>
        
        <div class="contenedor">
        <button type="submit" class="paypal"></button>
        </div>
    </form>
    </section>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Obtenemos el valor del precio de la cabina (supongamos que ya tienes esta variable PHP en tu script)
        var precioCabina = <?php echo $precioCabina; ?>;

        // Obtenemos referencias a los elementos de entrada
        var numPersonasInput = document.getElementById("numPersonas");
        var totalaPagarInput = document.getElementById("totalPagar");

        // Agregamos un event listener para escuchar los cambios en numPersonasInput
        numPersonasInput.addEventListener("input", function() {
            // Obtenemos el valor actual de numPersonas
            var numPersonas = parseInt(numPersonasInput.value);

            // Realizamos el cálculo del total a pagar
            var totalaPagar = numPersonas * precioCabina;

            // Actualizamos el valor de totalaPagarInput
            totalaPagarInput.value = '$'+totalaPagar;
        });
        });
    </script>

</main>
</html>
