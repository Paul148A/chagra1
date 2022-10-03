<?php

include "conexiondata.php";
include "token.php";

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;


$lista_carrito = array();

if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {
        $sql = $conexion1->prepare("SELECT codproducto, nombre_producto, detalles, precio, $cantidad as cantidad FROM producto WHERE codproducto=?");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="sistema/css/styles24.css">
    <link rel="stylesheet" href="sistema/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<main>
<div class="container-fluid bg" id="inicio">
    <div class="row">
      <div class="col-4 d-none d-sm-none d-md-none d-xl-block">
        <br>
        <a href="https://www.facebook.com/ElchagraSupermercado/?ref=py_c" style="color: black; margin-left: 50px; "><i data-feather="facebook"></i></a>
        <a style="color: black; margin-left: 30px; margin-top: 30px;"><i data-feather="instagram"></i></a>
        <a style="color: black; margin-left: 30px;">
          <ion-icon name="logo-tiktok"></ion-icon>
        </a>
      </div>
      <div class="col-lg-4 col-12 mx-auto">
      <a href="index1.php"><img src="sistema/img/chagraf.png" width="170px" class="mx-auto d-block"></a>
      </div>
      <div class=" col-4 d-none d-sm-none d-md-none d-xl-block" align="end"><br>
        <strong class="navbar-text text" style="margin-right: 6px;">
          Contactanos:
        </strong>
        <span class="navbar-text" style="margin-right: 60px;">
          <i data-feather="phone"></i> 0998085736
        </span>
      </div>
    </div>
  </div><br>
    <!---------------------------------------------------------------------------------productos del carrito------------------------------->
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <table class="table table-striped tablescroll">
                    <thead>
                        <tr>
                            <th><b>Producto</b></th>
                            <th><b>Descripción</b></th>
                            <th><b>Precio/u</b></th>
                            <th><b>Cantidad</b></th>
                            <th><b>Subtotal</b></th>
                            <th><b>Acciones</b></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php if ($lista_carrito == null) {
                            echo '<tr>
                            <td colspan="6" class="text-center"><b>Aun no hay productos en tu carrito!</b></td>
                            </tr>
                            <tr align="center">
                            <td colspan="6"><a href="productos.php"><button class="back">Ver Productos</button></a></td>
                            </tr>';
                        } else {
                            $total = 0;
                            foreach ($lista_carrito as $producto) {
                                $_id = $producto['codproducto'];
                                $nombre = $producto['nombre_producto'];
                                $precio = $producto['precio'];
                                $detalles = $producto['detalles'];
                                $cant = $producto['cantidad'];
                                $subtotal = $cant * $precio;
                                $total += $subtotal;

                        ?>
                                <tr>
                                    <td><?php echo $nombre; ?></td>
                                    <td><?php echo $detalles; ?></td>
                                    <td><?php echo $precio; ?> $</td>
                                    <td><?php echo $cant; ?> unidad/es</td>
                                    <td><?php echo number_format($subtotal, 2, '.', ','); ?> $</td>
                                    <td><a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal" style="color: white;"><span class="material-symbols-outlined">delete</span></a></td>
                                </tr>
                            <?php } ?>
                    </tbody>
                <?php } ?>
                </table>
            </div>
            <div class="col-lg-2 col-12" align="center">
                <div>
                    <button class="buttoncarritosolo">Mi carrito <br><span class="material-symbols-outlined iconcart">add_shopping_cart</span><br><span id="num_cart"><?php echo $num_cart; ?></span></button>
                </div><br><br>
                <div class="hr1"></div><br>
                <div>
                    <a href="productos.php"><button class="back"><span class="material-symbols-outlined">arrow_back</span></button></a>
                </div><br>
                <div class="hr1"></div><br><br><br>
                <?php if ($lista_carrito != null) { ?>
                    <div>
                        <h5>Valor total: </h5>
                        <p class="h3" id="total">

                            <?php echo number_format($total, 2, '.', ','); ?>
                            $</p>
                    </div>
                    <div>
                        <a href="paypal.php"><button class="pago"><b>Comprar</b></button></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div><br>
</main>


<div class="modal fade modal-sm" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                ¿Desea quitar el producto de su carrito?
            </div>
            <div class="modal-footer mx-auto">
                <button type="button" class="back2" data-bs-dismiss="modal"><span class="material-symbols-outlined">arrow_back</span></button>
                <button id="btn-elimina" type="button" class="back1" onclick="elimina()">Quitar</button>
            </div>
        </div>
    </div>
</div>
<?php include "sistema/includes/pie.php" ?>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace({
        class: 'foo bar',
        'stroke-width': 2,
        'width': 18
    })
</script>
<script>
    let eliminaModal = document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal', function(event) {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
        buttonElimina.value = id
    })

    function elimina() {

        let botonElimina = document.getElementById('btn-elimina')
        let id = botonElimina.value

        let url = 'eliminar_carrito.php'
        let formData = new FormData()
        formData.append('action', 'eliminar')
        formData.append('id', id)

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(data => {
            if (data.ok) {
                location.reload()
            }
        })
    }
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>