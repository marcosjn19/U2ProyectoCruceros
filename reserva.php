

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Reserva</title>
</head>
<body>
<?php
    $dbhost = "localhost";
    $dbname = "u768297978_atlanticruiser";
    $dbuser = "u768297978_admin";
    $dbpass = "Prograweb123#";
    $id_crucero = $_GET['idcrucero'];

    $conexion = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname, "3306") or die
    ("PROBLEMAS DE CONEXION");
    $consultaCrucero = "SELECT * FROM CRUCERO WHERE id_crucero = '$id_crucero';";
    $resultCrucero = mysqli_query($conexion, $consultaCrucero);

    $consultaPrecio1 = "SELECT precio_rcc FROM CABINA_CRUCERO WHERE id_crucero = '$id_crucero' AND id_cabina = 3;";
    $consultaPrecio2 = "SELECT precio_rcc FROM CABINA_CRUCERO WHERE id_crucero = '$id_crucero' AND id_cabina = 5;";
    $consultaPrecio3 = "SELECT precio_rcc FROM CABINA_CRUCERO WHERE id_crucero = '$id_crucero' AND id_cabina = 15;";

    $precio1 = mysqli_fetch_assoc(mysqli_query($conexion, $consultaPrecio1));
    $precio2 = mysqli_fetch_assoc(mysqli_query($conexion, $consultaPrecio2));
    $precio3 = mysqli_fetch_assoc(mysqli_query($conexion, $consultaPrecio3));

    $consultaCabinas = "SELECT C.id_cabina, C.tipo_cabina, CC.disponible_rcc, C.refimagen_cabina, CC.precio_rcc FROM CABINA C, CABINA_CRUCERO CC WHERE C.id_cabina = CC.id_cabina AND CC.id_crucero='$id_crucero';";
    $resultCabinas = mysqli_query($conexion, $consultaCabinas);
    $cabinas = array();

    while ( $filaCabina = mysqli_fetch_assoc($resultCabinas) ){
        $cabinas[] = $filaCabina;
    }

    if (!$resultCrucero) {
    die("Error en la consulta: " . mysqli_error($conexion));
    } else {
        $fila = mysqli_fetch_assoc($resultCrucero);
        mysqli_close($conexion);    
    }

?>

    <script src = "cabina.js"></script>
<div class = "contenedor-principal-todo">
    <section class = "encabezado-reserva-españa">
        <div class = "contenido-encabezado-reserva"> 
            <div class = "nav-bg">
                <nav class = "nav-contenedor">
                    <a class = "nav-title" href="index.php">ATLANTIC CRUISER</a>
                    <a class = "nav-link" href = "experiencias.html">EXPERIENCIAS</a>
                    <a class = "nav-link" href = "quienes_somos.html">¿QUIENES SOMOS?</a>
                    <a class = "nav-link" href = "reservaciones.php">RESERVACIONES</a>
                    <a class = "nav-link" href = "contactanos.html">CONTACTANOS</a>
                </nav>
            </div>                
        </div>
    <div class = "info-barco">
    <div class = "intinerario">
        <div class="rutas">
            <p> <?php echo $fila['itinerario_crucero'].'<br>Del: '.$fila['fechainicio_crucero'].'<br>Al: '.$fila['fechacierre_crucero']?></p>
        </div>                      
        <br>    
    </div>         
    <div class="cuadro-reservacion"> 
        <div class="precio-principal">
        <h3><?php echo "$".$precio1['precio_rcc'] ?> </h3>
        <p class="texto-reserva">
        <?php 
            echo($fila['descripcion_crucero']);
        ?>
        </p>
        <hr>
        </div>
        <div class="precio_habitaciones">

            <div class="precio_habitaciones_categoria">
                <div class="tipo_habitacion_normal"> Normal </div>
                    <div class="tipo_habitacion_balcon"><?php echo "$".$precio1['precio_rcc'] ?></div>
            </div>  

            <div class="precio_habitaciones_categoria">
                <div class="tipo_habitacion_normal"> Balcon </div>
                    <div class="tipo_habitacion_balcon"><?php echo "$".$precio2['precio_rcc'] ?></div>
            </div> 

            <div class="precio_habitaciones_categoria">
                <div class="tipo_habitacion_normal"> Premium </div>
                    <div class="tipo_habitacion_balcon"><?php echo "$".$precio3['precio_rcc'] ?></div>
            </div>   

            <div class="precio_habitaciones_categoria">
                <div class="tipo_habitacion_normal"> Premium+ </div>
                    <div class="tipo_habitacion_balcon"><?php echo "$".$precio3['precio_rcc'] ?></div>
            </div>                           
                
            </div>
            <br>
            <button class="boton" role="boton" id = "botonModal">
                <span class="text"> Reservar </span></button>
        </div>
    </div>
    </div>
    </section> 
</div>
         <!-- PARA COMPRAR BOLETOS -->
         <section>
            <div id = "modalCompra" class = "modal">
                <div class = "contenedor-modal">
                    <h2>Reservar cabina</h2>
                    <div class = "contenedor-boletos">
                        <div class = "contenedor-barco">
                            <div class = "Punta"></div>
                            
                            <?php foreach ($cabinas as $cabina){
                                if ( $cabina['disponible_rcc'] == 1 ){
                                    $estado = "disponible";
                                }else{
                                    $estado = "ocupada";
                                }

                                if ( $cabina['tipo_cabina'] == "Familiar"){
                                    $capacidad = 4;
                                }else{
                                    $capacidad = 1;
                                }
                            
                            ?>

                            <div class = "cabina <?php echo $cabina['tipo_cabina']; echo " ".$estado; ?>" 
                            data-img = "<?php echo  $cabina['refimagen_cabina'];?>" data-capacidad = "<?php echo $capacidad; ?>" 
                            data-tipo = "<?php echo $cabina['tipo_cabina'];?>" data-precio = "<?php echo '$'.$cabina['precio_rcc']; ?>">
                            <p><?php echo $cabina['id_cabina'];?></p> 
                            </div>
                            <?php } ?>

                            <div class = "Cola"></div>
                        </div>
                        <div class = "contenedor-info-boletos">
                            <h3 id = "tipo-cabina"> Selecciona una cabina</h3>
                            <div id = "imagen-cabina"></div>
                            <p> Capacidad de: <span id = "capacidad-cabina">x personas</span></p>
                            <button class = "botont2" onclick = "window.location.href='pagos.html'"> RESSERVAR -></button>
                            <p> Precio por persona de: <span id = "precio-cabina">Selecciona una cabina</span></p>
                        </div>
                    </div>
    
    
                </div>
            </div>
        </section>
    
        
        <!-- CODIGO DEL MODAL -->
        <script>
            var modal = document.getElementById("modalCompra");
            var btn   = document.getElementById("botonModal");
    
            btn.onclick = function(){
                modal.style.display = "block";
            }
        </script>
</body>
</html>

