<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 01</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 1 - Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r,var_dump).
            */
        
            $cadena = "Cadena"; //Creo e inicializo una variable de tipo String.
            $entero = 50; //Creo e inicializo una variable de tipo entero.
            $decimal = 28.5; //Creo e inicializo una variable de tipo float.
            $boleano = true; //Creo e inicializo una variable de tipo boleana.
            
            echo "<h3>Mostrar por pantalla con echo</h3>";
            
            //Muestro por pantalla con un echo las variables creadas e inicializadas con anterioridad.
            
            echo "Mostrar por pantalla un string con un echo: " . $cadena . "<br>";
            echo "Mostrar por pantalla un entero con un echo: " . $entero . "<br>";
            echo "Mostrar por pantalla un decimal con un echo: " . $decimal . "<br>";
            echo "Mostrar por pantalla un boolean con un echo: " . $boleano . "<br>";
            
            echo "<h3>Mostrar por pantalla con print</h3>";
            
            //Muestro por pantalla con un print las variables creadas e inicializadas con anterioridad.
            
            print "Montrar por pantalla un string con un print: " . $cadena . "<br>";
            print "Montrar por pantalla un entero con un print: " . $entero . "<br>";
            print "Montrar por pantalla un decimal con un print: " . $decimal . "<br>";
            print "Montrar por pantalla un boolean con un print: " . $boleano . "<br>";
            
            echo "<h3>Mostrar por pantalla con printf</h3>";
            
            //Muestro por pantalla con un printf las variables creadas e inicializadas con anterioridad.
            
            printf("Mostrar por pantalla un string con un printf = %s<br>", $cadena);
            printf("Mostrar por pantalla un entero con un printf = %d<br>", $entero);
            printf("Mostrar por pantalla un decimal con un printf = %f<br>", $decimal);
            printf("Mostrar por pantalla un boolean con un printf = %s\n", $boleano);
            
            echo "<h3>Mostrar por pantalla con print_r</h3>";
            
            //Muestro por pantalla con un print_r las variables creadas e inicializadas con anterioridad.
           
            print_r("Mostrar por pantalla un string con un print_r: " . $cadena);
            echo "<br>";
            print_r("Mostrar por pantalla un entero con un print_r: " . $entero);
            echo "<br>";
            print_r("Mostrar por pantalla un decimal con un print_r: " . $decimal);
            echo "<br>";
            print_r("Mostrar por pantalla un boolean con un print_r: " . $boleano);
            
            echo "<h3>Mostrar por pantalla con var_dump</h3>";
            
            //Muestro por pantalla con un var_dump las variables creadas e inicializadas con anterioridad.
            
            var_dump("Mostrar por pantalla un string con un var_dump: " . $cadena);
            echo "<br>";
            var_dump("Mostrar por pantalla un entero con un var_dump: " . $entero);
            echo "<br>";
            var_dump("Mostrar por pantalla un decimal con un var_dump: " . $decimal);
            echo "<br>";
            var_dump("Mostrar por pantalla un boolean con un var_dump: " . $boleano);
        ?>
    </body>
</html>

