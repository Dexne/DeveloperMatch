<?php
     require "funciones/recuperarUsuario.php";
     $usuario = recuperarUsuario( $_GET['id'] );
?>

<!DOCTYPE html>
<html lang="es">
<head>
     <title>Editar informacion</title>

     <script>
          var validEmail = false;// variable bandera
          
          function validate_email() {
               let id = document.forma01.id.value;
               let correo = document.forma01.correo.value;

               //si tenemos correo
               if( correo != '' ) {
                     // Campos llenos? 
                        $.ajax({
                        url : 'admistradores_valida_email.php',
                        type: 'post',
                        dataType: 'text',
                        //enviamos el correo y el id
                        data:"correo=" + encodeURIComponent(correo) + "&id=" + encodeURIComponent(id),
                        success : function( data ){
                              if ( data == 1 ) {
                                   //match
                                   $('#mensaje_correo').html('El correo '+ correo +' ya existe');
                                   setTimeout("$('#mensaje_correo').html('');", 5000);
                                   //actualizamos bandera
                                   validEmail = false;
                              }
                              else validEmail = true;
                         }
                         ,error: function(){
                            alert('Error archivo no encontrado...');
                        }
                    });
               }
          }
          
          function recibe( e ){
               e.preventDefault();//evitar que se envien datos por default
               //variables 
               let id = document.forma01.id.value;
               let nombre = document.forma01.nombre.value;
               let apellidos = document.forma01.apellidos.value;
               let correo = document.forma01.correo.value;
               let rol = document.forma01.rol.value;
               let pass = document.forma01.pass.value;
               
               validate_email( id );
               //evaluar los casos
               if(nombre != '' && correo != '' && rol != "0" && apellidos !=''){
                    // si solo falta el correo valido
                    if ( validEmail == false ) { return; }
                    else{
                         // si todos los campos estan llenos y el email es valido
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
     
          <header> <?php require_once('menu.php'); ?> </header>
          </br></br>
          <h1 style="text-align: center;">Editar informacion</h1>

          <div class="container mt-4 text-center">
          <div class="row justify-content-center">
               <div class="col-6">
                    <form class="my-4" name="forma01" action="administradores_actualiza.php" method="POST" enctype="multipart/form-data">
                    <input type="text"name="id" value=<?php echo $usuario['id'] ?> hidden>
                         <div class="mb-3">
                              <label class="form-label">Nombre</label>
                              <input id="campo1" type="text" class="form-control" name="nombre" value="<?php echo $usuario['nombre'] ?>">
                         </div>
                         <div class="mb-3">
                              <label class="form-label">Apellidos</label>
                              <input id="campo2" type="text" class="form-control" name="apellidos" value="<?php echo $usuario['apellidos'] ?>">
                         </div>
                         <div class="mb-3">
                              <label class="form-label">Correo</label>
                              <input class="form-control" type="email" name="correo" value="<?php echo $usuario['correo'] ?>">
                              <div id="mensaje_correo"></div>
                         </div>

                         <select class="form-select" aria-label="Disabled select example" name="rol">
                              <option value="0">Selecciona tu rol</option>
                              <?php if ( $usuario['rol'] == 1 ) {?>
                                   <option value="1" selected>Empresa</option>
                                   <option value="2">Candidato</option>
                                   <!-- AGREGAR EL MODERADOR EN CASO DE CONSIDERARLO VIABLE-->
                              <?php }?>
                              <?php if ( $usuario['rol'] == 2 ) {?>
                                   <option value="1">Empresa</option>
                                   <option value="2" selected>Candidato</option>
                                   <!-- AGREGAR EL MODERADOR EN CASO DE CONSIDERARLO VIABLE-->
                              <?php }?>
                         </select>

                         
                         <div class="mb-3">
                              <!-- NO MOSTRAMOS LA CONTRASENIA POR SEGURIDAD -->
                              <label class="form-label" for="pass">Contraseña</label>
                              <input type="password" name="pass" class="form-control">
                         </div>
                         
                         <div class="mb-3">
                              <label for="formFile" class="form-label">Imagen</label>
                              <input class="form-control" type="file" id="archivo" name="archivo" accept="image/png, image/jpeg, image/jpg">
                         </div>
                         <input onclick="recibe(event);" type="submit" value=" Salvar " class="btn btn-success mt-4 my-4">
                    </form>
                    <div id="mensaje" class="alert alert-warning my-4" role="alert" style="display:none"></div>
                    <a href="administradores_lista.php" class="btn btn-danger mt-4 my-4">Regresar al listado</a>
               </div>
          </div>
     </div>
     </br>

     <footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>
