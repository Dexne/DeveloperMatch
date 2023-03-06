<?php
require "../Admin/funciones/getIdPedido.php";
// obtener el id para mostrarlo en la lista del carrito
$id_pedido = getIdPedido();
$con = conecta();

$sql ="SELECT P.id AS id,
               P.nombre_producto AS nombre_producto, 
               P.costo AS costo,
               P.archivo_productos AS archivo_productos,
               PP.cantidad AS cantidad,
               PP.precio AS precio
        FROM productos P
        LEFT JOIN pedidos_productos PP
        ON P.id = PP.id_producto 
        WHERE PP.id_pedido = $id_pedido";

$res = $con->query( $sql );

$sql = "SELECT"

//var_dump($precio);
?>

<script>
  function eliminar(id_p){
    var respuesta = confirm("Seguro que desea elimanar el producto");
    if(respuesta){
      window.location.href="eliminar_carrito.php?id="+id_p;
    }
  }

  function guardar(){
    var respuesta = confirm("Seguro que desea guardar el pedido");
    if(respuesta){
      window.location.href="guardar_pedido.php";
    }
  }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Vacantes pendientes</title>
</head>
<body>
     <header> <?php require_once('header.php'); ?> </header>

     <section class="h-100 h-custom" style="background-color: White;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Lista de solicitudes</h1>
                  </div>
                  <hr class="my-4">
                  
                <?php 
                $total = 0;
                $subTotal = 0;
                while($row = $res->fetch_array()) {?>

                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                        <img src="../imagenes_productos/<?php echo $row['archivo_productos'] ?>" class="card-img-top" style="height:100px; width:100px;" alt="Vaca">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted">Empresa</h6>
                      <h6 class="text-black mb-0"><?php echo $row['nombre_producto'] ?></h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                      </button>

                      <input id="form1" min="0" name="quantity" value="1" type="number"
                        class="form-control form-control-sm" />

                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <input class="btn btn-danger" value="eliminar" type="button" onClick="eliminar('<?php echo $row['id']?>')"/>
                  </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0">Salario: $<?php echo $row['precio']; $precio = $row['precio']; $subTotal += $precio* $row['cantidad']; $total += $subTotal?></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                  </div>
                <?php } ?>
                  <hr class="my-4">

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="index.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Regresar al inicio</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Resumen</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Elementos: </h5>
                    <h5><?php echo $subTotal ?></h5>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Sueldo: </h5>
                    <h5><?php echo $subTotal ?></h>
                  </div>

                  <button type="button" class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark" onClick="guardar()">Comprar</button>
                    <!-- Aqui debemos de hacer que con un ajax se cambie el status a pedido cerrado -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
     
     <?php require_once 'footer.php' ?>