<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                                    Todo los campos son obligatorio
                                </div>';
    } else {
        $nombre = strtoupper($_POST['nombre']);

        $query_insert = mysqli_query($conexion, "INSERT INTO categoria(nombre) values ('$nombre')");
        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                                    Categoria Registrada
                                </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                                    Error al Guardar
                            </div>';
        }
    }
}
mysqli_close($conexion);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="lista_cliente.php" class="btn btn-danger">Regresar</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    Ingrese el nombre de la nueva categoria
                </div>
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data" class="card-body p-2">
                    <?php echo isset($alert) ? $alert : ''; ?>

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" placeholder="Ingrese Nombre" name="nombre" id="nombre" class="form-control">
                    </div><br>
                    <input type="submit" value="Guardar Categoria" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>