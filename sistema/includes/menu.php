<!-- Sidebar - Brand -->
<nav class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="../index.php" aria-current="page">
      <img src="img/logoChagr.png" width="70" height="70" class="img-thumbnail">
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link mt-4">El Chagra Supermercado</a>
  </li>
  <li class="nav-item">
    <div class="nav-link mt-4">
      <p class=""><strong>Ecuador, </strong><?php echo fechaPeru(); ?></p>
    </div>
  </li>
  <?php if ($_SESSION['rol'] == 2) { ?>
    <li class="nav-item">
      <div class="nav-link mt-4">
        <p class=""><strong>VENDEDOR</strong></p>
      </div>
    </li>
  <?php } else { ?>
    <li class="nav-item">
      <div class="nav-link mt-4">
        <p class=""><strong>ADMINISTRADOR</strong></p>
      </div>
    </li>
  <?php } ?>
  <li class="drop1 nav-item dropdown mt-4">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
      <span class="d-none d-lg-inline small"><?php echo $_SESSION['nombre']; ?></span>
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#">
        <i class="fas fa-user fa-sm fa-fw text-gray-400"></i>
        <?php echo $_SESSION['email']; ?>
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="salir.php">
        <i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400"></i>
        Salir
      </a>
    </div>
  </li>
</nav>



<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Sidebar -->
<nav class="navbar navbar-expand-lg bg-danger">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="dropdown" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php if ($_SESSION['rol'] == 2) { ?>
        <!-- Nav Item - Usuarios Collapse Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fas fa-user"></i>
            Ventas
          </a>
          <ul class="dropdown-menu">
            <a class="dropdown-item" href="nueva_venta.php">Nueva venta</a>
            <a class="dropdown-item" href="ventas.php">Ventas</a>
          </ul>
        </li>
      <?php } ?>
    </ul>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-fw fa-wrench"></i>
          Productos
        </a>
        <ul class="dropdown-menu">
          <?php if ($_SESSION['rol'] == 1) { ?><a class="dropdown-item" href="registro_producto.php">Nuevo Producto</a><?php } ?>
          <a class="dropdown-item" href="lista_productos.php">Productos</a>
        </ul>
      </li>

    </ul>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-users"></i>
          Clientes
        </a>
        <ul class="dropdown-menu">
          <?php if ($_SESSION['rol'] == 1) { ?><a class="dropdown-item" href="registro_cliente.php">Nuevo Clientes</a><?php } ?>
          <a class="dropdown-item" href="lista_cliente.php">Clientes</a>
        </ul>
      </li>
    </ul>

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php if ($_SESSION['rol'] == 1) { ?>
        <!-- Nav Item - Usuarios Collapse Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
          <i class="fa fa-solid fa-hand-holding"></i>
            Proveedores
          </a>
          <ul class="dropdown-menu">
            <a class="dropdown-item" href="registro_proveedor.php">Nuevo Proveedor</a>
            <a class="dropdown-item" href="lista_proveedor.php">Proveedores</a>
          </ul>
        </li>
      <?php } ?>
    </ul>

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php if ($_SESSION['rol'] == 1) { ?>
        <!-- Nav Item - Usuarios Collapse Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fa fa-list"></i>
            Categorias
          </a>
          <ul class="dropdown-menu">
            <a class="dropdown-item" href="registro_categoria.php">Nueva Categoria</a>
            <a class="dropdown-item" href="lista_categoria.php">Categoria</a>
          </ul>
        </li>
      <?php } ?>
    </ul>

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php if ($_SESSION['rol'] == 1) { ?>
        <!-- Nav Item - Usuarios Collapse Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fas fa-user"></i>
            Usuarios
          </a>
          <ul class="dropdown-menu">
            <a class="dropdown-item" href="registro_usuario.php">Nuevo Usuario</a>
            <a class="dropdown-item" href="lista_usuarios.php">Usuarios</a>
          </ul>
        </li>
      <?php } ?>

    </ul>
  </div>
  </div>

</nav><br>