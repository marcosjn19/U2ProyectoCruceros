<?php

include("conexion.php");
$con = connection();

$id=$_GET['id_crucero'];

    $sql="SELECT * FROM crucero WHERE id_crucero='$id'";
    $query=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($query);
    
    //consulta cabinas_cruceros
    $sql1 = "SELECT * FROM cabina_crucero WHERE id_crucero = 
    (SELECT id_crucero FROM crucero WHERE id_crucero = '$id')";
    $query1 = mysqli_query($con, $sql1); 
    $row1 = mysqli_fetch_array($query1);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="admin-styles.css" rel="stylesheet">
        <title>Editar usuarios</title>
        
    </head>
    <body>
        
        <h2 class="titulo"> Actualizacion de crucero</h2>
        <div class="users-form">
            <form action="edit_usuarios.php" method="POST">
                <input type="hidden" name="id_barco" id="id_barco" value="<?= $row['id_crucero']?>">
                <p>Nombre del Crucero:</p>
                <br> <input type="text" id="nombreBarco" name="nombreBarco" placeholder="nombre Barco" value="<?= $row['barco_crucero']?>">
                <p>Destino del Crucero:</p>
                <br> <input type="text" id="destinoBarco" name="destinoBarco" placeholder="destino" required value="<?= $row['destino_crucero']?>">
                <p>Descripcion del crucero:</p>
                <br> <textarea id="descripcionCorta" name="descripcionCorta" placeholder="descripcion" rows="4" cols="50" required><?= $row['descripcion_crucero']?></textarea>
                <p>Fecha de Inicio del viaje:</p>
                <br> <input type="date" id="fechaInicio" name="fechaInicio" placeholder="fechainicio"  value="<?= $row['fechainicio_crucero']?>">
                <p>Fecha de salida del viaje:</p>
                <br><input type="date" id="fechaSalida" name="fechaSalida" placeholder="fechaSalida" value="<?= $row['fechacierre_crucero']?>">
                <p>Intinerario:</p>
                <br> <textarea id="itinerario" name="itinerario" rows="4" placeholder="intinerario" cols="50"> <?= $row['itinerario_crucero']?> </textarea>
                <p>Imagen del crucero:</p>
                <br><input type="text" id="imagenBarco" placeholder="imagen" name="imagenBarco" value="<?= $row['refimagen_crucero']?>">
               

        
<div class="users-table">
        <h2>Cabinas</h2>
        <table >
            <thead>
                <tr>
                    <th>ID-RCC</th>
                    <th>ID-CABINA</th>
                    <th>ID_CRUCERO</th>
                    <th>DISPONIBLE</th>
                    <th>PRECIO</th>                              
                </tr>
            </thead>
            <tbody>
                <?php while ($row1  = mysqli_fetch_array($query1)): ?>
                    <tr>
                        <th><input type ="hidden" id = "id_rcc[]" name ="id_rcc[]" value ="<?= $row1 ['id_rcc'] ?> "><?= $row1 ['id_rcc'] ?></th>
                        <th><input type ="hidden" id = "id_cabina[]" name="id_cabina[]" value= "<?= $row1 ['id_cabina'] ?>"><?= $row1 ['id_cabina'] ?></th>
                        <th><input type ="hidden" id = "id_crucero[]" name="id_crucero[]" value = "<?= $row1 ['id_crucero'] ?>" ><?= $row1 ['id_crucero'] ?></th>
                        <th><input type="text"  size="1" id="disponible_cabina[]" name="disponible_cabina[]" placeholder="disponible_cabina" value ="<?= $row1['disponible_rcc'] ?>"></th>
                        <th><input type="text" size="4" id="precio_cabina[]" name="precio_cabina[]" placeholder="precio_cabina" value ="<?= $row1 ['precio_rcc'] ?>"></th>                                     
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <input type="submit" value="Actualizar">
        
</div>       
</div>
</form>
       
    </body>
</html>