<?php
require "../Admin/funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];

$query = "SELECT * FROM productos WHERE id = $id AND eliminado_producto = 0";
$res = $con->query($query);
$row = $res->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Detalles vacante</title>
</head>

<body>
    <header><?php require_once 'header.php' ?></header>

    <div class="row justify-content-center my-4 text-center">
        <div class="col-4 mb-4">
            <div class="card">
                <img src="../imagenes_productos/<?php echo $row['archivo_productos'] ?>" class="card-img-top" style="height:300px;">
                <div class="card-body">
                    <h5 class="card-title">Empresa: <?php echo $row['nombre_producto'] ?></h5>
                    <p class="card-text"><?php echo $row['descripcion'] ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Sueldo: <?php echo $row['costo'] ?></li>
                    <li class="list-group-item">Num. vacantes: <?php echo $row['stock'] ?></li>
                </ul>
            </div>
            <a href="index.php" class="btn btn-primary mt-4">Regresar al listado</a>
        </div>
    </div>

<?php require_once 'footer.php' ?>