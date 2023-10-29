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

			<div id="formulario-datos" class="campo">
				<label for="nombre-cliente">Datos del cliente:</label>
				<div id="valores">
                <input id="nombre-cliente" placeholder = "Nombre" type = "text" required>
                <input id="apellido-cliente" placeholder = "Apellido" type = "text" required>
                <input id ="correo-cliente"placeholder = "Correo" type = "text" required>
                </div>
            </div>
            
            <div id="" class="campo">
                <label>Numero de personas:</label>
                <input id = "numPersonas" class = "number" type="number" value = "1" min = "1" max = <?php echo $capacidad?> required>
            </div>

            <div id = "" class = campo>
                <label> Total a pagar: </label>
                <input id = "totalPagar" class = "total" type = "text" value = "$21341" readonly = "true">
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
            totalaPagarInput.value = totalaPagar;
        });
        });
    </script>

</main>
</html>