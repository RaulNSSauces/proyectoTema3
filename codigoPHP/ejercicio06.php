<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 06</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 6 - Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días.
            */
        
            date_default_timezone_set("Europe/Madrid"); //Establezco la zona horaria de mi país.
            $date = new DateTime(); //Creo una nueva fecha.
            
            $date->add(new DateInterval('P60D')); //A la fecha creada anteriormente le creo y añado un intervalo (P60D) post 60 days para incrementar 60 días a la fecha de hoy.
            
            echo ("<p><b>La fecha actual más 60 días: </b>".$date->format('d-m-Y')."</p>"); //Muestro el contenido de la variable con un echo y formateo la hora para que aparezca en días (d), meses(m), años(Y), horas(H), minutos(i) y segundos(s).
        ?>
    </body>
</html>