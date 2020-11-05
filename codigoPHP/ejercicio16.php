<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 16</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 16 - Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
            */
            
            $array = ['Lunes' => 85, //Creo e inicializo un array asociativo con los días de la semana como $CLAVE y le añado un sueldo como $VALOR.
                      'Martes' => 75,
                      'Miércoles' => 65,
                      'Jueves' => 55,
                      'Viernes' => 45,
                      'Sábado' => 95,
                      'Domingo' => 105];
                       
                       $sueldo = 0; //Creo un acumulador y lo inicializo a 0.
                       
                       while(key($array)!=null){ //Compruebo si la posición 1 del array tiene algo dentro. Si lo tiene, lo acumulo.
                           $sueldo+=current($array); //Acumulo los valores de la posición en la que está.
                           next($array); //Avanzo una posición con la función next().
                       }
                       echo "<p><b>El sueldo de la semana que ha ganado es de: </b>" . $sueldo . "</p>"; //Muestro por pantalla el sueldo total.
        ?>
    </body>
</html>