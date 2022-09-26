<?php
include "conexion.php";
include "token.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="sistema/css/styles19.css">
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
            <ul><br>
                <strong class="navbar-text text" style="margin-right: 6px;">
                    Contactanos:
                </strong>
                <span class="navbar-text" style="margin-right: 60px;">
                    <i data-feather="phone"></i> 0998085736
                </span>
            </ul>
        </div>
    </nav>
    <!--------------------------------------------------------------------------------------Navegador de productos---------------------------------------->
    <div class="container-fluid bgnav"><br>
        <div class="row">
            <div class="col-4">
                <?php
                $query_categoria = mysqli_query($conexion, "SELECT id, nombre FROM categoria ORDER BY nombre ASC");
                $resultado_categoria = mysqli_num_rows($query_categoria);
                ?>
                <form action="" method="post">
                    <select id="categoria_filtro" name="categoria_filtro" class="selectc">
                        <?php
                        if ($resultado_categoria > 0) {
                            while ($categoria = mysqli_fetch_array($query_categoria)) {
                        ?>
                        <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <button type="submit" class="butonpr">Filtrar <i data-feather="search"></i></button>
                </form><br>
                <h7 style="color: rgb(73, 72, 72);">Encuentra tus productos facilmente</h7>
            </div>
            <div class="col-4">
                <a href="index1.php"><img src="sistema/img/chagraf.png" width="180px" class="mx-auto d-block"></a>
            </div>
        </div>
        <br>
    </div><br>
    <!------------------------------------------------------------------------------------------Cards--------------------------------------------------------------------------->

    <div class="container-fluid">
        <div class="row">
            <?php
            if (!isset($_POST['categoria_filtro'])) {
                $query = mysqli_query($conexion, "SELECT * FROM producto");
            } else {
                $query = mysqli_query($conexion, "SELECT * FROM producto WHERE categoria = '{$_POST['categoria_filtro']}'");
            }
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <div class="col-3">
                        <a href="vista.php?id=<?php echo $data['codproducto'] ?>&token=<?php echo hash_hmac('sha1', $data['codproducto'], KEY_TOKEN) ?>" style="text-decoration: none;">
                            <div class="card cardp">
                                <div class="card-header prodcard">
                                    <img src="sistema/imagenes/<?php echo $data['imagen'] ?>" width="200" style="max-width: 200;" class="rounded mx-auto d-block pt-5 pb-5 imgcardp">
                                </div>
                                <div class="card-body">
                                    <div class="hr1"></div><br>
                                    <h2><?php echo $data['nombre_producto'] ?></h2>
                                    <?php
                                    $categ = mysqli_query($conexion, "SELECT * FROM categoria");
                                    $data_categoria = mysqli_fetch_assoc($categ);
                                    $categdata = mysqli_query($conexion, "SELECT nombre FROM categoria WHERE id = '{$data['categoria']}'");
                                    $categoria = mysqli_fetch_assoc($categdata);
                                    ?>
                                    <h5 style="color: gray;"><?php echo $categoria['nombre'] ?></h5>
                                    <h4 style="color: red;"><?php echo $data['precio'] ?>$</h4>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php }
            } ?>
        </div>
        <hr>
    </div><br>
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