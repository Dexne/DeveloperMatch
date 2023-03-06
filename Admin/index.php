<?php
session_start();

// si NO existe la variable nombre en la sesion
if ( isset( $_SESSION['nombre'] ) ) {
    header( 'location: bienvenido.php' );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inicia sesión</title>

    <!-- importamos jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <script>
        function validar(){
            var user = $('#user').val();
            var pass = $('#pass').val();

            if(user != '' && pass != ''){// si tenemos datos
                $.ajax({
                    url: 'funciones/validaUsuario.php',
                    type: 'POST',
                    dataType: 'text',
                    data: 'user='+user+'&pass='+pass,//enviamos los datos
                    success: function(res){
                        if(res == 1){
                            window.location.replace( "bienvenido.php" );//redireccionamiento
                        }else{
                            $('#mensaje').html('Datos incorrectos');
                            setTimeout("$('#mensaje').html('')",5000);
                        }
                    },error: function(){
                        alert('Error al conectar al servidor...');
                    }
                });//termina ajax
            }
            else{
                $('#mensaje').html('Faltan datos por llenar');
                setTimeout("$('#mensaje').html('')",5000);
            }
        }
    </script>
</head>
<body>
    <div class="container my-4 py-4">
        <div class="row justify-content-center">
            <div class="col-4 text-center">
                <div class="mb-3">
                    <h2>Developer Match</h2><br>
                    <h4>Inciar sesión</h4><br>
                    <label for="exampleInputEmail1" class="form-label">Usuario</label>
                    <input type="email" class="form-control" id="user" name="user" >
                    <div class="form-text">Escribe tu correo electronico</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="pass" id="pass">
                </div>
                <button class="btn btn-success" onclick="validar();">Iniciar sesion</button>
                </br></br></br><h6>¿No tienes cuenta? Crea una</h6><br>   
            </div>
        </div>
    </div>
</body>
</html>
