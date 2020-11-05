<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 04</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián
            * @since: 12-10-2020
            * Ejercicio 4 - Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués.  
            */
        
            setlocale(LC_ALL, "pt_BR.utf-8"); //Con la función setlocale() establezco el idioma, en este caso en portugués.
        
            date_default_timezone_set("Europe/Lisbon"); //Con date_default_timezone_set() establezco la zona horaria, en este caso de Europa/Lisboa.

            $date = new DateTime(); //Creo una fecha.
            echo "<p><b>Fecha:</b> ".$date->format('d-m-Y H:i:s')."</p>"; //Muestro y formateo la hora para que aparezca en días (d), meses(m), años(Y), horas(H), minutos(i) y segundos(s).
            echo "<p><b>TimeStamp:</b> ".$date->getTimestamp()."</p>"; //Muestro el timestamp (segundos) con la función getTimestamp().
            echo "<p><b>Fecha y hora local usando strftime():</b> ". strftime("%A %d de %B de %Y , %T") . "</p>"; //Muestro la fecha y la hora utilizando strftime().
        ?>
    </body>
</html>
