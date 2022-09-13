<?php
include('../conexiondata.php');
include "../conexion.php";


$proveedor = $_POST['proveedor'];
$fileContacts = $_FILES['fileContacts']; 
$fileContacts = file_get_contents($fileContacts['tmp_name']); 

$fileContacts = explode("\n", $fileContacts);
$fileContacts = array_filter($fileContacts); 

foreach ($fileContacts as $contact) 
{
	$contactList[] = explode(",", $contact);
}
foreach ($contactList as $contactData) 
{
	
    $cat = mysqli_query($conexion, "SELECT * FROM categoria WHERE nombre = '$contactData[4]' ");
	$cat_data = mysqli_fetch_assoc($cat);

    $est = mysqli_query($conexion, "SELECT * FROM estado WHERE nombre = '$contactData[5]' ");
	$est_data = mysqli_fetch_assoc($est);
 

        $conexion1->query("INSERT INTO producto 
						(nombre_producto,
						 detalles,
						 proveedor,
						 precio,
						 stock,
						 codigobar,
						 categoria,
						 estado
						 )
						 VALUES
						 ('{$contactData[0]}',
						 '{$contactData[1]}', 
						  $proveedor,
						  '{$contactData[2]}',
						  '{$contactData[3]}',
						  '{$contactData[6]}',
						  '{$cat_data['id']}',
						  '{$est_data['id']}'						  
						   )

						 ");
$conexion1->query("DELETE FROM producto WHERE nombre_producto = 'Nombre' "); 	
}


