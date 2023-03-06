<?php
require "funciones/conecta.php";
$con = conecta();
$sql = "SELECT * FROM pedidos WHERE status = 1";
$res = $con->query( $sql );
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

     <title>Pedidos</title>
</head>
<body>
<!-- HEADER -->
     <header> <?php require_once('menu.php'); ?> </header>

     <div class="conatiner text-center mx-5" style="width:90%">
     <h1 class="display-4">Pedidos cerrados</h1><br>

     <div class="conatiner text-center mx-5"">
          <table class="table table-dark table-striped">
               <thead>
                    <tr>
                         <th scope="col">ID</th>
                         <th scope="col">Ver todos los detalles del pedido</th>
                    </tr>
               </thead>
          </table>
          <?php while($row = $res->fetch_array()) {?>
               <table class="table table-dark table-striped">
                    <thead>
                         <tr>
                              <th scope="col"><?php echo $row['id'] ?></th>
                              <th scope="col"><a class="btn btn-info btn-sm" href=<?php echo "pedidos_detalle.php?id=".$row['id'] ?>>Mas información</a></th>
                         </tr>
                    </thead>
               </table>
          <?php } ?>
     </div>

     </div>
     <br><br><br>


<!-- FOOTER -->
<footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>
