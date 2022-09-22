<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="sistema/css/styles17.css">
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
    </div>
  </nav>
  <nav class="navbar bg-danger">
    <div class="container-fluid">
      <ul>
        <p style="font-family: 'Dancing Script', cursive; margin-left: 57px;" class="colort fontz mt-3">Aquí si hay ahorro !!</p>
      </ul>
      <img src="sistema/img/chagraf.png" width="180px" class="mx-auto d-block">
      <ul>
        <a href="productos.php" style="text-decoration: none;">
          <div class="colort1">Productos</div>
        </a>
      </ul>
      <ul>
        <a href="sistema/quienes.php" style="text-decoration: none;">
          <div class="colort1">Quienes Somos</div>
        </a>
      </ul>
      <ul>
        <a href="sistema/index.php" style="text-decoration: none;">
          <div class="colort1">Iniciar Sesión</div>
        </a>
      </ul>
    </div>
  </nav>
  <!---------------------------------------------------------------------------------------Carousel-------------------------------------------------------------------------------------->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="sistema/img/chag1.jpeg" height="700" data-bs-interval="8000" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="sistema/img/fot2.jpg" height="700" data-bs-interval="2000" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="sistema/img/fot3.jpg" height="700" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
      <span class="visually-hidden" >Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div><br>
  <div class="">
    <h2 class="text-center colorb">OFERTAS DURANTE</h2>
    <h2 class="text-center colorb">TODO EL AÑO</h2>
    <div class="siz mx-auto colorb"></div><br><br>

  </div>
  <!---------------------------------------------------------------------cards-------------------------------------------------------->
  <div class="gray"><br><br><br>
    <div class="container-fluid">
      <div class="row">
        <div style="margin-right: 2px; margin-left: 2px; margin-bottom: 30px;" class="bord bgr card col-5 mx-auto">
          <div class="bgnone bord1 card-header">
            <h3 class="colort text-center">Mascotas</h3>
            <div class="siz mx-auto colory"></div>
            <div class="card-body container-fluid">
              <img class="" src="sistema/img/perrito.png" width="475" height="280">
            </div>
          </div>
          <button class="boton cinco col-4 mx-auto">
            <div class="icono">
              <span class="material-symbols-outlined">
                pets
              </span>
            </div>
            <span>Ver mas</span>
          </button><br>
        </div>
        <div style="margin-right: 2px; margin-left: 2px; margin-bottom: 30px;" class="bordbgr bg card col-5 mx-auto">
          <div class="bgnone bord1 card-header">
            <h3 class="colort text-center">Licores</h3>
            <div class="siz mx-auto colorb"></div>
            <div class="card-body container-fluid">
              <img class="" src="sistema/img/licores.png" width="475" height="280">
            </div>
          </div>
          <button class="boton2 cuatro col-4 mx-auto">
            <div class="icono">
              <span class="material-symbols-outlined">
                local_bar
              </span>
            </div>
            <span>Ver mas</span>
          </button><br>
        </div>
      </div>
      <div class="row">
        <div style="margin-right: 2px; margin-left: 2px; margin-bottom: 30px;" class="bordbgr bg card col-5 mx-auto">
          <div class="bgnone bord1 card-header">
            <h3 class="colort text-center">Aseo Personal</h3>
            <div class="siz mx-auto colorb"></div>
            <div class="card-body container-fluid">
              <img class="" src="sistema/img/aseo.png" width="475" height="310">
            </div>
          </div>
          <button class="boton2 cuatro col-4 mx-auto">
            <div class="icono">
              <span class="material-symbols-outlined">
                sanitizer
              </span>
            </div>
            <span>Ver mas</span>
          </button><br>
        </div>
        <div style="margin-right: 2px; margin-left: 2px; margin-bottom: 30px;" class="bord bgr card col-5 mx-auto">
          <div class="bgnone bord1 card-header">
            <h3 class="colort text-center">Condimentos</h3>
            <div class="siz mx-auto colory"></div>
            <div class="card-body container-fluid">
              <img class="" src="sistema/img/condimensa.png" width="475" height="310">
            </div>
          </div>
          <button class="boton cinco col-4 mx-auto">
            <div class="icono">
              <span class="material-symbols-outlined">
                restaurant
              </span>
            </div>
            <span>Ver mas</span>
          </button><br>
        </div>
      </div>
    </div><br><br>
  </div><br><br>

  <!----------------------------------------------------------------Beneficios------------------------------------------------------>
  <div class="container-fluid">
    <div class="row">
      <div class="col-4 card mx-auto cardb">
        <div class="card-body"><br><br>
          <div class="hr1"></div><br>
          <h1 class="colorb">DELIVERY</h1><br>
          <h4>Por tus compras mayores</h4>
          <h4>a 35$, tu envio</h4>
          <h4>es gratuito</h4><br>
          <a href="https://api.whatsapp.com/message/HVILSBPMSAR6H1?autoload=1&app_absent=0"><button class="conta">099 512 3961</button></a><br>
        </div><br>
        <img src="sistema/img/vg.png" class="bgopacity">
      </div>
      <div class="col-4 card mx-auto cardc">
        <div class="card-body mx-auto">
          <img src="sistema/img/cronom.png">
        </div>
        <div class="card-body">
          <h1 class="colort">Compras Seguras</h1><br>
          <h3 class="letr">Sabemos que tu tiempo</h3>
          <h3 class="letr">vale mucho!</h3>
          <h3 class="letr">Nosotros podemos hacer la</h3>
          <h3 class="letr">compra completa por ti!</h3>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <!-------------------------------------------------------------------------Ubicación--------------------------------------------------------------->
  <div class="container-fluid gray1">
    <div class="row">
      <div class="col-5 mx-auto"><br><br><br><br>
        <img src="sistema/img/sucur.png" class="hvimg">
      </div>
      <div class="col-5 mx-auto direc">
        <div class="hr2 mx-auto"></div><br>
        <h3 class="f text-center">Sucursal 1</h3><br>
        <h1>Av. Cristobal Colón y Barriga</h1>
        <h3 class="f text-center">(Machachi)</h3>
      </div>
    </div><br><br>
  </div>
  <!-----------------------------------------------------------------------------------footer---------------------------------------------------------->
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