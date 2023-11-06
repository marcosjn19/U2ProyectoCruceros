<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATALOGO</title>

    <link rel = "preload" href = "./css/normalize.css" as = "style">
    <link rel = "stylesheet" href = "./css/normalize.css">
    <link rel =  "preoload" href = "./css/styles.css" as ="style">
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
</head>

<body>

    <?php
    $dbhost = "localhost";
    $dbname = "u768297978_atlanticruiser";
    $dbuser = "u768297978_admin";
    $dbpass = "Prograweb123#";

    $conexion = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname, "3306") or die
    ("PROBLEMAS DE CONEXION");
    $consultaCruceros = "SELECT C.id_crucero, C.descripcion_crucero, C.destino_crucero, C.barco_crucero, CC.precio_rcc, C.refimagen_crucero FROM CRUCERO C, CABINA_CRUCERO CC WHERE C.id_crucero = CC.id_crucero AND CC.id_cabina = 2;";
    $resultCruceros = mysqli_query($conexion, $consultaCruceros);
    $cruceros = array();

    while ( $filaCrucero = mysqli_fetch_assoc($resultCruceros) ){
        $cruceros[] = $filaCrucero;
    }

    ?>

    <section class = "encabezado-reservaciones">
        <div class = "contenido-encabezado-reservaciones"> 
            <div class = "nav-bg">
                <nav class = "nav-contenedor">
                    <a class = "nav-title" href = "index.php">ATLANTIC CRUISER</a>
                    <a class = "nav-link" href = "experiencias.php">EXPERIENCIAS</a>
                    <a class = "nav-link" href = "quienes_somos.php">¿QUIENES SOMOS?</a>
                    <a class = "nav-link" href = "reservaciones.php">RESERVACIONES</a>
                    <a class = "nav-link" href = "contactanos.html">CONTACTANOS</a>
    <?php
    session_start();

    // Verifica si el usuario está autenticado para mostrar el
    // enlace de cierre de sesión.
    if (isset($_SESSION["clientes"]) ) {
        echo '<a class="nav-link" href="cerrar_sesion.php">CERRAR SESIÓN</a>';
    } else {
        
        echo '<a class="nav-link" href="login-register.html">INGRESAR</a>';
    }
    ?>
               
                </nav>
            </div>    

            <div class = "mensaje">
            <p>RESERVA CON NOSOTROS Y APROVECHA NUESTRAS OFERTAS</p>
            </div>
        </div>
    </section>
    
    
    <section class = "catalogo"> 
        <h1>Ahorra hasta $12550 con nuestras promociones</h1>
            <div class = "contenedor-promociones">  
                <?php foreach ($cruceros as $crucero){

                ?>
                <div class = "promocion">
                    <div class = "promocion-img" style="background-image: url('<?php echo $crucero['refimagen_crucero']; ?>');" ></div>
                            <h3><?php echo $crucero['descripcion_crucero']?></h3>
                            <p> <?php echo '$'.$crucero['precio_rcc'] ?> / Persona</p>
                            <div class = "informacion">
                                <svg class = "icono-info"fill="#000000" viewBox="0 -27.24 122.88 122.88" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 68.39" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0">
                                    </g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M11.14,66.21L0.02,39.85c-0.05-0.13,0.01-0.28,0.14-0.33c0.03-0.01,0.07-0.02,0.1-0.02l22.75,0l4.18-19.99 c0.02-0.12,0.13-0.2,0.25-0.2l7.02,0V0.25C34.44,0.11,34.56,0,34.7,0h3.49c0.14,0,0.26,0.11,0.26,0.25V19.3h4.23V8.73 c0-0.14,0.11-0.25,0.26-0.25h3.49c0.14,0,0.25,0.11,0.25,0.25V19.3h26.05l0.16,0.01c2.15,0.18,4.16,0.61,6,1.35 c1.85,0.74,3.53,1.78,5.03,3.17c1.47,1.36,2.74,3.04,3.79,5.08c1.04,2.03,1.86,4.42,2.43,7.2l0.04,0.37l0,0.03l0,2.99h32.44 c0.14,0,0.26,0.11,0.26,0.26c0,0.07-0.03,0.14-0.08,0.19l-12.11,12.92c-0.92,0.98-1.56,1.69-2.18,2.37l-0.01,0.01 c-1.82,2-3.48,3.85-5.4,5.5c-1.93,1.66-4.11,3.13-6.93,4.38c-0.6,0.27-1.21,0.51-1.83,0.74c-0.62,0.23-1.24,0.44-1.89,0.63 c-0.63,0.19-1.28,0.36-1.94,0.51c-0.65,0.15-1.32,0.28-2.01,0.4c-19.74,2.21-55.22,0.03-76.68,0.03c-0.11,0-0.21-0.07-0.24-0.18 L11.14,66.21L11.14,66.21z M66.49,27.53h15.5l-0.19-0.21c-0.19-0.2-0.38-0.39-0.58-0.57c-1.13-1.04-2.42-1.83-3.85-2.4 c-1.43-0.57-3.02-0.91-4.72-1.05H30.46l-3.38,16.2h59.11v-2.81c-0.04-0.2-0.09-0.41-0.14-0.61l-0.1-0.43H66.49 c-0.14,0-0.25-0.11-0.25-0.26v-7.61C66.24,27.64,66.35,27.53,66.49,27.53L66.49,27.53z M50.54,27.53h7.87 c0.14,0,0.25,0.11,0.25,0.26v7.79c0,0.14-0.11,0.26-0.25,0.26h-7.87c-0.14,0-0.26-0.11-0.26-0.26v-7.79 C50.28,27.64,50.4,27.53,50.54,27.53L50.54,27.53z M5.88,43.5l8.41,19.94h73.76c0.55-0.09,1.09-0.2,1.63-0.33 c0.55-0.13,1.1-0.27,1.64-0.43c0.55-0.16,1.1-0.35,1.64-0.55c0.54-0.2,1.08-0.42,1.6-0.65c2.44-1.08,4.35-2.39,6.07-3.88 c1.73-1.5,3.26-3.19,4.92-5.03l1.16-1.28c0.38-0.41,0.74-0.81,1.07-1.16L114,43.5H5.88L5.88,43.5z"></path> </g> </g>
                                </svg>
                                <p class = "info"> <?php echo $crucero['barco_crucero']?></p>
                            </div>
                            <div class = "informacion">
                                <svg class = "icono-info" viewBox="0 0 96 96" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{display:none;} .st1{fill:#FFFFFF;} .st2{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st3{fill:#FFF8FA;} .st4{stroke:#000000;stroke-width:2;stroke-miterlimit:10;} .st5{fill:none;stroke:#000000;stroke-miterlimit:10;} .st6{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;} .st7{fill:#231F20;stroke:#000000;stroke-width:0;stroke-miterlimit:10;} .st8{fill:#FF0D5C;} .st9{display:inline;} .st10{fill:none;stroke:#00D8E9;stroke-width:0.25;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st11{fill:none;stroke:#00D8E9;stroke-width:0.25;stroke-linejoin:round;stroke-miterlimit:10;} .st12{fill:none;stroke:#00D8E9;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st13{fill:none;stroke:#00D8E9;stroke-linejoin:round;stroke-miterlimit:10;} </style> <g id="banana"></g> <g id="Layer_12"></g> <g id="grape"></g> <g id="assasin"></g> <g id="gold"></g> <g id="mage_ass"></g> <g id="fighter"></g> <g id="SUPPORT"></g> <g id="marksman"></g> <g id="JUNGLE"></g> <g id="TANK"></g> <g class="st0" id="creditcard"></g> <g class="st0" id="CAKE"></g> <g class="st0" id="TOPI"></g> <g class="st0" id="SPATU"></g> <g class="st0" id="SETTING"></g> <g class="st0" id="CART"></g> <g class="st0" id="k3"></g> <g class="st0" id="computer"></g> <g class="st0" id="phone"></g> <g class="st0" id="location"></g> <g id="koper"> <g id="Layer_29"></g> <g> <ellipse cx="48.5" cy="35.1" rx="13.5" ry="13"></ellipse> <path d="M48,13.1c-12.1,0-22,10.9-22,24.2c0,12,18,37.5,22,43.1c4-5.6,22-31.1,22-43.1C70,23.9,60.1,13.1,48,13.1z M48.5,50.1 c-8.5,0-15.5-6.7-15.5-15s7-15,15.5-15S64,26.8,64,35.1S57,50.1,48.5,50.1z"></path> </g> </g> <g class="st0" id="guide"></g> <g id="MAGICAL"></g> <g id="phisical"></g> <g id="mango"></g> <g id="orange"></g> </g></svg>
                                <p class = "info"><?php echo $crucero['destino_crucero']?></p>
                                <button class = "promocion-reservar" onclick = "window.location.href='reserva.php?idcrucero=<?php echo$crucero['id_crucero']?>'">Reservar ahora -></button>
                            </div>
                        
                </div>                    
                <?php } ?>
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
</body>

</html>