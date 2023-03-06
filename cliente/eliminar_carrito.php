<?php
require "../Admin/funciones/conecta.php";
require "../Admin/funciones/getIdPedido.php";
$con = conecta();

$id_pedido = getIdPedido();
$id_p = $_REQUEST['id'];
echo $id_pedido;
echo $id_p;

$sql = "DELETE FROM pedidos_productos WHERE id_producto=$id_p AND id_pedido = $id_pedido";
$res = $con->query($sql);

header("Location: carrito.php");
?>