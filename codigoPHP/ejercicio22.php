<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 22</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 22 - Construir un formulario para recoger un cuestionario realizado 
                             a una persona y mostrar en la misma página las preguntas y las respuestas recogidas.
            */
            
            if(isset ($_POST['enviar'])){ //Compruebo que el usuario le ha dado al botón enviar.

                require_once '../core/libreriaCalculadora.php';

                echo "<p><b>El primer número introducido ha sido el:</b> ".$_POST['numero1']."</p>\n"; //Muestro con un echo el primer número que introduce el usuario con la variable $_POST.
                echo "<p><b>El segundo número introducido ha sido el:</b> ".$_POST['numero2']."<p>\n"; //Muestro con un echo el segundo número que introduce el usuario con la variable $_POST.
                echo "<p><b>La suma entre ambos número es:</b> ". suma($_POST['numero1'], $_POST['numero2'])."</p>"; //Muestro con un echo la suma de los dos números que ha introducido el usuario con la variable $_POST.
            }else{
        ?>
            <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF'];//Muestro la información del formulario en la misma página que se está ejecutando en el fichero actual.?>" method="post">
            <fieldset>
                <legend>INTRODUCE LOS SIGUIENTES DATOS</legend>
                    <div>
                        <label for="numero1">Número 1</label>
                        <input type="text" name="numero1" placeholder="Introduce un número" required>
                    </div>
                <br>
                    <div>
                        <label for="numero2">Número 2</label>
                        <input type="text" name="numero2" placeholder="Introduce otro número" required>
                    </div>
                <br>
                    <button type="submit" name="enviar">Enviar</button>
                    <input type="reset" value="Borrar">
            </fieldset>
        </form>
        <?php
            }
        ?>
    </body>
</html>

