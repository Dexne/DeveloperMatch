<!DOCTYPE html>
<html lang="es">
<head>
     <title>Alta banners</title>
     <script>
          //variable tipo bandera para que no me deje avanzar si el code no es valido
          var validFile = false;
          
          function validate_archivo() {
              let archivo = document.forma01.archivo.value;
               if(archivo != ''){
                        $.ajax({
                        url : 'banners_valida_archivo.php',
                        type: 'post',
                        dataType: 'text',
                        data: 'archivo='+archivo,
          
                        success : function( data ){
                              if ( data == 1 ) {
                                   $('#mensaje').html('El banner '+ archivo +' ya existe');
                                   $('#mensaje').show();
                                   setTimeout(() => {$('#mensaje').hide();}, 5000);                                  
                                   validFile = false;
                              } else {
                                   validFile = true;
                              }
                        },error: function(){
                            alert('Error archivo no encontrado...');
                        }
                    });
               }
          }
          
          function recibe( e ){
               e.preventDefault();
               let nombre = document.forma01.nombre.value;
               let archivo = document.forma01.archivo.value;

               console.log( nombre, archivo );
               
               validate_archivo()
               if(nombre != '' && archivo != '') {
                    if ( validFile == false ) {
                         $('#mensaje').html('El archivo '+ archivo +' ya existe');
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
     </br>
     <div class="container mt-4 text-center">
          <div class="row justify-content-center">
               <div class="col-6">
                    <form class="my-4" name="forma01" action="banners_salva.php" method="POST" enctype="multipart/form-data">
                         <div class="mb-3">
                              <label class="form-label">Nombre</label>
                              <input type="text" class="form-control" name="nombre" placeholder="Escribe el nombre del banner">
                         </div>
                         <div class="mb-3">
                              <label for="formFile" class="form-label">Imagen / Banner</label>
                              <input class="form-control" type="file" name="archivo"  accept="image/png, image/jpeg, image/jpg" onblur="validate_archivo();">
                         </div>
                         <button type="submit" class="btn btn-primary" onclick="recibe( event );">Enviar</button>
                    </form>
                    <div id="mensaje" class="alert alert-warning my-4" role="alert" style="display:none"></div>
                    <a href="banners_lista.php" class="btn btn-danger mt-4 my-4">Regresar al listado</a>
               </div>
          </div>
     </div>
     </br></br>
     <footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>
