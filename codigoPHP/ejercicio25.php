<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PlantillaFormulario</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 21-10-2020.
            * Ejercicio 25 - Trabajar en PlantillaFormulario.php mi plantilla para hacer formularios como churros.
            */
        
            require_once '../core/201008libreriaValidacion.php';

            $aErrores = ["comprobarAlfabetico" => null,
                         "comprobarAlfanumerico" => null,
                         "comprobarEntero" => null,
                         "comprobarFloat" => null,
                         "validarEmail" => null,
                         "validarUrl" => null,
                         "validarFecha" => null,
                         "validarDni" => null,
                         "validarCp" => null,
                         "validarPassword" => null,
                         "comprobarNoVacio" => null,
                         "comprobarMaximoTamaño" => null,
                         "comprobarMinimoTamaño" => null,
                         "validarElementoEnLista" => null,
                         "validarTelefono" => null];
            
            define ('OBLIGATORIO',1); 
            $entradaOk = true; 
            
            $aRespuesta = ["comprobarAlfabetico" => null,
                           "comprobarAlfanumerico" => null,
                           "comprobarEntero" => null,
                           "comprobarFloat" => null,
                           "validarEmail" => null,
                           "validarUrl" => null,
                           "validarFecha" => null,
                           "validarDni" => null,
                           "validarCp" => null,
                           "validarPassword" => null,
                           "comprobarNoVacio" => null,
                           "comprobarMaximoTamaño" => null,
                           "comprobarMinimoTamaño" => null,
                           "validarElementoEnLista" => null,
                           "validarTelefono" => null];
            
            if(isset ($_REQUEST['enviar'])){ 
                
                 $aErrores["comprobarAlfabetico"] = validacionFormularios::comprobarAlfabetico($_REQUEST["comprobarAlfabetico"],50,3, OBLIGATORIO);
                 $aErrores["comprobarAlfanumerico"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["comprobarAlfanumerico"], 50, 1, OBLIGATORIO);
                 $aErrores["comprobarEntero"] = validacionFormularios::comprobarEntero($_REQUEST["comprobarEntero"], 10, 1, OBLIGATORIO);
                 $aErrores["comprobarFloat"] = validacionFormularios::comprobarFloat($_REQUEST["comprobarFloat"], 10, 1, OBLIGATORIO);
                 $aErrores["validarEmail"] = validacionFormularios::validarEmail($_REQUEST["validarEmail"], OBLIGATORIO);
                 $aErrores["validarUrl"] = validacionFormularios::validarURL($_REQUEST["validarUrl"], OBLIGATORIO);
                 $aErrores["validarFecha"] = validacionFormularios::validarFecha($_REQUEST["validarFecha"], "01/01/2022", "01/01/1900", OBLIGATORIO);
                 $aErrores["validarDni"] = validacionFormularios::validarDni($_REQUEST["validarDni"], OBLIGATORIO);
                 $aErrores["validarCp"] = validacionFormularios::validarCp($_REQUEST["validarCp"], OBLIGATORIO);
                 $aErrores["validarPassword"] = validacionFormularios::validarPassword($_REQUEST["validarPassword"], 5, OBLIGATORIO);
                 $aErrores["comprobarNoVacio"] = validacionFormularios::comprobarNoVacio($_REQUEST["comprobarNoVacio"]);
                 $aErrores["comprobarMaximoTamaño"] = validacionFormularios::comprobarMaxTamanio($_REQUEST["comprobarMaximoTamaño"], 10);
                 $aErrores["comprobarMinimoTamaño"] = validacionFormularios::comprobarMinTamanio($_REQUEST["comprobarMinimoTamaño"], 2);
                 $aErrores["validarElementoEnLista"] = validacionFormularios::validarElementoEnLista($_REQUEST["validarElementoEnLista"], "opcion1", "opcion2", "opcion3");
                 $aErrores["validarTelefono"] = validacionFormularios::validaTelefono($_REQUEST["validarTelefono"], OBLIGATORIO);
                 
                 foreach ($aErrores as $clave => $valor){ 
                       if($valor!=null){ 
                           $entradaOk=false; 
                       }
                   }
            }else{
                $entradaOk=false;
            }
            if($entradaOk){
                
                $aRespuesta["comprobarAlfabetico"] = $_REQUEST["comprobarAlfabetico"];
                $aRespuesta["comprobarAlfanumerico"] = $_REQUEST["comprobarAlfanumerico"];
                $aRespuesta["comprobarEntero"] = $_REQUEST["comprobarEntero"];
                $aRespuesta["comprobarFloat"] = $_REQUEST["comprobarFloat"];
                $aRespuesta["validarEmail"] = $_REQUEST["validarEmail"];
                $aRespuesta["validarUrl"] = $_REQUEST["validarUrl"];
                $aRespuesta["validarFecha"] = $_REQUEST["validarFecha"];
                $aRespuesta["validarDni"] = $_REQUEST["validarDni"];
                $aRespuesta["validarCp"] = $_REQUEST["validarCp"];
                $aRespuesta["validarPassword"] = $_REQUEST["validarPassword"];
                $aRespuesta["comprobarNoVacio"] = $_REQUEST["comprobarNoVacio"];
                $aRespuesta["comprobarMaximoTamaño"] = $_REQUEST["comprobarMaximoTamaño"];
                $aRespuesta["comprobarMinimoTamaño"] = $_REQUEST["comprobarMinimoTamaño"];
                $aRespuesta["validarElementoEnLista"] = $_REQUEST["validarElementoEnLista"];
                $aRespuesta["validarTelefono"] = $_REQUEST["validarTelefono"];
                
                echo "<h3>Datos introducidos correctamente</h3>";
                
            }else{
                
        ?>
            <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <fieldset>
                <legend><b>PLANTILLA FORMULARIO</b></legend>
                    <div>
                <br>
                        <b><label for="comprobarAlfabetico">Comprobar Alfabético (OBLIGATORIO):</label></b>
                        <input style="background-color:#f5b7b1;" type="text" name="comprobarAlfabetico" placeholder="comprobarAlfabetico" value="<?php 
                                if(isset($_REQUEST["comprobarAlfabetico"]) && $aErrores["comprobarAlfabetico"] == null){ 
                                    echo $_REQUEST["comprobarAlfabetico"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["comprobarAlfabetico"] != null) { 
                                    echo $aErrores["comprobarAlfabetico"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="comprobarAlfanumerico">Comprobar Alfanumérico (OBLIGATORIO): </label></b>
                        <input style="background-color:#f5b7b1;" type="text" name="comprobarAlfanumerico" placeholder="comprobarAlfanumerico" value="<?php 
                                if( isset($_REQUEST["comprobarAlfanumerico"]) && $aErrores["comprobarAlfanumerico"] == null){ 
                                    echo $_REQUEST["comprobarAlfanumerico"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["comprobarAlfanumerico"] != null) { 
                                    echo $aErrores["comprobarAlfanumerico"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="comprobarEntero">Comprobar Entero (OBLIGATORIO): </label></b>
                        <input style="background-color:#f5b7b1;" type="number" name="comprobarEntero" placeholder="comprobarEntero" value="<?php 
                                if(isset($_REQUEST["comprobarEntero"]) && $aErrores["comprobarEntero"] == null){ 
                                    echo $_REQUEST["comprobarEntero"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["comprobarEntero"] != null) { 
                                    echo $aErrores["comprobarEntero"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="comprobarFloat">Comprobar Float (OBLIGATORIO): </label></b>
                        <input style="background-color:#f5b7b1;" type="number" name="comprobarFloat" placeholder="comprobarFloat" value="<?php 
                                if(isset($_REQUEST["comprobarFloat"]) && $aErrores["comprobarFloat"] == null){ 
                                    echo $_REQUEST["comprobarFloat"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["comprobarFloat"] != null) { 
                                    echo $aErrores["comprobarFloat"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="validarEmail">Validar Email (OBLIGATORIO): </label></b>
                        <input style="background-color:#f5b7b1;" type="text" name="validarEmail" placeholder="Validar Email" value="<?php 
                                if(isset($_REQUEST["validarEmail"]) && $aErrores["validarEmail"] == null){ 
                                    echo $_REQUEST["validarEmail"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["validarEmail"] != null) { 
                                    echo $aErrores["validarEmail"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="validarUrl">Validar Url (OBLIGATORIO): </label></b>
                        <input style="background-color:#f5b7b1;" type="text" name="validarUrl" placeholder="validarUrl" value="<?php 
                                if(isset($_REQUEST["validarUrl"]) && $aErrores["validarUrl"] == null){ 
                                    echo $_REQUEST["validarUrl"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["validarUrl"] != null) { 
                                    echo $aErrores["validarUrl"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="validarFecha">Validar Fecha (OBLIGATORIO): </label></b>
                        <input style="background-color:#f5b7b1;" type="date" name="validarFecha" placeholder="validarFecha" value="<?php 
                                if(isset($_REQUEST["validarFecha"]) && $aErrores["validarFecha"] == null){ 
                                    echo $_REQUEST["validarFecha"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["validarFecha"] != null) { 
                                    echo $aErrores["validarFecha"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="validarDni">Validar Dni (OBLIGATORIO): </label></b>
                        <input style="background-color:#f5b7b1;" type="text" name="validarDni" placeholder="validarDni" value="<?php 
                                if(isset($_REQUEST["validarDni"]) && $aErrores["validarDni"] == null){ 
                                    echo $_REQUEST["validarDni"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["validarDni"] != null) { 
                                    echo $aErrores["validarDni"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="validarCp">Validar CP (OBLIGATORIO): </label></b>
                        <input style="background-color:#f5b7b1;" type="text" name="validarCp" placeholder="validarCp" value="<?php 
                                if(isset($_REQUEST["validarCp"]) && $aErrores["validarCp"] == null){ 
                                    echo $_REQUEST["validarCp"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["validarCp"] != null) { 
                                    echo $aErrores["validarCp"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="validarPassword">Validar Password (OBLIGATORIO): </label></b>
                        <input style="background-color:#f5b7b1;" type="password" name="validarPassword" placeholder="validarPassword" value="<?php 
                                if(isset($_REQUEST["validarPassword"]) && $aErrores["validarPassword"] == null){ 
                                    echo $_REQUEST["validarPassword"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["validarPassword"] != null) { 
                                    echo $aErrores["validarPassword"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="comprobarNoVacio">Comprobar No Vacío (OBLIGATORIO)</label></b>
                        <input type="radio" name="<?php echo"comprobarNoVacio";?>"<?php if(isset ($_REQUEST["comprobarNoVacio"]) && $_REQUEST["comprobarNoVacio"] == "si"){
                                                                                echo "checked";
                                                                      }?> value="si">SI
                            <span style="color:red">                                            
                            <?php
                                if (!is_null($aErrores["comprobarNoVacio"])) { 
                                    echo $aErrores["comprobarNoVacio"]; 
                                }
                            ?>
                            </span>
                        <input type="radio" name="<?php echo"comprobarNoVacio";?>"<?php if(isset ($_REQUEST["comprobarNoVacio"]) && $_REQUEST["comprobarNoVacio"] == "no"){
                                                                                echo "checked";
                                                                      }?> value="no">NO
                            <span style="color:red">
                            <?php
                                if (!is_null($aErrores["comprobarNoVacio"])) { 
                                    echo "Debes seleccionar una respuesta"; 
                                }
                            ?>
                            </span>
                    </div>
                <br>
                    <div>
                        <b><label for="comprobarMaximoTamaño">Comprobar Tamaño Máximo (MAX 10): </label></b>
                        <input style="background-color:#f5b7b1;" type="text" name="comprobarMaximoTamaño" placeholder="comprobarMaximoTamaño" value="<?php 
                                if(isset($_REQUEST["comprobarMaximoTamaño"]) && $aErrores["comprobarMaximoTamaño"] == null){ 
                                    echo $_REQUEST["comprobarMaximoTamaño"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["comprobarMaximoTamaño"] != null) { 
                                    echo $aErrores["comprobarMaximoTamaño"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="comprobarMinimoTamaño">Comprobar Tamaño Mínimo (MIN 2): </label></b>
                        <input style="background-color:#f5b7b1;" type="text" name="comprobarMinimoTamaño" placeholder="comprobarMinimoTamaño" value="<?php 
                                if(isset($_REQUEST["comprobarMinimoTamaño"]) && $aErrores["comprobarMinimoTamaño"] == null){ 
                                    echo $_REQUEST["comprobarMinimoTamaño"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["comprobarMinimoTamaño"] != null) { 
                                    echo $aErrores["comprobarMinimoTamaño"]; 
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="validarTelefono">Validar teléfono (OBLIGATORIO): </label></b>
                        <input style="background-color:#f5b7b1;" type="tel" name="validarTelefono" placeholder="validarTelefono" value="<?php 
                                if(isset($_REQUEST["validarTelefono"]) && $aErrores["validarTelefono"] == null){ 
                                    echo $_REQUEST["validarTelefono"]; 
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["validarTelefono"] != null) { 
                                    echo $aErrores["validarTelefono"]; 
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