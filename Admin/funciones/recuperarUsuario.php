<?php
require "conecta.php";
$con = conecta();

function recuperarUsuario( $id ) {
    global $con;

    // limitamos la busqueda a solo el campo id porque podemos obviar
    // que nuestro usuario esta activo y no elimando
    $query = "SELECT * FROM administradores WHERE id=$id";        
    $res = $con->query( $query );
    $row = $res->fetch_array();

    return $row;
}

?>