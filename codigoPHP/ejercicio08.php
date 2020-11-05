<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 08</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián
            * @since: 12-10-2020
            * Ejercicio 8 - Mostrar la dirección IP del equipo desde el que estás accediendo.  
            */
        
            echo "<h1>Dirección IP del equipo por el que accedo</h1>";
            
            $direccion = $_SERVER['REMOTE_ADDR']; //Creo una variable y le añado el contenido de la variable global $_SERVER['REMOTE_ADDR'] para guardar en la variable la dirección IP con la que estoy accediendo.
            
            echo $direccion; //Muestro el contenido de la variable con un echo.
        ?>
    </body>
</html>

