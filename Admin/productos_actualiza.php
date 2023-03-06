<?php
// administradores_salva.php
require "funciones/conecta.php";
$con = conecta();

//Recibe variables
$id = $_POST['id'];
$nombre_producto = $_POST['nombre_producto'];
$codigo_producto = $_POST['codigo_producto'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];
$stock = $_POST['stock'];

$query2 = '';

$query = "UPDATE productos SET nombre_producto='$nombre_producto', codigo_producto='$codigo_producto', descripcion='$descripcion', costo=$costo, stock=$stock WHERE id=$id";

if ( $_FILES['archivo_producto']['name'] != "" ) {
    $archivo_n_producto =  $_FILES["archivo_producto"]["name"];
    $archivo_producto = $_FILES["archivo_producto"]["tmp_name"];
    $cadena = explode(".", $archivo_n_producto);             //Separa la cadena en base al parametro mandado
    $ext = $cadena[1];                                       //Extension
    $dir = "../imagenes_productos/";                         //hacemos referencia a la ruta absoluta
    $archivo_enc = md5_file($archivo_producto);              //Nombre del archivo temporal y lo encrypta
    $archivo_n1 = "$archivo_enc.$ext";
    move_uploaded_file($archivo_producto, $dir.$archivo_n1); // origen y destino

    $query2 = ",archivo_n_productos='$archivo_n_producto', archivo_productos='$archivo_n1'";
}
$query = "UPDATE productos SET nombre_producto='$nombre_producto', codigo_producto='$codigo_producto', descripcion='$descripcion', costo=$costo, stock=$stock $query2 WHERE id=$id";
echo $query;
$res = $con->query($query);
header("Location: productos_lista.php");
?>
