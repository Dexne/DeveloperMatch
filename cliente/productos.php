<?php
require "../Admin/funciones/conecta.php";
$con = conecta();
$sql = "SELECT * FROM productos WHERE status_producto = 1 AND eliminado_producto = 0";
$res = $con->query( $sql );
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Vacantes</title>
</head>
<body>
<?php require_once "header.php" ?>

<div class="row justify-content-center my-4">
    <?php while($row = $res->fetch_array()) {?>
        <div class="col-4 mb-4" id="<?php echo $row['id'] ?>">
            <div class="card">
                <img src="../imagenes_productos/<?php echo $row['archivo_productos'] ?>" class="card-img-top" style="height:300px;">
                <div class="card-body">
                    <h5 class="card-title">Empresa: <?php echo $row['nombre_producto'] ?></h5>
                    <p class="card-text"><?php echo $row['descripcion'] ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Sueldo: $<?php echo $row['costo'] ?></li>
                </ul>
                <!--  -->
                <a class="btn btn-primary btn-sm" href=<?php echo "productos_detalle.php?id=".$row['id'] ?>>Ver detalle</a>
                <a class="btn btn-warning btn-sm" href=<?php echo "agregar_carrito.php?id=".$row['id'] ?>>Aplicar al puesto</a>
            </div>
        </div>
    <?php } ?>
    <!-- Aqui mostramos el mensaje del ajax -->
    <div id="mensaje_producto" class="alert alert-warning my-4" role="alert" style="display:none"></div>
</div>

<script>
    function addToCar( id ) {
        $.ajax({
            url : 'agregar_carrito.php',
            type: 'post',
            dataType: 'text',
            data: `id=${id}`,
            success : function( data ){
                if ( data == 1 ) {
                    $('#mensaje_producto').html('Producto agregado al carrito');
                    setTimeout("$('#mensaje_producto').html('');", 5000); 
                }
            }
            ,error: function(){
                alert('Error archivo no encontrado...');
            }
        });
    }
</script>
<?php require_once 'footer.php' ?>