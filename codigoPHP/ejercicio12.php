<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 12</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 12 - Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).
            */
           
           echo "<h3><b>Contenido de las variables con print_r: </b></h3>";
           
           echo "<pre>";
           
           echo "<h3>Mostrar la variable GLOBALS con un print_r</h3>";
           print_r($GLOBALS); //Muestro la variable $GLOBALS con un print_r.
           echo "<h3>Mostrar la variable SERVER con un print_r</h3>";
           print_r($_SERVER); //Muestro la variable $_SERVER con un print_r.
           echo "<h3>Mostrar la variable GET con un print_r</h3>";
           print_r($_GET); //Muestro la variable $_GET con un print_r.
           echo "<h3>Mostrar la variable POST con un print_r</h3>";
           print_r($_POST); //Muestro la variable $_POST con un print_r.
           echo "<h3>Mostrar la variable FILES con un print_r</h3>";
           print_r($_FILES); //Muestro la variable $_FILES con un print_r.
           echo "<h3>Mostrar la variable COOKIE con un print_r</h3>";
           print_r($_COOKIE); //Muestro la variable $_COOKIE con un print_r.
           echo "<h3>Mostrar la variable SESSION con un print_r</h3>";
           print_r($_SESSION); //Muestro la variable $_SESSION con un print_r.
           echo "<h3>Mostrar la variable REQUEST con un print_r</h3>";
           print_r($_REQUEST); //Muestro la variable $_REQUEST con un print_r.
           echo "<h3>Mostrar la variable ENV con un print_r</h3>";
           print_r($_ENV); //Muestro la variable $_ENV con un print_r.
           
           echo "<h3><b>Contenido de las variables con foreach(): </b></h3>";
           
           echo "<p><b>Variable GLOBALS: </b></p>";
           foreach ($GLOBALS as $clave => $valor) { //Recorro con un foreach la variable $GLOBALS.
           echo "{$clave} => {$valor} <br>";
           }
           
           echo "<p><b>Variable _SERVER: </b></p>";
           foreach ($_SERVER as $clave => $valor) { //Recorro con un foreach la variable $_SERVER.
           echo "{$clave} => {$valor} <br>";
           }
           
           echo "<p><b>Variable _GET: </b></p>";
           foreach ($_GET as $clave => $valor) { //Recorro con un foreach la variable $_GET.
           echo "{$clave} => {$valor} <br>";
           }
           
           echo "<p><b>Variable _POST: </b></p>";
           foreach ($_POST as $clave => $valor) { //Recorro con un foreach la variable $_POST.
           echo "{$clave} => {$valor} <br>";
           }
           
           echo "<p><b>Variable _FILES: </b></p>";
           foreach ($_FILE as $clave => $valor) { //Recorro con un foreach la variable $_FILE.
           echo "{$clave} => {$valor} <br>";
           }
           
           echo "<p><b>Variable _COOKIE: </b></p>";
           foreach ($_COOKIE as $clave => $valor) { //Recorro con un foreach la variable $_COOKIE.
           echo "{$clave} => {$valor} <br>";
           }
           
           echo "<p><b>Variable _SESSION: </b></p>";
           foreach ($_SESSION as $clave => $valor) { //Recorro con un foreach la variable $_SESSION.
           echo "{$clave} => {$valor} <br>"; 
           }
           
           echo "<p><b>Variable _REQUEST: </b></p>";
           foreach ($_REQUEST as $clave => $valor) { //Recorro con un foreach la variable $_REQUEST.
           echo "{$clave} => {$valor} <br>";
           }
           
           echo "<p><b>Variable _ENV: </b></p>";
           foreach ($_ENV as $clave => $valor) { //Recorro con un foreach la variable $_GLOBALS_ENV.
           echo "{$clave} => {$valor} <br>"; 
           }
           
           echo "</pre>";
        ?>
    </body>
</html>