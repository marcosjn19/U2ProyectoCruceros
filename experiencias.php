<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPERIENCIAS</title>


    <link rel = "preload" href = "./css/normalize.css" as = "style">
    <link rel = "stylesheet" href = "./css/normalize.css">
    <link rel =  "preoload" href = "./css/styles.css" as = "style">
    <link href = "./css/styles.css" rel = "stylesheet">  

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
    <!--font-family: 'Faustina', serif; -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
</head>

<body>
    <section class = "encabezado-experiencias">
        <div class = "contenido-encabezado-experiencias"> 
            <div class = "nav-bg">
                <nav class = "nav-contenedor">
                    <a class = "nav-title" href = "index.php">ATLANTIC CRUISER</a>
                    <a class = "nav-link" href = "experiencias.php">EXPERIENCIAS</a>
                    <a class = "nav-link" href = "quienes_somos.php">¿QUIENES SOMOS?</a>
                    <a class = "nav-link" href = "reservaciones.php">RESERVACIONES</a>
                    <a class = "nav-link" href = "contactanos.php">CONTACTANOS</a>
                    <?php
  
  // Verifica si el usuario está autenticado para mostrar el
  // enlace de cierre de sesión.
  if (isset($_SESSION['clientes']) ) {
      $id_usuario = $_SESSION['clientes'];
      include ('conexion.php');
      $conexion = connection();
      //-----------------------------------------------
     // Consulta SQL para obtener los datos del cliente.
     $consulta = "SELECT nombre_cliente, apellido_cliente, correo_cliente FROM CLIENTES
      WHERE correo_cliente = '$id_usuario' ";
     $resultado = mysqli_query($conexion, $consulta);
     
     if ($resultado) {
         $datos_usuario = mysqli_fetch_assoc($resultado);
     } else {
         die("Error en la consulta: " . mysqli_error($conexion));
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

            <div class = "mensaje">
            <p> VIVE INCREIBLES EXPERIENCIAS CON NOSOTROS</p>
            </div>
        </div>
    </section>    
    <hr>

    <section class = "main-experiencias">
        <div class = "contenedor-experiencias" id = "scene">
            <div class = "experiencia layer" data-depth = "0.1">
                <div class = "exp-img exp-img1"></div>
                <p>En nuestros cruceros, puedes deleitarte con una exquisita variedad de platos gourmet. Desde mariscos frescos capturados en alta mar hasta filetes tiernos cocinados a la perfección. Además, disfruta de degustaciones de vinos finos y postres elaborados con maestría mientras te relajas en la belleza del océano.</p>
            </div>

            <div class = "experiencia layer" data-depth = "0.1">
                <div class = "exp-img exp-img2"></div>
                <p>A bordo de nuestros cruceros, el entretenimiento es incomparable. Desde espectáculos de Broadway en el teatro principal hasta conciertos en vivo con artistas de renombre mundial. Disfruta de casinos elegantes, cines bajo las estrellas y fiestas temáticas en cubierta. La diversión nunca termina en alta mar.</p>
            </div>

            <div class = "experiencia layer" data-depth = "0.1">
                <div class = "exp-img exp-img3"></div>
                <p>En nuestros cruceros se ofrecen fiestas inolvidables. Desde elegantes cócteles en la cubierta superior hasta noches de baile en la discoteca con DJ de clase mundial. También hay fiestas temáticas, como noches de disfraces extravagantes y eventos exclusivos para invitados VIP. Celebra en grande mientras navegas.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class = "footer-main-content">
            <div class = "footer-creditos"> 
                <p> Proyecto creado por: </p>
                <p> Marcos Emmanuel Juárez Navarro N.C 21130852</p>
                <p> Gael Costilla Garcia N.C 21130923</p>
            </div>
        </div>
    </footer>
    <script src="./scroll.js"></script>
    <script src="./par.js"></script>
</body>
</html>