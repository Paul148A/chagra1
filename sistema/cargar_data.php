<?php

include('../conexiondata.php');
include "../conexion.php";


$proveedor = $_POST['proveedor'];
$fileContacts = $_FILES['fileContacts']; 
$fileContacts = file_get_contents($fileContacts['tmp_name']); 

$fileContacts = explode("\n", $fileContacts);
$fileContacts = array_filter($fileContacts); 

// preparar contactos (convertirlos en array)
foreach ($fileContacts as $contact) 
{
	$contactList[] = explode(",", $contact);
}

// insertar contactos
foreach ($contactList as $contactData) 
{
	$conexion1->query("INSERT INTO producto 
						(descripcion,
						 proveedor,
						 precio,
						 existencia
						 )
						 VALUES

						 ('{$contactData[0]}',
						  $proveedor, 
						  '{$contactData[1]}',
						  '{$contactData[2]}'
						  
						   )

						 "); 
}


?>