<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 07</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián
            * @since: 12-10-2020
            * Ejercicio 7 - Mostrar el nombre del fichero que se está ejecutando.  
            */
        
            $archivo = basename($_SERVER['PHP_SELF']); //Creo una variable y le añado la variable global $_SERVER['PHP_SELF'] para almacenar el nombre del fichero que se está ejecutando.
            echo ("<p><b>El nombre del archivo que se está ejecutando es:</b> ".$archivo."</p>"); //Muestro el contenido de la variable con un echo.
        ?>
    </body>
</html>
