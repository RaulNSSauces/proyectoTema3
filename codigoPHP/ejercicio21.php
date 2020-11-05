<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 21</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 21 - Construir un formulario para recoger un cuestionario realizado a una persona 
                             y enviarlo a una página Tratamiento.php para que muestrelas preguntas y las respuestas recogidas.
            */   
        ?>
        
        <form name="formulario1" action="TratamientoEjercicio21.php" method="post">
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
    </body>
</html>