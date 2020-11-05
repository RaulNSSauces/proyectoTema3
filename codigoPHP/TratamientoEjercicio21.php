<?php
    require_once '../core/LibreriaCalculadora.php'; //Utilizo la librería que he creado para realizar operaciones.
    
    echo "<p><b>El primer número introducido ha sido el:</b> ".$_POST['numero1']."</p>\n"; //Con el metodo $_POST muestro al usuario los datos que ha introducido.
    echo "<p><b>El segundo número introducido ha sido el:</b> ".$_POST['numero2']."<p>\n"; //Con el metodo $_POST muestro al usuario los datos que ha introducido.
    echo "<p><b>La suma entre ambos número es:</b> ". suma($_POST['numero1'], $_POST['numero2'])."</p>"; //Con el metodo $_POST muestro al usuario la suma de los datos que ha introducido.
    
?>