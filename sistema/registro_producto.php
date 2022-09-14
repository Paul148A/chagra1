<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['proveedor']) || empty($_POST['nombre_producto']) || empty($_POST['nombre_producto']) || empty($_POST['codbar']) || empty($_POST['precio']) || $_POST['precio'] <  0 || empty($_POST['stock'] || $_POST['stock'] <  0) || empty($_FILES['imagen']) || empty($_POST['codbar'])) {
    $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
  } else {
    $producto = $_POST['nombre_producto'];
    $detalles = $_POST['detalles'];
    $proveedor = $_POST['proveedor'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $img = $_FILES['imagen']['name'];
    $temp = $_FILES['imagen']['tmp_name'];
    $barras = $_POST['codbar'];
    $categoria = $_POST['categoria'];
    $estado = $_POST['estado'];
    $query_insert = mysqli_query($conexion, "INSERT INTO `producto`( `nombre_producto`, `detalles`, `proveedor`, `precio`, `stock`, `imagen`, `codigobar`, `categoria`, `estado`)values ('$producto', '$detalles', '$proveedor', '$precio', '$stock', '$img', '$barras', '$categoria', '$estado')");
    if ($query_insert) {
      move_uploaded_file($temp, 'imagenes/' . $img);
      $alert = '<div class="alert alert-primary" role="alert">
                Producto Registrado
              </div>';
    } else {
      $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar el producto
              </div>';
    }
  }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between">
    <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
  </div>
  <div class="d-sm-flex justify-content-end ">
    <a href="lista_productos.php" class="btn btn-danger mx-3">Regresar</a>
    <a href="subir_excel.php" class="btn btn-success"><i class="fa fa-table"></i> Subir masivamente</a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-8 m-auto">
      <div class="card">
        <div class="card-header bg-danger text-white">
          Datos del nuevo producto
        </div>

        <form action="" method="post" autocomplete="off" enctype="multipart/form-data" class="card-body p-2">
        <?php echo isset($alert) ? $alert : ''; ?>
          <div class="form-group">
            <label for="nombre_producto">Producto</label>
            <input type="text" placeholder="Ingrese el nombre del producto" class="form-control" name="nombre_producto" id="nombre_producto">
          </div>
          <div class="form-group">
            <label for="detalles">Descripción</label>
            <input type="text" placeholder="Ingrese los detalles del producto" class="form-control" name="detalles" id="detalles">
          </div><br>
          <hr>
          <div class="row">
            <div class="col-5">
              <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" placeholder="Ingrese precio" class="form-control" name="precio" id="precio">
              </div>
              <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" placeholder="Ingrese el stock" class="form-control" name="stock" id="stock">
              </div>
            </div>
            <div class="form-group col-7">
              <label for="imagen">Imagen</label>
              <input type="file" class="form-control" name="imagen" id="imagen">
            </div>
          </div><br>
          <hr>
          <div class="form-group">
            <label for="codbar">Codigo de barras</label>
            <input type="number" placeholder="Ingrese el codigo de barras" class="form-control" name="codbar" id="codbar">
          </div><br>
          <hr>
          <div class="row">
            <div class="form-group col-4">
              <label>Categoria</label>
              <?php
              $query_categoria = mysqli_query($conexion, "SELECT id, nombre FROM categoria ORDER BY nombre ASC");
              $resultado_categoria = mysqli_num_rows($query_categoria);
              ?>
              <select id="categoria" name="categoria" class="form-control">
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
            </div>
            <div class="form-group col-4">
              <label>Estado</label>
              <?php
              $query_estado = mysqli_query($conexion, "SELECT id, nombre FROM estado ORDER BY nombre ASC");
              $resultado_estado = mysqli_num_rows($query_estado);
              ?>
              <select id="estado" name="estado" class="form-control">
                <?php
                if ($resultado_estado > 0) {
                  while ($estado = mysqli_fetch_array($query_estado)) {
                ?>
                    <option value="<?php echo $estado['id']; ?>"><?php echo $estado['nombre']; ?></option>
                <?php
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group col-4">
              <label>Proveedor</label>
              <?php
              $query_proveedor = mysqli_query($conexion, "SELECT codproveedor, proveedor FROM proveedor ORDER BY proveedor ASC");
              $resultado_proveedor = mysqli_num_rows($query_proveedor);
              mysqli_close($conexion);
              ?>
              <select id="proveedor" name="proveedor" class="form-control">
                <?php
                if ($resultado_proveedor > 0) {
                  while ($proveedor = mysqli_fetch_array($query_proveedor)) {
                    // code...
                ?>
                    <option value="<?php echo $proveedor['codproveedor']; ?>"><?php echo $proveedor['proveedor']; ?></option>
                <?php
                  }
                }
                ?>
              </select>
            </div>
          </div><br>
          <input type="submit" value="Guardar Producto" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>