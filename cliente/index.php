<?php
require "../Admin/funciones/conecta.php";
$con = conecta();
// Generar un numero random para mostrar un banner distinto
$sql = "SELECT * FROM banners WHERE status = 1 AND eliminado = 0 ORDER BY RAND() LIMIT 1";
$res_banner = $con->query( $sql );

$sql = "SELECT * FROM productos WHERE status_producto = 1 AND eliminado_producto = 0 ORDER BY RAND() LIMIT 6";
$res_productos = $con->query( $sql );
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home</title>
</head>
<body>
     <header> <?php require_once('header.php'); ?> </header>

     <!-- Mostrar un banner diferente cada que el usuario re-carga la pagina -->
     <div class="conatiner text-center mx-5" style="width:90%">
        <div class="row justify-content-center my-4">
            <?php while($row = $res_banner->fetch_array()) {?>
                <div class="col-4 mb-4" id="<?php echo $row['id'] ?>">
                    <div class="card">
                         <!-- mostrar el banner -->
                        <img src="../Admin/banners/<?php echo $row['archivo'] ?>" class="card-img-top" style="height:200px; width:600px;">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

     <div class="row justify-content-center my-4">

          <?php while($row = $res_productos->fetch_array()) {?>

               <div class="col-4 mb-4" id="<?php echo $row['id'] ?>">
                    <div class="card">
                        <img src="../imagenes_productos/<?php echo $row['archivo_productos'] ?>" class="card-img-top" style="height:300px; with:300px;">
                        <div class="card-body">
                            <h5 class="card-title">Empresa: <?php echo $row['nombre_producto'] ?></h5>
                            <p class="card-text"><?php echo $row['descripcion'] ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Sueldo: $<?php echo $row['costo'] ?></li>
                        </ul>
                        <a class="btn btn-primary btn-sm" href=<?php echo "productos_detalle.php?id=".$row['id'] ?>>Ver detalle</a>
                        <a class="btn btn-warning btn-sm" href=<?php echo "agregar_carrito.php?id=".$row['id'] ?>>Aplicar al puesto</a>
                    </div>
               </div>
          <?php } ?>
     </div>
     
<?php require_once 'footer.php' ?>