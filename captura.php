<?php

require "conexiondata.php";
require "token.php";

if(isset($_POST['detalles'])){
    $json = $_POST['detalles'];
    $datos = json_decode($json, true);
}


?>
   





