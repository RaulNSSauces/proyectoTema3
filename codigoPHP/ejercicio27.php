<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 27</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 21-10-2020.
            * Ejercicio 01 - (Aplicación de recogida de datos y análisis de resultados) podamos utilizar para recoger 
                              las respuestas a una encuesta de varias preguntas realizada a 3-5 personas, el usuario de la página web 
                              tecleará las respuestas y recibirá como respuesta un resumen con algún tipo de calculo, resumen o tratamiento 
                              sobre las respuestas a al encuesta. Entre las respuestas tienen que haber, respuestas textuales, respuestas si/no, 
                              fechas, números enteros, números decimales,...
            */
        
            require_once '../core/201008libreriaValidacion.php';
            
            define ('OBLIGATORIO',1); //Creo una constante $OBLIGATORIO y le asigno un 1.
            $entradaOk = true; //Creo una variable booleana y la inicializo a true.

            for($repetir=1; $repetir<=3; $repetir++){ //Recorro con un for 3 veces los arrays creados a continuación.
                
                $aErrores[$repetir] = ["nombreyapellidos".$repetir => null, //Creo un array bidimensional de errores e inicializo sus campos a null.
                                       "dni".$repetir => null,
                                       "telefono".$repetir => null,
                                       "cp".$repetir => null,
                                       "mascotas".$repetir => null, 
                                       "correo".$repetir => null,
                                       "fecha".$repetir => null,
                                       "peso".$repetir => null,
                                       "pregunta".$repetir => null,
                                       "usuario".$repetir => null,
                                       "contraseña".$repetir => null,
                                       "lista".$repetir => null];
                    
                $aRespuesta[$repetir] = ["nombreyapellidos".$repetir => null,
                                         "dni".$repetir => null,
                                         "telefono".$repetir => null,
                                         "cp".$repetir => null,
                                         "mascotas".$repetir => null, //Creo un array bidimensional de comprobación e inicializo sus campos a null.
                                         "correo".$repetir => null,
                                         "fecha".$repetir => null,
                                         "peso".$repetir => null,
                                         "pregunta".$repetir => null,
                                         "usuario".$repetir => null,
                                         "contraseña".$repetir => null,
                                         "lista".$repetir => null];
                                         
            }
            
            if(isset ($_REQUEST['enviar'])){ //Compruebo que el usuario le ha dado al botón enviar.
                
                for($repetir=1; $repetir<=3; $repetir++){ //Recorro con un for el array de errores.

                    $aErrores[$repetir]["nombreyapellidos".$repetir] = validacionFormularios::comprobarAlfabetico($_REQUEST["nombreyapellidos".$repetir], 50, 4, OBLIGATORIO);
                    $aErrores[$repetir]["dni".$repetir] = validacionFormularios::validarDni($_REQUEST["dni".$repetir], OBLIGATORIO); //Compruebo que el campo dni que introduce el usuario es válido.
                    $aErrores[$repetir]["telefono".$repetir] = validacionFormularios::validaTelefono($_REQUEST["telefono".$repetir], OBLIGATORIO);
                    $aErrores[$repetir]["cp".$repetir] = validacionFormularios::validarCp($_REQUEST["cp".$repetir], OBLIGATORIO);
                    $aErrores[$repetir]["mascotas".$repetir] = validacionFormularios::comprobarEntero($_REQUEST["mascotas".$repetir], 500, 0); //Compruebo que el campo mascotas que introduce el usuario es válido.
                    $aErrores[$repetir]["correo".$repetir] = validacionFormularios::validarEmail($_REQUEST["correo".$repetir], OBLIGATORIO); //Compruebo que el campo correo que introduce el usuario es válido.
                    $aErrores[$repetir]["fecha".$repetir] = validacionFormularios::validarFecha($_REQUEST["fecha".$repetir], "01/01/2022", "01/01/1900", OBLIGATORIO); //Compruebo que el campo fecha que introduce el usuario es válido.
                    $aErrores[$repetir]["peso".$repetir] = validacionFormularios::comprobarFloat($_REQUEST["peso".$repetir], 10, 1);
                    $aErrores[$repetir]["pregunta".$repetir] = validacionFormularios::comprobarNoVacio($_REQUEST["pregunta".$repetir], OBLIGATORIO);
                    $aErrores[$repetir]["usuario".$repetir] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["usuario"], 20, 3);
                    $aErrores[$repetir]["contraseña".$repetir] = validacionFormularios::validarPassword($_REQUEST["contraseña".$repetir], 1);
                    $aErrores[$repetir]["lista".$repetir] = validacionFormularios::validarElementoEnLista($_REQUEST["lista".$repetir], array ("gato", "perro", "otro"));
                }
                    foreach ($aErrores as $campo => $errores){ //Recorro con un foreach el array de errores.
                        foreach ($errores as $error => $valor){ //Recorro con otro foreach el campo de cada error. 
                            if($valor != null){ //Compruebo que el campo está vacío y no tiene errores.
                                $entradaOk=false; //Si no está vacío, el usuario ha introducido correctamente los datos.
                                $_REQUEST[$campo]="";
                            }
                        }
                    }                
            }else{
                $entradaOk=false; //Si no está vacío no continua.
            }
                
            if($entradaOk){ //Compruebo que los campos introducidos por el usuario son correctos.
                for($repetir=1; $repetir<=3; $repetir++){ //Recorro el array $aRespuesta.
                    
                $aRespuesta[$repetir]["nombreyapellidos".$repetir] = $_REQUEST["nombreyapellidos".$repetir];
                $aRespuesta[$repetir]["dni".$repetir] = $_REQUEST["dni".$repetir]; //Le asigno el valor introducido por el usuario del campo dni.
                $aRespuesta[$repetir]["telefono".$repetir] = $_REQUEST["telefono".$repetir];
                $aRespuesta[$repetir]["cp".$repetir] = $_REQUEST["cp".$repetir];
                $aRespuesta[$repetir]["mascotas".$repetir] = $_REQUEST["mascotas".$repetir]; //Le asigno el valor introducido por el usuario del campo mascotas.
                $aRespuesta[$repetir]["correo".$repetir] = $_REQUEST["correo".$repetir]; //Le asigno el valor introducido por el usuario del campo correo.
                $aRespuesta[$repetir]["fecha".$repetir] = $_REQUEST["fecha".$repetir]; //Le asigno el valor introducido por el usuario del campo fecha.
                $aRespuesta[$repetir]["peso".$repetir] = $_REQUEST["peso".$repetir];
                $aRespuesta[$repetir]["pregunta".$repetir] = $_REQUEST["pregunta".$repetir];
                $aRespuesta[$repetir]["usuario".$repetir] = $_REQUEST["usuario".$repetir];
                $aRespuesta[$repetir]["contraseña".$repetir] = $_REQUEST["contraseña".$repetir];
                $aRespuesta[$repetir]["lista".$repetir] = $_REQUEST["lista".$repetir];
                }
                
                for($respuesta=1; $respuesta<=3; $respuesta++){ //Recorro con un for las respuestas y se las muestro a cada usuario.
                    
                    echo "<h3>Datos introducidos correctamente</h3>";
                   
                    echo "<p><b>Su nombre es:</b> ".$aRespuesta[$respuesta]["nombreyapellidos".$respuesta];
                    echo "<p><b>Su DNI es:</b> ".$aRespuesta[$respuesta]["dni".$respuesta]."</p>";
                    echo "<p><b>Su número de teléfono es:</b> ".$aRespuesta[$respuesta]["telefono".$respuesta]."</p>";
                    echo "<p><b>Su código postal es:</b> ".$aRespuesta[$respuesta]["cp".$respuesta]."</p>";
                    echo "<p><b>Su número de mascotas es de:</b> ".$aRespuesta[$respuesta]["mascotas".$respuesta]."</p>";
                    echo "<p><b>Su correo es:</b> ".$aRespuesta[$respuesta]["correo".$respuesta]."</p>";
                    echo "<p><b>La fecha de nacimiento de su mascota es:</b> ".$aRespuesta[$respuesta]["fecha".$respuesta]."</p>";
                    echo "<p><b>El peso de su mascota es:</b> ".$aRespuesta[$respuesta]["peso".$respuesta]."</p>";
                    echo "<p><b>Ha introducido la respuesta:</b> ".$aRespuesta[$respuesta]["pregunta".$respuesta]."</p>";
                    echo "<p><b>Su nombre de usuario es:</b> ".$aRespuesta[$respuesta]["usuario".$respuesta]."</p>";
                    echo "<p><b>Su contraseña es:</b> ".$aRespuesta[$respuesta]["contraseña".$respuesta]."</p>";
                    echo "<p><b>Usted ha seleccionado la opción:</b> ".$aRespuesta[$respuesta]["lista".$respuesta]."</p>";
                    
                }
                
            }else{
                
        ?>
            <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF'];//Muestro la información del formulario en la misma página que se está ejecutando en el fichero actual.?>" method="post">
            <fieldset>
                <legend><b>INTRODUCE LOS SIGUIENTES DATOS</b></legend>
                <?php
                    for($repetir=1; $repetir<=3; $repetir++){ //Muestro el formulario 3 veces.
                ?>
                    
                <br>
                    <!---------------------------- NOMBRE Y APELLIDOS -------------------------------------------->
                    <div>
                        <b><label for="nombreyapellidos">Introduce tu nombre y apellidos: </label></b>
                        <input style="background-color:#f5b7b1;" type="text" name="<?php echo"nombreyapellidos".$repetir;?>" placeholder="Nombre y apellidos(*)" value="<?php 
                                if(isset($_REQUEST["nombreyapellidos".$repetir])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["nombreyapellidos".$repetir]; //Devuelve el campo que ha escrito previamente el usuario a cada usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if (!is_null($aErrores[$repetir]["nombreyapellidos".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores[$repetir]["nombreyapellidos".$repetir]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <!---------------------------- DNI -------------------------------------------->
                    <div>
                        <b><label for="dni">Introduce tu DNI: </label></b>
                        <input style="background-color:#f5b7b1;" type="text" name="<?php echo"dni".$repetir;?>" placeholder="Ej: 12345678D(*)" value="<?php 
                                if(isset($_REQUEST["dni".$repetir])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["dni".$repetir]; //Devuelve el campo que ha escrito previamente el usuario a cada usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if (!is_null($aErrores[$repetir]["dni".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores[$repetir]["dni".$repetir]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <!---------------------------- NÚMERO DE TELÉFONO -------------------------------------------->
                    <div>
                        <b><label for="telefono">Introduce un número de contacto: </label></b>
                        <input style="background-color:#f5b7b1;" type="tel" name="<?php echo"telefono".$repetir;?>" placeholder="666666666(*)" value="<?php 
                                if(isset($_REQUEST["telefono".$repetir])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["telefono".$repetir]; //Devuelve el campo que ha escrito previamente el usuario a cada usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if (!is_null($aErrores[$repetir]["telefono".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores[$repetir]["telefono".$repetir]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <!---------------------------- CÓDIGO POSTAL -------------------------------------------->
                    <div>
                        <b><label for="cp">Introduzca su código postal: </label></b>
                        <input style="background-color:#f5b7b1;" type="cp" name="<?php echo"cp".$repetir;?>" placeholder="Ej: 49600(*)" value="<?php 
                                if(isset($_REQUEST["cp".$repetir])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["cp".$repetir]; //Devuelve el campo que ha escrito previamente el usuario a cada usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if (!is_null($aErrores[$repetir]["cp".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores[$repetir]["cp".$repetir]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <!---------------------------- NÚMERO DE MASCOTAS -------------------------------------------->
                    <div>
                        <b><label for="mascotas">Número de mascotas que tienes en casa: </label></b>
                        <input style="background-color:#abebc6;" type="number" name="<?php echo"mascotas".$repetir;?>" placeholder="" value="<?php 
                                if(isset($_REQUEST["mascotas".$repetir])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["mascotas".$repetir]; //Devuelve el campo que ha escrito previamente el usuario a cada usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if (!is_null($aErrores[$repetir]["mascotas".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores[$repetir]["mascotas".$repetir]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <!---------------------------- CORREO ELECTRÓNICO -------------------------------------------->
                    <div>
                        <b><label for="correo">Introduce tu correo electrónico: </label></b>
                        <input style="background-color:#f5b7b1;" type="text" name="<?php echo"correo".$repetir;?>" placeholder="Email@gmail.com(*)" value="<?php 
                                if(isset($_REQUEST["correo".$repetir])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["correo".$repetir]; //Devuelve el campo que ha escrito previamente el usuario a cada usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if (!is_null($aErrores[$repetir]["correo".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores[$repetir]["correo".$repetir]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <!---------------------------- FECHA DE NACIMIENTO -------------------------------------------->
                    <div>
                        <b><label for="fecha">Fecha de nacimiento de la mascota: </label></b>
                        <input style="background-color:#f5b7b1;" type="date" name="<?php echo"fecha".$repetir;?>" placeholder="" value="<?php 
                                if(isset($_REQUEST["fecha".$repetir])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["fecha".$repetir]; //Devuelve el campo que ha escrito previamente el usuario a cada usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if (!is_null($aErrores[$repetir]["fecha".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores[$repetir]["fecha".$repetir]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <!---------------------------- PESO -------------------------------------------->
                    <div>
                        <b><label for="peso">Cuánto pesa tu mascota? </label></b>
                        <input style="background-color:#abebc6;" type="text" name="<?php echo"peso".$repetir;?>" placeholder="Kg" value="<?php 
                                if(isset($_REQUEST["peso".$repetir])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["peso".$repetir]; //Devuelve el campo que ha escrito previamente el usuario a cada usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if (!is_null($aErrores[$repetir]["peso".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores[$repetir]["peso".$repetir]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <!---------------------------- PREGUNTA SI / NO -------------------------------------------->
                    <div>
                        <b><label for="pregunta">¿Quieres pedir cita para esta semana?</label></b>
                        <input type="radio" name="<?php echo"pregunta".$repetir;?>"<?php if(isset ($_REQUEST["pregunta".$repetir]) && $_REQUEST["pregunta".$repetir] == "si"){
                                                                                echo "checked";
                                                                      }?> value="si">SI
                            <span style="color:red">                                            
                            <?php
                                if (!is_null($aErrores[$repetir]["pregunta".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores[$repetir]["pregunta".$repetir]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                            </span>
                        <input type="radio" name="<?php echo"pregunta".$repetir;?>"<?php if(isset ($_REQUEST["pregunta".$repetir]) && $_REQUEST["pregunta".$repetir] == "no"){
                                                                                echo "checked";
                                                                      }?> value="no">NO
                            <span style="color:red">
                            <?php
                                if (!is_null($aErrores[$repetir]["pregunta".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo "Debes seleccionar una respuesta"; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                            </span>
                    </div>
                <br>
                    <h3><b>¿Tienes cuenta de nuestra aplicación?</b></h3>
                    <!---------------------------- NOMBRE DE USUARIO -------------------------------------------->
                <div>
                        <b><label for="usuario">Nombre de usuario (opcional): </label></b>
                        <input style="background-color:#abebc6;" type="text" name="<?php echo"usuario".$repetir;?>" placeholder="" value="<?php 
                                if(isset($_REQUEST["usuario".$repetir])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["usuario".$repetir]; //Devuelve el campo que ha escrito previamente el usuario a cada usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if (!is_null($aErrores[$repetir]["usuario".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores[$repetir]["usuario".$repetir]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <!---------------------------- CONTRASEÑA -------------------------------------------->
                    <div>
                        <b><label for="contraseña">Contraseña (opcional): </label></b>
                        <input style="background-color:#abebc6;" type="password" name="<?php echo"contraseña".$repetir;?>" placeholder="" value="<?php 
                                if(isset($_REQUEST["contraseña".$repetir])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["contraseña".$repetir]; //Devuelve el campo que ha escrito previamente el usuario a cada usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if (!is_null($aErrores[$repetir]["contraseña".$repetir])) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores[$repetir]["contraseña".$repetir]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <!---------------------------- SELECCIONA UNA OPCIÓN DE LA LISTA -------------------------------------------->
                    <div>
                        <b><label for="lista">Selecciona la mascota que quieres traer a la consulta: </label></b>
                        <select name="<?php echo"lista".$repetir;?>">
                            <option value="gato" <?php if(isset($_REQUEST["lista".$repetir])){if($aErrores[$repetir]["selectorLista".$repetir] == null && $_REQUEST["lista".$repetir] == "gato"){ echo "selected";}} ?>>Gato</option>
                            <option value="perro" <?php if(isset($_REQUEST["lista".$repetir])){if($aErrores[$repetir]["selectorLista".$repetir] == null && $_REQUEST["lista".$repetir] == "perro"){ echo "selected";}} ?>>Perro</option>
                            <option value="otro" <?php if(isset($_REQUEST["lista".$repetir])){if($aErrores[$repetir]["selectorLista".$repetir] == null && $_REQUEST["lista".$repetir] == "otro"){ echo "selected";}} ?>>Otro</option>
                        </select>
                    </div>
                    <div class="error">
                    <?php
                    if ($aErrores[$repetir]["lista".$repetir] != NULL) {
                        echo $aErrores[$repetir]["lista".$repetir];
                    }
                    ?>
                    </div>
                <br>
                <?php
            }
                ?>
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