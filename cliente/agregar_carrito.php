<?php
require "../Admin/funciones/conecta.php";
require "../Admin/funciones/getIdPedido.php";
$con = conecta();
$id_p = $_REQUEST['id'];
$sql = "SELECT * FROM productos WHERE id=$id_p";
$res = $con->query($sql);

while($row = $res->fetch_array() ){
     $precio = $row['costo'];
}

//Recibe variables
$id_pedido = getIdPedido();
//$id_producto = $_REQUEST['id_producto'];
//$cantidad = $_REQUEST['cantidad'];


$sql = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) VALUES($id_pedido,$id_p,1,$precio)";

$res = $con->query( $sql );
//redireccionar
header("Location: index.php");
?>