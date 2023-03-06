<?php
require "funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];

$query = "SELECT * FROM banners WHERE id = $id AND eliminado = 0";
$res = $con->query($query);
$row = $res->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Detalles banners</title>
     
</head>

<body align="center">
    <header><?php require_once('menu.php');?></header>
    </br></br>
    <div class="row justify-content-center my-4 text-center">
        <div class="col-4 mb-4">
            <div class="card">
                <img src="./banners/<?php echo $row['archivo'] ?>" class="card-img-top" style="height:200px; width:600px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['nombre'] ?></h5>
                </div>
            </div>
            <a href="banners_lista.php" class="btn btn-primary mt-4">Regresar al listado</a>
        </div>
    </div>
    <footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>