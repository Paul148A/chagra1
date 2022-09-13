<?php
include_once "includes/header.php";
include "../conexion.php";

if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombre_producto']) || empty($_POST['precio'])) {
    $alert = '<div class="alert alert-primary" role="alert">
              Todo los campos son requeridos
            </div>';
  } else {
    $codproducto = $_GET['id'];
    $producto = $_POST['nombre_producto'];
    $proveedor = $_POST['proveedor'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    if (empty($_FILES['imagennew']['name'])) {
      $query_img = mysqli_query($conexion, "SELECT imagen from producto WHERE codproducto = $codproducto");
      $imagen_data = mysqli_fetch_assoc($query_img);
      $img = $imagen_data['imagen'];
    }

    if (!empty($_FILES['imagennew']['name'])) {
      $img  =  $_FILES['imagennew']['name'];
      $temp = $_FILES['imagennew']['tmp_name'];
      move_uploaded_file($temp, 'imagenes/' . $img);
    }
    $barras = $_POST['codbar'];
    $categoria = $_POST['categoria'];
    $estado = $_POST['estado'];
    $query_update = mysqli_query($conexion, "UPDATE producto SET nombre_producto = '$producto', proveedor= $proveedor, precio= $precio, stock = $stock, imagen =  '$img', codigobar = $barras, categoria = $categoria, estado = $estado WHERE codproducto = $codproducto");

    if ($query_update) {
      $alert = '<div class="alert alert-primary" role="alert">
              Modificado
            </div>';
    } else {
      $alert = '<div class="alert alert-primary" role="alert">
                Error al Modificar
              </div>';
    }
  }
}

// Validar producto

if (empty($_REQUEST['id'])) {
  header("Location: lista_productos.php");
} else {
  $id_producto = $_REQUEST['id'];
  if (!is_numeric($id_producto)) {
    header("Location: lista_productos.php");
  }
  $query_producto = mysqli_query($conexion, "SELECT p.codproducto, p.nombre_producto, p.detalles, p.precio, p.stock, p.codigobar, p.categoria, pr.codproveedor, pr.proveedor FROM producto p JOIN proveedor pr ON p.proveedor = pr.codproveedor WHERE p.codproducto = $id_producto");
  $query_producto_estado = mysqli_query($conexion, "SELECT p.codproducto, e.id, e.nombre FROM producto p JOIN estado e ON p.estado = e.id WHERE p.codproducto = $id_producto");
  $query_producto_categoria = mysqli_query($conexion, "SELECT p.codproducto, c.id, c.nombre FROM producto p JOIN categoria c ON p.categoria = c.id WHERE p.codproducto = $id_producto");

  $result_producto = mysqli_num_rows($query_producto);
  $result_producto_estado = mysqli_num_rows($query_producto_estado);
  $result_producto_categoria = mysqli_num_rows($query_producto_categoria);


  if ($result_producto > 0) {
    $data_producto = mysqli_fetch_array($query_producto);
    $data_producto_estado = mysqli_fetch_array($query_producto_estado);
    $data_producto_categoria = mysqli_fetch_array($query_producto_categoria);
  } else {
    header("Location: lista_productos.php");
  }
}
?>
<!-- Begin Page Content -->

<div class="row">
  <div class="col-lg-8 m-auto">
    <div class="card">
      <div class="card-header bg-danger text-white">
        Formulario de actualizar producto
      </div>
      <form action="" method="post" autocomplete="off" enctype="multipart/form-data" class="card-body p-2">
        <?php echo isset($alert) ? $alert : ''; ?>

        <div class="form-group">
          <label for="nombre_producto">Producto</label>
          <input type="text" placeholder="Ingrese el nombre del producto" value="<?php echo $data_producto['nombre_producto'] ?>" class="form-control" name="nombre_producto" id="nombre_producto">
        </div>
        <div class="form-group">
          <label for="detalles">Descripción</label>
          <input type="text" value="<?php echo $data_producto['detalles'] ?>" class="form-control" name="detalles" id="detalles">
        </div><br>
        <hr>
        <div class="row">
          <div class="col-5">
            <div class="form-group">
              <label for="precio">Precio</label>
              <input type="text" value="<?php echo $data_producto['precio'] ?>" placeholder="Ingrese precio" class="form-control" name="precio" id="precio">
            </div>
            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="number" value="<?php echo $data_producto['stock'] ?>" placeholder="Ingrese el stock" class="form-control" name="stock" id="stock">
            </div>
          </div>
          <div class="form-group col-7">
            <label for="imagennew">Imagen</label>
            <input type="file" class="form-control" name="imagennew" id="imagennew">
          </div>
        </div><br>
        <hr>
        <div class="form-group">
          <label for="codbar">Codigo de barras</label>
          <input type="number" value="<?php echo $data_producto['codigobar'] ?>" placeholder="Ingrese el codigo de barras" class="form-control" name="codbar" id="codbar">
        </div><br>
        <hr>
        <div class="row">
          <div class="form-group col-4">
            <label for="nombre">Categoria</label>
            <?php
            $query_categoria = mysqli_query($conexion, "SELECT * FROM categoria ORDER BY nombre ASC");
            $resultado_categoria = mysqli_num_rows($query_categoria);
            ?>
            <select id="categoria" name="categoria" class="form-control">
              <option value="<?php echo $data_producto_categoria['id']; ?>" selected><?php echo $data_producto_categoria['nombre']; ?></option>
              <?php
              if ($resultado_categoria > 0) {
                while ($categoria = mysqli_fetch_array($query_categoria)) {
                  // code...
              ?>
                  <option value="<?php echo $categoria['nombre']; ?>"><?php echo $categoria['nombre']; ?></option>
              <?php
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group col-4">
            <label for="nombre">Estado</label>
            <?php
            $query_estado = mysqli_query($conexion, "SELECT * FROM estado ORDER BY nombre ASC");
            $resultado_estado = mysqli_num_rows($query_estado);
            ?>
            <select id="estado" name="estado" class="form-control">
              <option value="<?php echo $data_producto_estado['id']; ?>" selected><?php echo $data_producto_estado['nombre']; ?></option>
              <?php
              if ($resultado_estado > 0) {
                while ($estado = mysqli_fetch_array($query_estado)) {
                  // code...
              ?>
                  <option value="<?php echo $estado['nombre']; ?>"><?php echo $estado['nombre']; ?></option>
              <?php
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group col-4">
            <label for="nombre">Proveedor</label>
            <?php
            $query_proveedor = mysqli_query($conexion, "SELECT * FROM proveedor ORDER BY proveedor ASC");
            $resultado_proveedor = mysqli_num_rows($query_proveedor);
            ?>
            <select id="proveedor" name="proveedor" class="form-control">
              <option value="<?php echo $data_producto['codproveedor']; ?>" selected><?php echo $data_producto['proveedor']; ?></option>
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
        <input type="submit" value="Actualizar Producto" class="btn btn-danger">
      </form>
    </div>
  </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>