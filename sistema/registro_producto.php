<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['proveedor']) || empty($_POST['descripcion']) || empty($_POST['nombre_producto']) || empty($_POST['codbar']) || empty($_POST['precio']) || $_POST['precio'] <  0 || empty($_POST['cantidad'] || $_POST['cantidad'] <  0) || empty($_FILES['imagen'])) {
    $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
  } else {
    $producto = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $proveedor = $_POST['proveedor'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $img = $_FILES['imagen']['name'];
    $temp = $_FILES['imagen']['tmp_name'];
    $barras = $_POST['codbar'];
    $categoria =$_POST['categoria'];
    $query_insert = mysqli_query($conexion, "INSERT INTO `producto`( `nombre_producto`, `descripcion`, `proveedor`, `precio`, `stock`, `imagen`, `codigobar`, `categoria`)values ('$producto','$descripcion', '$proveedor', '$precio', '$stock', '$img', '$barras', '$categoria')");
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

<head>
  <script src="../JsBarcode.all.min.js"></script>

</head>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between">
    <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
  </div>
  <div class="d-sm-flex justify-content-end ">
    <a href="lista_productos.php" class="btn btn-danger mx-3">Regresar</a>
    <a href="subir_excel.php" class="btn btn-success">Subir masivamente</a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-6 m-auto">
      <div class="card">
        <div class="card-header bg-danger text-white">
          Datos del nuevo producto
        </div>
        <form action="" method="post" autocomplete="off" enctype="multipart/form-data" class="card-body p-2">
          <?php echo isset($alert) ? $alert : ''; ?>
          <div class="form-group">
            <label>Proveedor</label>
            <?php
            $query_proveedor = mysqli_query($conexion, "SELECT codproveedor, proveedor FROM proveedor ORDER BY proveedor ASC");
            $resultado_proveedor = mysqli_num_rows($query_proveedor);
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
          <div class="form-group">
            <label for="producto">Producto</label>
            <input type="text" placeholder="Ingrese el nombre del producto" class="form-control" name="producto" id="producto">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea  placeholder="Ingrese la descripcion del producto" name="descripcion" id="descripcion" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" placeholder="Ingrese precio" class="form-control" name="precio" id="precio">
          </div>
          <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" placeholder="Ingrese el stock" class="form-control" name="stock" id="stock">
          </div>
          <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control" name="imagen" id="imagen">
          </div>
          <div class="form-group">
            <label for="codbar">Codigo de barras</label>
            <input type="number" placeholder="Ingrese el codigo de barras" class="form-control" name="codbar" id="codbar">
          </div>
          <div class="form-group">
            <label>Categoria</label>
            <?php
            $query_categoria = mysqli_query($conexion, "SELECT id, nombre FROM categoria ORDER BY nombre ASC");
            $resultado_categoria = mysqli_num_rows($query_categoria);
            mysqli_close($conexion);
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