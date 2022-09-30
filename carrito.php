<?php

require "token.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $token = $_POST['token'];
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {

        if (isset($_SESSION['carrito']['productos'][$id])) {
            $_SESSION['carrito']['productos'][$id] += $_POST['cant'];
        } else {
            $_SESSION['carrito']['productos'][$id] = $_POST['cant'];
        }

        $datos['numero'] = count($_SESSION['carrito']['productos']);
        $datos['ok'] = true;
    }

    echo json_encode($datos);
}


?>