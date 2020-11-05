<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 28</title>
        <style>
            .error{
                color: red;
                font-weight: bold;
            }
            
            legend{
                color: black;
                font-weight: bold;
            }
            input{
                padding: 5px;
                border-radius: 10px;
            }
            .obligatorio input{
                background-color: #ccc;
            }
        </style>
    </head>
    <body>
        <?php
        /*
         * #author: Nerea Nuevo Pascual
         * @since: 22/10/2020
         * Plantilla de formularios de Nerea.
         */

        //Declaramos la variables
        require_once '../core/201008libreriaValidacion.php'; //Importamos la librería 
        $entradaOK = true;
        
        $fechaActual = new DateTime();
        
        $arrayErrores = [ //Recoge los errores del formulario
            'nombreApellidos' => null,
            'fecha' => null,
            'radio' => null,
            'entero' => null,
            'lista' => null,  
            'texto' => null]; 
        
        $arrayFormulario = [ //Recoge los datos del formulario
            'nombreApellidos' => null,
            'fecha' => null,
            
            'radio' => null,
            'entero' => null,
            
            'lista' => null,  
            'texto' => null];  
        
        if (isset($_POST['enviar'])) { //Código que se ejecuta cuando se envía el formulario
            
            #OBLIGATORIOS
            $arrayErrores['nombreApellidos'] = validacionFormularios::comprobarAlfabetico($_POST['nombreApellidos'], 20, 1, 1);
            $arrayErrores['fecha'] = validacionFormularios::validarFecha($_POST['fecha'], "01/01/2200", "01/01/1900", 1);
            if(!isset($_POST['radio'])){$arrayErrores['radio'] = "Debe marcarse un valor";}
            $arrayErrores['entero'] = validacionFormularios::comprobarEntero($_POST['entero'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, 1);
            $arrayErrores['lista'] = validacionFormularios::validarElementoEnLista($_POST['lista'], array("Jugar", "Estudiar", "SoloPHP"));
            $arrayErrores['texto'] = validacionFormularios::comprobarAlfaNumerico($_POST['texto'], 500, 1, 1);
            
            foreach ($arrayErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
                if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                }
            }
        } else {
            $entradaOK = false;
        }


        if ($entradaOK) { // Si el formulario se ha rellenado correctamente
         
            #OBLIGATORIOS
            // Cargamos en el $arrayFormulario el valos de aquellos campos que se han rellenado correctamente
            
            $arrayFormulario['nombreApellidos'] = $_POST['nombreApellidos'];
            $arrayFormulario['fecha'] = $_POST['fecha'];
            $arrayFormulario['radio'] = $_POST['radio'];
            $arrayFormulario['entero'] = $_POST['entero'];
            $arrayFormulario['lista'] = $_POST['lista'];
            $arrayFormulario['texto'] = $_POST['texto'];
            
            
            
            echo "<h3>INFORME PERSONAL</h3>";
            echo "Hoy " ."<b>". $fechaActual->format('d/m/Y')."</b>"." a las "."<b>" .$fechaActual->format('H:i:s')."</b>" ."<br>";
            echo "D. " . "<b>". $arrayFormulario['nombreApellidos']."</b>" . " nacido el " . "<b>".date('d/m/Y', strtotime($arrayFormulario['fecha']))."</b>";
            echo " Se siente ". "<b>".$arrayFormulario['radio']. "</b>". "<br>";
            echo "Valora su curso actual con un ". "<b>".$arrayFormulario['entero']."</b>" . " sobre 10<br>";
            echo "Estas navidades las dedicará a " . "<b>".$arrayFormulario['lista']."</b>" . "<br>";
            echo "Y además opina que " . "<b>".$arrayFormulario['texto']."</b>" . "<br>";
            
            } else { //Código que se ejecuta antes de rellenar el formulario
            ?>
            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                <fieldset>
                    <legend>ENCUESTA DE SATISFACCIÓN PERSONAL</legend>
                    
                    <!---------------------------- NOMBRE Y APELLIDOS -------------------------------------------->
                    <br>
                    <div class="obligatorio">
                        <label>Nombre y apellidos: </label>
                        <input type = "text" name = "nombreApellidos"
                               value="<?php if($arrayErrores['nombreApellidos'] == NULL && isset($_POST['nombreApellidos'])){ echo $_POST['nombreApellidos'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['nombreApellidos'] != NULL) {
                        echo $arrayErrores['nombreApellidos']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    <br>
                    
                    <!---------------------------- FECHA DE NACIMIENTO -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>Fecha de nacimiento: </label>
                        <input type = "date" name = "fecha"
                               value="<?php if($arrayErrores['fecha'] == NULL && isset($_POST['fecha'])){ echo $_POST['fecha'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['fecha'] != NULL) {
                        echo $arrayErrores['fecha']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- ¿CÓMO TE SIENTES HOY? -------------------------------------------->
                    
                    <div>
                        <label>¿Cómo te sientes hoy? </label><br><br>
                        <input type="radio" id="RO1" name="radio" value="Muy mal" <?php if(isset($_POST['radio']) && $_POST['radio'] == "Muy mal"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO1">Muy mal</label>
                        <input type="radio" id="RO2" name="radio" value="Mal" <?php if(isset($_POST['radio']) && $_POST['radio'] == "Mal"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO2">Mal</label>
                        <input type="radio" id="RO3" name="radio" value="Regular" <?php if(isset($_POST['radio']) && $_POST['radio'] == "Regular"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO3">Regular</label>
                        <input type="radio" id="RO3" name="radio" value="Bien" <?php if(isset($_POST['radio']) && $_POST['radio'] == "Bien"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO3">Bien</label>
                        <input type="radio" id="RO3" name="radio" value="Muy bien" <?php if(isset($_POST['radio']) && $_POST['radio'] == "Muy bien"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO3">Muy bien</label>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['radio'] != NULL) {
                        echo $arrayErrores['radio'];
                    }
                    ?>
                    </div>
                    
                    <br><!---------------------------- ENTERO -------------------------------------------->
                    
                    <div class="obligatorio">
                        <label>¿Cómo vas el curso? 1 - Muy mal / 10 - Muy bien</label>
                        <input type = "number" name = "entero"
                               value="<?php if($arrayErrores['entero'] == NULL && isset($_POST['entero'])){ echo $_POST['entero'];} ?>"><br>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['entero'] != NULL) {
                        echo $arrayErrores['entero']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- COMO SE PRESENTAN LAS VACACIONES DE NAVIDAD -------------------------------------------->
                    
                    <div>
                        <label>Lista: </label>
                        <select name="lista">
                            <option value="Jugar" <?php if(isset($_POST['lista'])){if($arrayErrores['lista'] == NULL && $_POST['lista'] == "Jugando"){ echo "selected";}} ?>>Jugar</option>
                            <option value="Estudiar" <?php if(isset($_POST['lista'])){if($arrayErrores['lista'] == NULL && $_POST['lista'] == "Estudiando"){ echo "selected";}} ?>>Estudiar</option>
                            <option value="SoloPHP" <?php if(isset($_POST['lista'])){if($arrayErrores['lista'] == NULL && $_POST['lista'] == "SoloPHP"){ echo "selected";}} ?>>SoloPHP</option>
                        </select>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['lista'] != NULL) {
                        echo $arrayErrores['lista']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <br> <!---------------------------- DESCRIBE BREVEMENTE TU ESTADO DE ÁNIMO -------------------------------------------->
                    
                    <div>
                        <label>Describe brevemente tu estado de ánimo: </label>
                        <textarea name="texto" placeholder="Maximo 500 caracteres" value="<?php if($arrayErrores['texto'] == NULL && isset($_POST['texto'])){ echo $_POST['texto'];} ?>"></textarea>
                    </div>
                    <div class="error">
                    <?php
                    if ($arrayErrores['texto'] != NULL) {
                        echo $arrayErrores['texto']; //Mensaje de error que tiene el $arrayErrores
                    }
                    ?>
                    </div>
                    
                    <div>
                        <br><input type = "submit" name = "enviar" value = "Enviar">
                    </div>
                </fieldset>
            </form>
        <?php } ?>
    </body>
</html>