<?php
require "../Admin/funciones/conecta.php";
require "../Admin/funciones/getIdPedido.php";
$con = conecta();

$id_pedido = getIdPedido();


$sql = "UPDATE pedidos SET status = 1 WHERE id = $id_pedido";
$res = $con->query($sql);

header("Location: index.php");
?>