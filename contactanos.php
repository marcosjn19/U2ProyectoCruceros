<?php
session_start();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "preload" href = "./css/normalize.css" as = "style">
    <link rel = "stylesheet" href = "./css/normalize.css">
    <link rel =  "preoload" href = "./css/styles.css" as = "style">
    <link href = "./css/styles.css" rel = "stylesheet"> 
    <link href = "./css/styles-contact.css" rel = "stylesheet"> 

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
    
    <!--animate css-->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


    <title>Contactanos</title>
</head>
<body>
    <section class = "encabezado-contact">
        <div class = "contenido-encabezado-contact"> 
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
            </div>                
        </div>
    </section>

    <div class = "content">
        <h1 class="logo">Atlantic <span>Crusier</span></h1>

        <div class="contact-total">
            <div class="contact-datos" >
                <h3>contactanos</h3>
                <form action="">
                    <p>
                        <label>Emprea</label>
                        <input type="text" name="nombre-completo" value="Atalntic cruisere" readonly>
                    </p>
                    <p>
                        <label>Email</label>
                        <input type="email" name="email" value="atlantiCrusier@atlantic.com" readonly>
                    </p>
                    <p>
                        <label> Telefono</label>
                        <input type="tel" name="Telefono"value="+(52) 81231232312 " readonly>
                    </p>
                    <p>
                        <label> Asunto</label>
                        <input type="text" name="asunto" readonly value="La mejor empresa en tematica de viajes en curcero"> 
                    </p>
                    <p class="block">
                        <label> Mensaje</label>
                        <textarea name="mensaje" rows="3" readonly>Ven y Contactanos a antlantic cruisere la empresa que te dara un viaje de maravilla</textarea>
                    </p>

                    <p class="block">
                        <button type="submit"> Enviar</button>
                    </p>
                </form>
            </div>
            <div class="contact-info">
            <h4>Mas informacion</h4>
            <ul>
                <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffec00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    <path d="M11.87 21.48a1.992 1.992 0 0 1 -1.283 -.58l-4.244 -4.243a8 8 0 1 1 13.355 -3.474" />
                    <path d="M15 19l2 2l4 -4" />
                </svg> Torreon, Coah
                </li>
                <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffec00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                </svg> +(52) 81231232312
                </li>
                <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffec00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M11 19h-6a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v6" />
                    <path d="M3 7l9 6l9 -6" />
                    <path d="M15 19l2 2l4 -4" />
                </svg> atlantiCrusier@atlantic.com
                </li>
                
            </ul>
            <P>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quas nisi ipsa numquam repellendus ipsum et nam quibusdam, placeat dolore, 
                consectetur labore debitis maxime nulla cumque a ut error fugiat sit.</P>
            <P>Atlantic CRUISER</P>
            </div>

        </div>
    </div>

    <footer>
        <div class = "footer-main-content">
            <div class = "footer-creditos"> 
                <p> Proyecto creado por: </p>
                <p> Marcos Emmanuel Juárez Navarro N.C 21130852</p>
                <p> Gael Costilla Garcia N.C 21130923</p>
            </div>
        </div>
    </footer>
</body>
</html>