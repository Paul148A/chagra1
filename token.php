<?php 

define("KEY_TOKEN", "PDCTO.dscrp-1717514*");
define("CLIENT_ID", "AZ1S_1ge36shay4nrRRnahXmSMP-uHFR5JDoythxi0zcWep3fg_zGvabRwnKLYmZ5WTwdaYM5MG78fYx");
define("CURRENCY", "USD");
session_start();

$num_cart = 0;

if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>