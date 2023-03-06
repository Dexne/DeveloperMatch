<?php
require "funciones/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];
$sql = "SELECT * FROM pedidos_productos WHERE id_pedido = $id";
$res = $con->query( $sql );
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Detalles del pedido</title>
</head>
<body>
     <header> <?php require_once('menu.php'); ?> </header>

     <div class="conatiner text-center mx-5"">
          <h1 class="display-6 my-5">Pedidos cerrados</h1>
          
          <?php while($row = $res->fetch_array()) {?>
               <table class="table table-dark table-striped">
               <thead>
                    <tr>
                         <th scope="col">ID</th>
                         <th scope="col">ID Pedido</th>
                         <th scope="col">ID Producto</th>
                         <th scope="col">Cantidad</th>
                         <th scope="col">precio</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                         <th scope="row"><?php echo $row['id'] ?></th>
                         <td><?php echo $row['id_pedido'] ?></td>
                         <td><?php echo $row['id_producto'] ?></td>
                         <td><?php echo $row['cantidad'] ?></td>
                         <td><?php echo $row['precio'] ?></td>
                    </tr>
                    </tbody>
               </table>
          <?php } ?>
          <a href="pedidos_lista.php" class="btn btn-primary mt-4">Regresar al listado</a>
     </div>
     <br><br><br><br>

     <footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>