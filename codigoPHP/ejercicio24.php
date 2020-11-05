<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 24</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 19-10-2020.
            * Ejercicio 24 - Construir un formulario para recoger un cuestionario realizado a una persona y mostrar 
                             en la  misma página las preguntas y las respuestasrecogidas; en el caso de que alguna respuesta esté vacía 
                             o errónea volverá a salir el formulario con el mensaje correspondiente, pero las respuestas que habíamos tecleado 
                             correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.
            */
        
            require_once '../core/201008libreriaValidacion.php';

            $aErrores = ["nombre" => null, //Creo un array de errores y lo inicializo a null.
                         "mascotas" => null,
                         "correo" => null,
                         "fecha" => null,
                         "dni" => null];
            
            define ('OBLIGATORIO',1); //Creo una constante $OBLIGATORIO y le asigno un 1.
            $entradaOk = true; //Creo una variable booleana y la inicializo a true.
            
            $aRespuesta = ["nombre" => null, //Creo un array de comprobación y lo inicializo a null.
                           "mascotas" => null,
                           "correo" => null,
                           "fecha" => null,
                           "dni" => null];
            
            if(isset ($_REQUEST['enviar'])){ //Compruebo que el usuario le ha dado al botón enviar.
                
                 $aErrores["nombre"] = validacionFormularios::comprobarAlfabetico($_REQUEST ["nombre"],500,3, OBLIGATORIO); //Compruebo que el campo nombre que introduce el usuario es válido.
                 $aErrores["mascotas"] = validacionFormularios::comprobarEntero($_REQUEST ["mascotas"], 500, 0); //Compruebo que el campo mascotas que introduce el usuario es válido.
                 $aErrores["correo"] = validacionFormularios::validarEmail($_REQUEST ["correo"], OBLIGATORIO); //Compruebo que el campo correo que introduce el usuario es válido.
                 $aErrores["fecha"] = validacionFormularios::validarFecha($_REQUEST["fecha"], "01/01/2022", "01/01/1900", OBLIGATORIO); //Compruebo que el campo fecha que introduce el usuario es válido.
                 $aErrores["dni"] = validacionFormularios::validarDni($_REQUEST["dni"], OBLIGATORIO); //Compruebo que el campo dni que introduce el usuario es válido.
                 
                 foreach ($aErrores as $clave => $valor){ //Recorro con un foreach el array de errores que está compuesto por la clave (nombre, edad, correo) y el valor (null).
                       if($valor!=null){ //Compruebo que el campo del formulario está rellenado.
                           $entradaOk=false; 
                       }
                   }
            }else{
                $entradaOk=false;
            }
            if($entradaOk){ //Si los campos son correctos los almaceno y se los muestro al usuario.
                
                $aRespuesta["nombre"] = $_REQUEST["nombre"];
                $aRespuesta["mascotas"] = $_REQUEST["mascotas"];
                $aRespuesta["correo"] = $_REQUEST["correo"];
                $aRespuesta["fecha"] = $_REQUEST["fecha"];
                $aRespuesta["dni"] = $_REQUEST["dni"];
                
                echo "<h3>Datos introducidos correctamente</h3>";
                echo "<p>Su nombre: ".$aRespuesta["nombre"]."</p>";
                echo "<p>Su número de mascotas es de: ".$aRespuesta["mascotas"]."</p>";
                echo "<p>Su correo: ".$aRespuesta["correo"]."</p>";
                echo "<p>Su fecha de nacimiento: ".$aRespuesta["fecha"]."</p>";
                echo "<p>Su DNI es: ".$aRespuesta["dni"]."</p>";
                
            }else{
                
        ?>
            <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF'];//Muestro la información del formulario en la misma página que se está ejecutando en el fichero actual.?>" method="post">
            <fieldset>
                <legend><b>INTRODUCE LOS SIGUIENTES DATOS</b></legend>
                    <div>
                        <b><label for="nombre">Nombre: </label></b>
                        <input type="text" name="nombre" placeholder="Introduce tu nombre" value="<?php 
                                if($aErrores["nombre"] == null && isset($_REQUEST["nombre"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["nombre"]; //Devuelve el campo que ha escrito previamente el usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["nombre"] != null) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores["nombre"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="edad">Mascotas: </label></b>
                        <input type="text" name="mascotas" placeholder="Nº de mascotas" value="<?php 
                                if($aErrores["mascotas"] == null && isset($_REQUEST["mascotas"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["mascotas"]; //Devuelve el campo que ha escrito previamente el usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["mascotas"] != null) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores["mascotas"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="correo">Correo: </label></b>
                        <input type="text" name="correo" placeholder="Email@gmail.com" value="<?php 
                                if($aErrores["correo"] == null && isset($_REQUEST["correo"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["correo"]; //Devuelve el campo que ha escrito previamente el usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["correo"] != null) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores["correo"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="fecha">Fecha de nacimiento: </label></b>
                        <input type="text" name="fecha" placeholder="AA/MM/DD" value="<?php 
                                if($aErrores["fecha"] == null && isset($_REQUEST["fecha"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["fecha"]; //Devuelve el campo que ha escrito previamente el usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["fecha"] != null) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores["fecha"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="dni">DNI: </label></b>
                        <input type="text" name="dni" placeholder="Ej: 12345678D" value="<?php 
                                if($aErrores["dni"] == null && isset($_REQUEST["dni"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["dni"]; //Devuelve el campo que ha escrito previamente el usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["dni"] != null) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores["dni"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
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