<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 02</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 2 - Inicializar y mostrar una variable heredoc.
            */
        
            //Creo una variable heredoc.
            //La variable heredoc te permite escribir código entre medias de la inicialización <<<EOD y el cierre EOD; y se comporta como si fuera una variable de una sola línea.
            $heredoc = <<<EOD
                    Mi nombre es Raúl,
                    esto es una variable heredoc.
                    EOD;
            echo "Hola " .$heredoc;
        ?>
    </body>
</html>

