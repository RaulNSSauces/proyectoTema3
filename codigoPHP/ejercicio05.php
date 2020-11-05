<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 05</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 5 - Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp).
            */
        
            setlocale(LC_ALL, 'es_ES'); //Con la función setlocale() establezco el idioma, en este caso en español.
            $date = new DateTime(null, new DateTimeZone('Europe/Madrid')); //Creo e inicializo una fecha pasandole como parámetro un null para que me muestre la de hoy y le paso la zona horaria en al que quiero esa hora con DateTimeZone().
            echo ("<p><b>La marca del tiempo con TIMESTAMP: </b>".$date->getTimestamp()."</p>"); //Muestro con un echo el timestamp (segundos) con la función getTimestamp().
        ?>
    </body>
</html>

