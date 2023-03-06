<?php
require_once "conecta.php";

function getIdPedido(){
     $con = conecta();
     $res = $con->query( "SELECT * FROM pedidos WHERE status = 0" );
     $row = $res->fetch_array();

     if ( empty( $row ) ) {
          $con->query ( "INSERT INTO pedidos ( status ) VALUES (0)" );
          $res = $con->query( "SELECT * FROM pedidos WHERE status = 0" );
          $row = $res->fetch_array();
     }

     $id_pedido = $row['id'];
     return $id_pedido;
}
?>