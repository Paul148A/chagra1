<?php include_once "includes/header.php";
  include_once "../conexion.php";
    if (empty($_FILES['file'])){
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
        $file = $_FILES['file'];
        $file = file_get_contents($file['tmp_name']);
        $file = explode("\n", $file);
        $file = array_filter($file);
        
        print_r($file);
    }
  
  ?>