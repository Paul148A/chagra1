<?php
include "conexion.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="sistema/css/styles12.css">
    <link rel="stylesheet" href="sistema/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <nav class="navw navbar navbar-expand-lg bg" id="inicio">
        <div class="container-fluid">
            <ul>
                <br>
                <a href="https://www.facebook.com/ElchagraSupermercado/?ref=py_c" style="color: black; margin-left: 50px; "><i data-feather="facebook"></i></a>
                <a style="color: black; margin-left: 30px; margin-top: 30px;"><i data-feather="instagram"></i></a>
                <a style="color: black; margin-left: 30px;">
                    <ion-icon name="logo-tiktok"></ion-icon>
                </a>
            </ul>
            <img src="sistema/img/removebgchagra.png" width="180px" alt="" style="margin-right: 60px;">
            <ul><br>
                <strong class="navbar-text text" style="margin-right: 6px;">
                    Contactanos:
                </strong>
                <span class="navbar-text" style="margin-right: 60px;">
                    <i data-feather="phone"></i> 0998085736
                </span>
            </ul>
        </div>
        </div>
    </nav>
    <!--------------------------------------------------------------------------------------Navegador de productos---------------------------------------->
<?php include "sistema/includes/nav.php" ?>
    
</body>
<?php include "sistema/includes/pie.php" ?>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace({
        class: 'foo bar',
        'stroke-width': 2,
        'width': 18
    })
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</html>