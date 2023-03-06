<?php
require "funciones/conecta.php";
$con = conecta();

$id = $_REQUEST['id'];
$query = "SELECT * FROM banners WHERE id=$id";

$res = $con->query( $query );
$row = $res->fetch_array();
?>

<!DOCTYPE html>
<html lang="es">
<head>
     <title>Banners edita</title> 

     <script>
          var validFile = false;// variable bandera
          
          function validate_archivo() {
               let id = document.forma01.id.value;
               let archivo = document.forma01.archivo.value;

               //si tenemos codigo
               if( archivo != '' ) {
                     // Campos llenos? 
                        $.ajax({
                        url : 'banners_valida_archivo.php',
                        type: 'post',
                        dataType: 'text',
                        //enviamos el correo y el id
                        data:"archivo=" + encodeURIComponent(archivo) + "&id=" + encodeURIComponent(id),
                        success : function( data ){
                              if ( data == 1 ) {
                                   //match
                                   $('#mensaje_archivo').html('El banner '+ archivo +' ya existe');
                                   setTimeout("$('#mensaje_correo').html('');", 5000);
                                   //actualizamos bandera
                                   validFile = false;
                              }
                              else validFile = true;
                         }
                         ,error: function(){
                            alert('Error archivo no encontrado...');
                        }
                    });
               }
          }
          
          function recibe( e ){
               e.preventDefault();
               let nombre = document.forma01.nombre.value;
               let archivo = document.forma01.archivo.value;
               
               validate_archivo( archivo );

               if(nombre != '' && archivo != ''){
                    // si solo falta el correo valido
                    if ( validFile == false ) { return; }
                    else{
                         // si todos los campos estan llenos y el codigo es valido
                         document.forma01.submit();
                    }
               }
               else {
                    $('#mensaje').html('Faltan campos por llenar');
                    setTimeout("$('#mensaje').html('');", 5000);
               }
          }
     </script>

</head>
<body align ="center">
     <!-- Aqui insertamos la barra de menu, nuesto header -->

     <header> <?php require_once('menu.php'); ?> </header>
     
     <div class="container mt-4 text-center">
          <h1 class="my-4">Editar banners</h1>
          <div class="row justify-content-center">
               <div class="col-6">
                    <form class="my-4" name="forma01" action="banners_actualiza.php" method="POST" enctype="multipart/form-data">
                         
                         <input name="id" type="hidden" value=<?php echo $row['id']?>>

                         <div class="mb-3">
                              <label class="form-label">Nombre</label>
                              <input id="campo1" type="text" class="form-control" name="nombre" value="<?php echo $row['nombre'] ?>" >
                         </div>
                         
                         <div class="mb-3">
                              <label for="formFile" class="form-label">Imagen</label>
                              <input class="form-control" type="file" name="archivo" accept="image/png, image/jpeg, image/jpg" onblur="validate_archivo();">
                         </div>
                         <button type="submit" class="btn btn-primary" onclick="recibe( event );">Enviar</button>
                    </form>
                    <div id="mensaje" class="alert alert-warning my-4" role="alert" style="display:none"></div>
                    <a href="banners_lista.php" class="btn btn-danger mt-4 my-4">Regresar al listado</a>
               </div>
          </div>
     </div>
     <div>
     </div>
</div>
<footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>