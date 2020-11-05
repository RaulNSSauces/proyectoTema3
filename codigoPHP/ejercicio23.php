<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 23</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 12-10-2020.
            * Ejercicio 23 - Construir un formulario para recoger un cuestionario realizado a una persona 
                             y mostrar en la misma página las preguntas y las respuestas recogidas; en el caso de que alguna 
                             respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente.
            */
        
            require_once '../core/201008libreriaValidacion.php';

            $aErrores = ["nombre" => null, //Creo un array para acumular los posibles errores y lo inicializo a null para que esté vacío.
                           "edad" => null,
                           "correo" => null];
            $obligatorio = 1; //Creo e inicializo la variable $obligatorio a 1, para añadirlo a los campos que deban ser obligatorios.
            $entradaOk = true; ///Creo una variable booleana y la inicializo a true.
            
            $aComprobar = ["nombre" => null, //Creo un array de comprobación y lo inicializo a null.
                           "edad" => null,
                           "correo" => null];
            
            if(isset ($_REQUEST['enviar'])){ //Compruebo que el usuario le ha dado al botón enviar.
                 $aErrores["nombre"] = validacionFormularios::comprobarAlfabetico($_REQUEST ["nombre"],500,1,$obligatorio); //Compruebo que el campo nombre que introduce el usuario es válido.
                 $aErrores["edad"] = validacionFormularios::comprobarEntero($_REQUEST ["edad"], 500, 1, $obligatorio); //Compruebo que el campo edad que introduce el usuario es válido.
                 $aErrores["correo"] = validacionFormularios::validarEmail($_REQUEST ["correo"], $obligatorio); //Compruebo que el campo correo que introduce el usuario es válido.
                 foreach ($aErrores as $clave => $valor){ //Recorro con un foreach el array que está compuesto por la clave y el valor.
                       if($valor!=null){ //Recorro con un foreach el array de errores que está compuesto por la clave (nombre, edad, correo) y el valor (null).
                           $entradaOk=false;
                       }
                   }
            }else{
                $entradaOk=false;
            }
            if($entradaOk){
                $aComprobar["nombre"] = $_REQUEST["nombre"];
                $aComprobar["edad"] = $_REQUEST["edad"];
                $aComprobar["correo"] = $_REQUEST["correo"];
                
                echo "<h3>Datos introducidos correctamente</h3>";
                echo "<p>Su nombre: ".$aComprobar["nombre"]."</p>";
                echo "<p>Su edad: ".$aComprobar["edad"]."</p>";
                echo "<p>Su correo: ".$aComprobar["correo"]."</p>";
            }else{
                
        ?>
            <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF'];//Muestro la información del formulario en la misma página que se está ejecutando en el fichero actual.?>" method="post">
            <fieldset>
                <legend>INTRODUCE LOS SIGUIENTES DATOS</legend>
                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" placeholder="Introduce tu nombre">
                            <?php
                                if ($aErrores["nombre"] != null) { 
                                    echo $aErrores["nombre"];
                                }
                            ?>
                    </div>
                <br>
                    <div>
                        <label for="edad">Edad</label>
                        <input type="text" name="edad" placeholder="Introduce tu edad">
                            <?php
                                if ($aErrores["edad"] != null) { 
                                    echo $aErrores["edad"];
                                }
                            ?>
                        <br>
                    </div>
                    <div>
                        <label for="correo">Correo</label>
                        <input type="text" name="correo" placeholder="Introduce tu correo">
                            <?php
                                if ($aErrores["correo"] != null) { 
                                    echo $aErrores["correo"];
                                }
                            ?>
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