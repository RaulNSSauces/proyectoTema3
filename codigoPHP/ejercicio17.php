<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 17</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 17 - Inicializar un array (bidimensional con dos índices numéricos) 
                             donde almacenamos el nombre de las personas que tienen reservado elasiento en un teatro de 20 filas y 15 asientos por fila. 
                            (Inicializamos el array ocupando únicamente 5 asientos). 
                             Recorrer el array condistintas técnicas (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan.
            */
            
            for ($fila=1; $fila<=20; $fila++){ //Recorro con un for las filas del teatro, de 1 a 20.
                    $aTeatro [$fila] = []; //Inicializo las filas a null.
                for($asiento=1; $asiento<=15; $asiento++){ //Recorro con un for los asientos del teatro, de 1 a 15.
                    $aTeatro [$fila] [$asiento] = null; //Creo e inicializo un array bidimensional compuesto por filas y columnas inicializado a null (vacío).
                }
            }
            
            //Asigno un valor a las posiciones.
            $aTeatro [2][4] = "Jorge"; 
            $aTeatro [3][8] = "Cristian";
            $aTeatro [18][14] = "Rubén";
            $aTeatro [15][12] = "Bassi";
            $aTeatro [7][5] = "Alberto";
            
            foreach ($aTeatro as $fila => $asientos ){ //Recorro con un foreach las filas.
                foreach ($asientos as $asiento => $persona){ //Recorro con un foreach los asientos de las filas. 
                    if(!empty($persona)){ //Compruebo que el asiento no está vacío.
                        echo $persona; //Si no está vacío, me muestra la persona que lo ocupa.
                    }
                }
            }
        ?>
    </body>
</html>