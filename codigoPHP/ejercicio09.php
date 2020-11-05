<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 09</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 9 - Mostrar el path donde se encuentra el fichero que se está ejecutando.  
            */
        
            echo "<h1>Ruta en la que se encuentra el fichero que se está ejecutando:</h1>";
            
            echo __FILE__; //Muestro con un echo la clase __FILE__ para que me muestra la ruta del fichero que se está ejecutando.
            
        ?>
        
    </body>
</html>

