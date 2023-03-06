<!DOCTYPE html>
<html lang="es">
<head>
     <title>Alta vacantes</title>
     <script>
          //variable tipo bandera para que no me deje avanzar si el code no es valido
          var validCode = false;
          
          function validate_code() {
              let codigo_producto = document.forma01.codigo_producto.value;
               if(codigo_producto != ''){
                        $.ajax({
                        url : 'productos_valida_codigo.php',
                        type: 'post',
                        dataType: 'text',
                        data: 'codigo_producto='+codigo_producto,
          
                        success : function( data ){
                              if ( data == 1 ) {
                                   $('#mensaje').html('El codigo '+ codigo_producto +' ya existe');
                                   $('#mensaje').show();
                                   setTimeout(() => {$('#mensaje').hide();}, 5000);                               
                                   validCode = false;
                              } else {
                                   validCode = true;
                              }
                        },error: function(){
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
               let archivo = document.forma01.archivo_producto.value;
               
               if(nombre_producto != '' && codigo_producto != '' && descripcion != '' && archivo != '') {
                    if ( validCode == false ) {
                         $('#mensaje').html('El codigo '+ codigo_producto +' ya existe');
                         $('#mensaje').show( "slow" );
                         setTimeout(() => {$('#mensaje').hide();}, 5000);
                         return;
                    }
                    else {
                         document.forma01.submit();
                    }
               }
               else {
                    $('#mensaje').html('Faltan campos por llenar');
                    $('#mensaje').show( "slow" );
                    setTimeout(() => {$('#mensaje').hide("slow");}, 5000);
               }
          }
     </script>
</head>
<body>
     <header> <?php require_once('menu.php');?></header>
     
     <div class="container mt-4 text-center">
          <div class="row justify-content-center">
               <div class="col-6">
                    <form class="my-4" name="forma01" action="productos_salva.php" method="POST" enctype="multipart/form-data">
                         <div class="mb-3">
                              <label class="form-label">Nombre</label>
                              <input type="text" class="form-control" name="nombre_producto" placeholder="Escribe el nombre del producto">
                         </div>
                         <div class="mb-3">
                              <label class="form-label">Codigo</label>
                              <input type="text" class="form-control" name="codigo_producto" placeholder="Escribe el codigo en numeros" onblur="validate_code();">
                         </div>
                         <div class="mb-3">
                              <label class="form-label">Descripción</label>
                              <textarea class="form-control" name="descripcion" placeholder="Breve descripcion"></textarea>
                         </div>
                         <div class="row mb-3">
                              <div class="col-6">
                                   <label class="form-label">Sueldo</label>
                                   <input type="number" class="form-control" name="costo" min=0 value=20000>
                              </div>
                              <div class="col-6">
                                   <label class="form-label">Num. Vacantes</label>
                                   <input type="number" class="form-control" name="stock" min=0 value=1>
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

     <footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>
