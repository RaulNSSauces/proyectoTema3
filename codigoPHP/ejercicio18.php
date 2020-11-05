<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 18</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 18 - Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
            */
            
            for ($fila=1; $fila<=20; $fila++){ //Recorro con un for las filas del teatro, de 1 a 20.
                    $aTeatro [$fila] = []; 
                for($asiento=1; $asiento<=15; $asiento++){ //Recorro con un for los asientos del teatro, de 1 a 15.
                    $aTeatro [$fila] [$asiento] = null; //Creo e inicializo un array bidimensional compuesto por filas y columnas inicializado a null (vacío).
                }
            }
            
            //Asigno un valor a las posiciones del array del teatro.
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
            
            for ($fila=1; $fila<=20; $fila++){ //Recorro con un for las filas del teatro, de 1 a 20.
                for($asiento=1; $asiento<=15; $asiento++){ //Recorro con un for los asientos del teatro, de 1 a 15.
                    if(!empty($aTeatro[$fila][$asiento])){ //Compruebo que el asiento no está vacío.
                        echo $persona; //Si no está vacío, me muestra la persona que lo ocupa.
                    }
                }
            }
            
            $fila = 1; //Inicializo las filas a 1;
            
            while($fila<=20){ //Compruebo si la posición 1 del array tiene algo dentro. Si lo tiene, lo acumulo.
                $asiento = 1; //Inicializo los asientos a 1;
                while($asiento<=15){
                    if(!empty($aTeatro[$fila][$asiento])){ //Compruebo que el asiento no está vacío.
                        echo $persona; //Si no está vacío, me muestra la persona que lo ocupa.
                    }
                    $asiento++; //Incremento los asientos de uno en uno.
                }
                $fila++; //Incremento las filas de uno en uno.
            }
        ?>
    </body>
</html>