<?php
    //echo "Hola";

    var_dump($_GET);

    //echo file_get_contents('php://input');

    $cadena = file_get_contents('php://input');

    $json = json_decode($cadena);

    var_dump($json);

?>