<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 14</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 14 - Comprobar las librerías que estás utilizando en tu entorno de desarrollo y explotación. 
                             Crear tu propia librería de funciones y estudiar laforma de usarla en el entorno de desarrollo y en el de explotación.
            */
        
           $numero1 = 15; //Creo e inicializo una varibable de tipo entero.
           $numero2 = 5; //Creo e inicializo otra varibable de tipo entero.
           
           require_once '../core/libreriaCalculadora.php'; //Utilizo la sentencia require_once para utilizar la librería que he creado.
           
           echo "<p>La suma de ".$numero1."es ". suma($numero1, $numero2)."/p>"; //Muestro por pantalla con un echo la suma de las variables anteriores llamando a las funciones que he creado en otro fichero.
           echo "<p>La resta de ".$numero1."es ". resta($numero1, $numero2)."/p>"; //Muestro por pantalla con un echo la resta de las variables anteriores llamando a las funciones que he creado en otro fichero.
           echo "<p>La multiplicación de ".$numero1."es ". multiplicacion($numero1, $numero2)."/p>"; //Muestro por pantalla con un echo la multiplicación de las variables anteriores llamando a las funciones que he creado en otro fichero.
           echo "<p>La division de ".$numero1."es ". division($numero1, $numero2)."/p>"; //Muestro por pantalla con un echo la división de las variables anteriores llamando a las funciones que he creado en otro fichero.
        ?>
    </body>
</html>