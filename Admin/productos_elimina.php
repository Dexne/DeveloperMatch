<?php
require "funciones/conecta.php";
$con = conecta();
//recibe variables
$id = $_REQUEST['id'];
// actualizacion
$sql = "UPDATE productos SET eliminado_producto = 1 WHERE id = $id";
$res = $con->query($sql);

return 1;
?>