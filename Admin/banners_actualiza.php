<?php
// administradores_salva.php
require "funciones/conecta.php";
$con = conecta();

//Recibe variables
$nombre = $_POST['nombre'];
$id = $_POST['id'];

$query = "UPDATE banners SET nombre='$nombre'";

if ( $_FILES['archivo']['name'] != "" ) {
    $archivo_n =  $_FILES["archivo"]["name"];
    $archivo = $_FILES["archivo"]["tmp_name"];
    $cadena = explode(".", $archivo_n);            //Separa la cadena en base al parametro mandado
    $ext = $cadena[1];                                      //Extension
    $dir = "./banners/";                         //hacemos referencia a la ruta absoluta
    $archivo_enc = md5_file($archivo);             //Nombre del archivo temporal y lo encrypta
    $archivo_n1 = "$archivo_enc.$ext";
    move_uploaded_file($archivo, $dir.$archivo_n1);    // origen y destino

    $query = $query.",archivo_n='$archivo_n', archivo='$archivo_n1'";
}
$query = $query."WHERE id=$id";

$res = $con->query($query);
header("Location: banners_lista.php");
?>
