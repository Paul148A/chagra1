<?php 

define("KEY_TOKEN", "PDCTO.dscrp-1717514*");

session_start();

$num_cart = 0;

if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>