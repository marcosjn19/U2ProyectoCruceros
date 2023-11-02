<?php
include("conexion.php");
$con = connection();

$sql = "SELECT * FROM CRUCERO";
$query = mysqli_query($con, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="admin-styles.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<br>
<div class="users-form">
        <h1>Formulario de Barco</h1>
        <form id = "formularioBarcos" name="formularioBarcos"action="insert.php" method="post" >
            <label for="idBarco">ID del Barco:</label>
            <input type="text" id="id_crucero" name="id_crucero" required><br>
            
            

            <label for="nombreBarco">Nombre del Barco:</label>
            <input type="text" id="nombreBarco" name="nombreBarco" required><br>
        

            <label for="destinoBarco">Destino Barco:</label>
            <input type="text" id="destinoBarco" name="destinoBarco" required><br>
            

            <label for="descripcionCorta">Descripción Corta:</label>
            <textarea id="descripcionCorta" name="descripcionCorta" rows="4" cols="50" required></textarea><br>
            

            <label for="fechaInicio">Fecha de Inicio:</label>
            <input type="date" id="fechaInicio" name="fechaInicio" required><br>
            

            <label for="fechaSalida">Fecha de Salida:</label>
            <input type="date" id="fechaSalida" name="fechaSalida" required><br>
            

            <label for="itinerario">Itinerario:</label>
            <textarea id="itinerario" name="itinerario" rows="4" cols="50" required></textarea><br>
            
            
            <label for="imagen">imagen del Barco:</label>
            <input type="text" id="imagenBarco" name="imagenBarco" required><br>
            
            
            <input type="submit" value="insertar" name="insertar">      
    
        
        </form>
</div>

<div class="users-table">
        <h2>Usuarios registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID barco</th>
                    <th>Destino</th>                
                    <th>fecha inicio</th>
                    <th>fecha salida</th>
                    <th>Nombre Barco</th>
                    <th>Descripcion Corta</th>
                    <th>intinerario</th>
                    <th>imagen del barco</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id_crucero'] ?></th>
                        <th><?= $row['destino_crucero'] ?></th>
                        <th><?= $row['fechainicio_crucero'] ?></th>
                        <th><?= $row['fechacierre_crucero'] ?></th>
                        <th><?= $row['barco_crucero'] ?></th>
                        <th><?= $row['descripcion_crucero'] ?></th>
                        <th><?= $row['itinerario_crucero'] ?></th>
                        <th><?= $row['refimagen_crucero'] ?></th>
                        
                        <th><a href="update.php?id_crucero=<?= $row['id_crucero'] ?>" >Editar</a></th>
                        <th><a href="delete.php?id_crucero=<?= $row['id_crucero'] ?>" >Eliminar</a></th>
                       
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
      
        
      
</body>
</html>