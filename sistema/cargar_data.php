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
	if($contactData[5] == "Categoria"){
		$categoria = 0;
	}if($contactData[5] == "ABASTOS"){
		$categoria = 1;
	}elseif($contactData[5] == "LIMPIEZA Y DESINFECCIÓN"){
		$categoria = 2;
	}elseif($contactData[5] == "BEBIDAS Y JUGOS"){
		$categoria = 3;
	}elseif($contactData[5] == "LICORES Y CIGARILLOS"){
		$categoria = 4;
	}elseif($contactData[5] == "ACEITES Y CONDIMENTOS"){
		$categoria = 5;
	}elseif($contactData[5] == "MASCOTAS"){
		$categoria = 6;
	}elseif($contactData[5] == "PLASTICOS Y DESECHABLES"){
		$categoria = 7;
	}elseif($contactData[5] == "EMBUTIDOS Y CONGELADOS"){
		$categoria = 8;
	}elseif($contactData[5] == "LACTEOS Y REFRIGERADOS"){
		$categoria = 9;
	}elseif($contactData[5] == "POSTRES PANADERIA Y SNACKS"){
		$categoria = 10;
	}elseif($contactData[5] == "CUIDADO PERSONAL"){
		$categoria = 11;
	}elseif($contactData[5] == "FRUTAS Y VERDURAS"){
		$categoria = 12;
	}elseif($contactData[5] == "TECNOLOGIA"){
		$categoria = 13;
	};

	
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
						  '{$contactData[4]}',
						  $categoria,
						  '{$contactData[6]}'						  
						   )

						 ");
$conexion1->query("DELETE FROM producto WHERE nombre_producto = 'Nombre' "); 	
}
