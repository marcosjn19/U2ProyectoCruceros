<?php
session_start();


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Quienes Somos?</title>

    <link rel = "preload" href = "./css/normalize.css" as = "style">
    <link rel = "stylesheet" href = "./css/normalize.css">
    <link rel =  "preoload" href = "./css/style-reservaciones.css" as = "style">
    <link href = "./css/style-reservaciones.css" rel = "stylesheet">  
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@1,300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">

</head>
<body>
   
    <section class = "encabezado-quienesSomos">
        <div class = "contenido-encabezado_quienesSomos"> 
            <div class = "nav-bg">
                <nav class = "nav-contenedor">
                    <a class = "nav-title" href="index.php">ATLANTIC CRUISER</a>
                    <a class = "nav-link" href = "experiencias.php">EXPERIENCIAS</a>
                    <a class = "nav-link" href = "#">¿QUIENES SOMOS?</a>
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
         $nombre = $datos_usuario['nombre_cliente'];
        $apellido =  $datos_usuario['apellido_cliente'];
        echo '<a class="nav-usuario">' . $nombre . ' ' . $apellido.'</a>';
        echo '<a class="nav-link" href="cerrar_sesion.php">CERRAR SESIÓN</a>';
     } else {
         die("Error en la consulta: " . mysqli_error($conexion));
     }
      
     
  
      
  } else {
      
      echo '<a class="nav-link" href="login-register.html">INGRESAR</a>';
  }
  ?>
              </nav> 
            </div>                
        </div>

        
    </section>

    <div class="contenido-info">
        <h3>¿Quiénes Somos? </h3>
        <p> Descubriendo la Esencia de Nuestra Empresa de Viajes en Cruceros de Lujo

            En el emocionante mundo de los viajes en cruceros de lujo, 
            cada experiencia comienza con una pregunta aparentemente 
            simple pero profundamente significativa: ¿Quiénes somos? 
            Detrás de cada viaje excepcional, hay una empresa que encarna
            una pasión por la aventura, la elegancia y la excelencia en 
            el servicio. En nuestro caso, esa empresa somos nosotros, 
            Atlantic Crusier . </p>

        <h3> Nuestra Historia y Filosofía</h3>
        <p>
            Nuestra historia es un viaje en sí mismo. Fundada hace 
            17 años, hemos construido nuestro camino hacia el éxito 
            en el competitivo mundo de los viajes de lujo.
            Desde entonces, hemos mantenido una visión clara y
            una filosofía inquebrantable: proporcionar a nuestros clientes 
            experiencias únicas e inolvidables 
            en los mares y océanos del mundo.
        </p>

        <h3>La Excelencia en el Servicio</h3>
        <p>
            Lo que nos distingue es nuestro compromiso con la excelencia en el servicio. 
            Nuestra tripulación está compuesta por profesionales apasionados y expertos 
            en la industria de cruceros de lujo. Cada miembro de nuestro equipo se dedica
            a brindar un servicio personalizado y atento a cada uno de nuestros huéspedes.
        </p>

        <h3> Destinos de Ensueño </h3>
        <p>
            Explorar el mundo es una de las mayores alegrías de la vida, y estamos comprometidos 
            en llevar a nuestros pasajeros a destinos de ensueño. Desde las aguas cristalinas 
            del Caribe hasta los fiordos majestuosos de Noruega y las islas exóticas del Pacífico Sur,
            ofrecemos una amplia gama de destinos cuidadosamente 
            seleccionados para satisfacer los gustos de nuestros viajeros más exigentes.
        </p>
    </div>
</body>
</html>