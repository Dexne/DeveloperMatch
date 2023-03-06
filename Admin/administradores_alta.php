<!DOCTYPE html>
<html lang="es">
<head>
     <title>Registro</title>

     <script>
          //variable tipo bandera para que no me deje avanzar si el email no es valido
          var validEmail = false;
          
          function validate_email() {
              let correo = document.forma01.correo.value;
               
              //evaluar los casos
              if(correo != ''){
                    // Campos llenos? 
                        $.ajax({
                        url : 'admistradores_valida_email.php',
                        type: 'post',
                        dataType: 'text',
                        data: 'correo='+correo,
          
                        success : function( data ){
                              if ( data == 1 ) {
                                   $('#mensaje_correo').html('El correo '+ correo +' ya existe');
                                   //hacer que desaparezca despues de 5 seg
                                   setTimeout("$('#mensaje_correo').html('');", 5000);
                                   // el correo existe, por lo tanto la bandera no cambia
                                   validEmail = false;
                              } else {
                                   //casi exitoso
                                   validEmail = true;
                              }
                        },error: function(){
                            alert('Error archivo no encontrado...');
                        }
                    });
               }
               else
               $('#mensaje').html('Faltan campos por llenar');
               setTimeout("$('#mensaje').html('');", 5000);
          }
          
          function recibe( e ){
               // funcion para prevenir el evento del submit
               e.preventDefault();

               //almacenar los datos de los inputs
               let nombre = document.forma01.nombre.value;
               let apellidos = document.forma01.apellidos.value;
               let correo = document.forma01.correo.value;
               let rol = document.forma01.rol.value;
               let pass = document.forma01.pass.value;
               
               //evaluar los casos
               if(nombre != '' && correo != '' && rol != "0" && pass != ''){
                    // si solo falta el correo valido
                    if ( validEmail == false ) {
                         $('#mensaje').html('El email'+ correo +' ya existe ');
                         setTimeout("$('#mensaje').html('');", 5000);
                         return;
                    }
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
<body>
<header><?php require_once('menu.php');?></header>
     
     <h1 style="text-align: center;">Registro de usuarios</h1>
     <div class="container mt-4 text-center">
          <div class="row justify-content-center">
               <div class="col-6">
                    <form class="my-4" name="forma01" action="administradores_salva.php" method="POST" enctype="multipart/form-data">
                         <div class="mb-3">
                              <label class="form-label">Nombre</label>
                              <input id="campo1" type="text" class="form-control" name="nombre" placeholder="Escribe tu nombre(s)" required>
                         </div>
                         <div class="mb-3">
                              <label class="form-label">Apellidos</label>
                              <input id="campo2" type="text" class="form-control" name="apellidos" placeholder="Escribe tu apellido(s)" requiered>
                         </div>
                         <div class="mb-3">
                              <label class="form-label">Correo</label>
                              <input class="form-control" type="email" name="correo" value="@gmail.com" onblur="validate_email();">
                              <div id="mensaje_correo"></div>
                         </div>

                         <div class="mb-3">
                              <label class="form-label">Rol</label>
                              <select class="form-select" aria-label="Disabled select example" name="rol">
                                   <option value="0" selected>Selecciona tu rol</option>
                                   <option value="1">Empresa</option>
                                   <option value="2">Candidato</option>
                                   <!--<option value="2">Moderador</option>  
                                   Deje esta opcion comentada por que no se si sea
                                   convenite que cualquier persona pueda elegir la 
                                   opcion de moderador. Posible falla de seguridad -->
                              </select>
                         </div>

                         <div class="mb-3">
                              <label class="form-label" for="pass">Contraseña</label>
                              <input type="password" name="pass" class="form-control" placeholder="Escribe tu contraseña">
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
<footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>