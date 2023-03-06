<?php
require "funciones/recuperarUsuario.php";
$usuario = recuperarUsuario( $_REQUEST['id'] );
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
     <title>Detalles</title>
</head>

<body align="center">

    <body align="center">
    <header><?php require_once('menu.php');?></header>
    
    </br></br>
    <div class="row justify-content-center my-4 text-center">
        <div class="col-4 mb-4">
            <div class="card">
                <img src="imagenes/<?php echo $usuario['archivo'] ?>" class="card-img-top" style="height:300px; with:300px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $usuario['nombre']." ".$usuario['apellidos']?></h5>
                    
                    <p class="card-text"><?php echo $usuario['correo'] ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $usuario['rol'] == 1 ? 'Empresa' : 'Candidato' ?></li>
                </ul>
            </div>
            <a href="administradores_lista.php" class="btn btn-primary mt-4">Regresar al listado</a>
        </div>
    </div>
    </br></br>

    <footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>