<?php 
include "includes/header.php";
include "../conexion.php";

?>

<html lang="es">
	<head> 
		


        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	</head>
	<body>
		
			<div>
			<h3 class="col-md-4 offset-md-4">Seleccione un archivo CSV </h3>
			</div>
		

        <form action="files.php" method="post" enctype="multipart/form-data" id="filesForm">
        <div class="form-group col-md-4 offset-md-4">
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
        <div class="col-md-4 offset-md-4">
           <label>Archivo CSV</label>

                <input class="form-control" type="file" name="fileContacts" ><br>

                <button type="button" onclick="uploadContacts()" class="btn btn-danger form-control" >Cargar</button>
            </div>
        </form>

</body>
</html>

<script type="text/javascript">

    function uploadContacts()
    {
        var Form = new FormData($('#filesForm')[0]);
        $.ajax({

            url: "cargar_data1.php",
            type: "post",
            data : Form,
            processData: false,
            contentType: false,
            success: function(data)
            {
                alert('Registros Agregados!');
            }
        });
    }

</script>

<?php include_once "includes/footer.php"; ?>
