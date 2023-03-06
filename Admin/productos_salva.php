<?php
// administradores_salva.php
require "funciones/conecta.php";
$con = conecta();

//Recibe variables
$nombre_producto = $_REQUEST['nombre_producto'];
$codigo_producto = $_REQUEST['codigo_producto'];
$descripcion = $_REQUEST['descripcion'];
$costo = $_REQUEST['costo'];
$stock = $_REQUEST['stock'];


$archivo_n_producto =  $_FILES["archivo_producto"]["name"];
$archivo_producto = $_FILES["archivo_producto"]["tmp_name"];
$cadena = explode(".", $archivo_n_producto);            //Separa la cadena en base al parametro mandado
$ext = $cadena[1];                                      //Extension
$dir = "../imagenes_productos/";                         //hacemos referencia a la ruta absoluta
$archivo_enc = md5_file($archivo_producto);             //Nombre del archivo temporal y lo encrypta
$archivo_n1 = "$archivo_enc.$ext";
move_uploaded_file($archivo_producto, $dir.$archivo_n1);    // origen y destino

$sql = "INSERT INTO productos
        (nombre_producto, codigo_producto, descripcion, costo, stock, archivo_n_productos, archivo_productos)
        VALUES('$nombre_producto', '$codigo_producto', '$descripcion', $costo, $stock, '$archivo_n_producto', '$archivo_n1')";

$res = $con->query($sql);
header("Location: productos_lista.php");
?>
