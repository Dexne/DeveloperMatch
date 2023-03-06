<?php
require "funciones/conecta.php";
$con = conecta();
$sql = "SELECT * FROM administradores WHERE status = 1 AND eliminado = 0";
$res = $con->query( $sql );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>                                                     

    <!-- JS -->
    <script>
    function eliminar( id ){
        if( confirm(`¿Seguro que desea elimanr el registro?`) == true ){
            // uso de AJAX
            $.ajax({
                url : 'administradores_elimina.php',
                type: 'post',
                dataType: 'text',
                data: {'id': id},
                success : function(){
                    alert('Registro eliminado con exito');
                    //eliminacion con uso de jQuery
                    $( `#${id}` ).hide();       
                },error: function(){
                    // en caso de que no se encuentre administradores_elimina.php
                    alert('Error al cargar el archivo');
                }
            });
        }
    }
    </script>
</head>

<body>
    <header> <?php require_once('menu.php'); ?> </header>

    <div class="conatiner text-center mx-5" style="width:90%">
        <div class="muestra my-4">
            <h1 style="text-align: center;">LISTA DE USUARIOS</h1>
            <a class="btn btn-success mt-4" href="administradores_alta.php">Crear nuevo registro</a>
        </div>
    
        <div class="row justify-content-center my-4">
            <?php while($row = $res->fetch_array()) {?>
                <div class="col-4 mb-4" id="<?php echo $row['id'] ?>">
                    <div class="card">
                        <img src="imagenes/<?php echo $row['archivo'] ?>" class="card-img-top" style="height:300px; with:300px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre']," ", $row['apellidos'] ?></h5>
                            <p class="card-text">ID <?php echo $row['id'] ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo $row['correo'] ?></li>
                            <li class="list-group-item"><?php echo $row['rol'] ?></li>
                        </ul>
                        <div class="card-body">
                            <button class="btn btn-danger btn-sm" onclick="eliminar('<?php echo $row['id'] ?>')">Eliminar</button>
                            <a class="btn btn-warning btn-sm" href=<?php echo "administradores_edita.php?id=".$row['id'] ?>>Editar</a>
                            <a class="btn btn-primary btn-sm" href=<?php echo "administradores_detalle.php?id=".$row['id'] ?>>Ver detalle</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>