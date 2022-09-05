<?php include_once "includes/header.php";
  include "../conexion.php";
  
  ?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

 <!-- Begin Page Content -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
     <a href="lista_productos.php" class="btn btn-danger">Regresar</a>
   </div>
   <div class="row">
     <div class="col-lg-6 m-auto">
       <form action="cargar_data.php" method="post" enctype="multipart/form-data" id="filesForm">
       <div class="form-group">
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
       <div class="form-group">
           <label for="">Seleccione su archivo de Excel</label>
           <input type="file" class="form-control" name="file"><br>
            <button type="button" onclick="uploadContacts()" class="btn btn-danger form-control">Cargar</button>
        </div>
       </form>
     </div>
   </div>

   <script type="text/javascript">
    function uploadContacts(){
        var Form = new FormData($('#filesForm')[0]);
        $.ajax({
            url: "cargar_data.php",
            type: "post",
            data: Form,
            processData: false,
            contentType: false,
            success: function(data){
                alert('Registros Agregados');
            }
        })
    }
   </script>
 <!-- End of Main Content -->
 
 
 <?php include_once "includes/footer.php"; ?>

 