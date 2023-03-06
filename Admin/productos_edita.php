<?php
require "funciones/conecta.php";
$con = conecta();

$id = $_REQUEST['id'];
$query = "SELECT * FROM productos WHERE id=$id";

$res = $con->query( $query );
$row = $res->fetch_array();
?>

<!DOCTYPE html>
<html lang="es">
<head>
     <title>Vacantes edita</title>

     <script>
          var validCode = false;// variable bandera
          
          function validate_code() {
               let id = document.forma01.id.value;
               let codigo_producto = document.forma01.codigo_producto.value;

               //si tenemos codigo
               if( codigo_producto != '' ) {
                     // Campos llenos? 
                        $.ajax({
                        url : 'productos_valida_codigo.php',
                        type: 'post',
                        dataType: 'text',
                        //enviamos el correo y el id
                        data:"codigo_producto=" + encodeURIComponent(codigo_producto) + "&id=" + encodeURIComponent(id),
                        success : function( data ){
                              if ( data == 1 ) {
                                   //match
                                   $('#mensaje_codigo_producto').html('El codigo '+ codigo_producto +' ya existe');
                                   setTimeout("$('#mensaje_correo').html('');", 5000);
                                   //actualizamos bandera
                                   validCode = false;
                              }
                              else {
                                   validCode = true;
                              }
                         }
                         ,error: function(){
                            alert('Error archivo no encontrado...');
                        }
                    });
               }
          }
          
          function recibe( e ){
               e.preventDefault();
               let nombre_producto = document.forma01.nombre_producto.value;
               let codigo_producto = document.forma01.codigo_producto.value;
               let descripcion = document.forma01.descripcion.value;
               let costo = document.forma01.costo.value;
               let stock = document.forma01.stock.value;
               validate_code();
               if(nombre_producto != '' && codigo_producto != '' && descripcion != '' ){
                    // si solo falta el correo valido
                    if ( validCode == false ) { return; }
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
          <h1 class="my-4">Editar vacante</h1>
          <div class="row justify-content-center">
               <div class="col-6">
                    <form class="my-4" name="forma01" action="productos_actualiza.php" method="POST" enctype="multipart/form-data">
                         
                         <input name="id" type="hidden" value="<?php echo $row['id']?>">

                         <div class="mb-3">
                              <label class="form-label">Nombre</label>
                              <input id="campo1" type="text" class="form-control" name="nombre_producto" value="<?php echo $row['nombre_producto'] ?>" >
                         </div>
                         <div class="mb-3">
                              <label class="form-label">Codigo</label>
                              <input type="text" class="form-control" name="codigo_producto" value="<?php echo $row['codigo_producto'] ?>" onblur="validate_code();">
                         </div>
                         <div class="mb-3">
                              <label class="form-label">Descripción</label>
                              <textarea class="form-control" name="descripcion"><?php echo $row['descripcion']?></textarea>
                         </div>
                         <div class="row mb-3">
                              <div class="col-6">
                                   <label class="form-label">Salario</label>
                                   <input type="number" class="form-control" name="costo" min=0 value=<?php echo $row['costo'] ?>>
                              </div>
                              <div class="col-6">
                                   <label class="form-label">Num. Vacantes</label>
                                   <input type="number" class="form-control" name="stock" min=0 value=<?php echo $row['stock'] ?>>
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="formFile" class="form-label">Imagen</label>
                              <input class="form-control" type="file" name="archivo_producto" accept="image/png, image/jpeg, image/jpg">
                         </div>
                         <button type="submit" class="btn btn-primary" onclick="recibe( event );">Enviar</button>
                    </form>
                    <div id="mensaje" class="alert alert-warning my-4" role="alert" style="display:none"></div>
                    <a href="productos_lista.php" class="btn btn-danger mt-4 my-4">Regresar al listado</a>
               </div>
          </div>
     </div>
     <div>
     </div>
</div>
<footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>