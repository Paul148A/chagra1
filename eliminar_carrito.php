<?php

require 'token.php';
require 'conexiondata.php';

if (isset($_POST['action'])){
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    if($action == 'eliminar'){
        $datos['ok'] = eliminar($id);
    }
}


function eliminar($id){
    if($id > 0){
        if(isset($_SESSION['carrito']['productos'][$id])){
            unset($_SESSION['carrito']['productos'][$id]);
            return true;
        }
    }
}
?>
