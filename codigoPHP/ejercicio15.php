<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 15</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 15 - Crear e inicializar un array con el sueldo percibido de lunes a domingo. 
                             Recorrer el array para calcular el sueldo percibido durante la semana. (Array asociativo con los nombres de los días de la semana).
            */
        
        $array = ['Lunes' => 85, //Creo e inicializo un array asociativo con los días de la semana como $CLAVE y le añado un sueldo como $VALOR.
                  'Martes' => 75,
                  'Miércoles' => 65,
                  'Jueves' => 55,
                  'Viernes' => 45,
                  'Sábado' => 95,
                  'Domingo' => 105];
                   $sueldo = 0; //Creo un acumulador y lo inicializo a 0.
                   foreach ($array as $clave => $valor){ //Recorro con un foreach el array que está compuesto por la clave y el valor.
                                      //$clave es el campo 1 del array (Ej:Lunes) y $valor es el contenido de la clave (Ej:85).
                       $sueldo+=$valor; //Acumulo el sueldo de los días de la semana a medida que voy recorriendo el array.
                   }
                   
                   echo "<p><b>El sueldo de la semana que ha ganado es de:</b> ".$sueldo." "."Euros"."</p>"; //Muestro el sueldo total de todos los días de la semana.
            
        ?>
    </body>
</html>

