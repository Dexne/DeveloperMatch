<?php
require "funciones/conecta.php";
$con = conecta();

//Recibe variables
$nombre = $_REQUEST['nombre'];

$archivo_n =  $_FILES["archivo"]["name"];
$archivo = $_FILES["archivo"]["tmp_name"];
$cadena = explode(".", $archivo_n);                //Separa la cadena en base al parametro mandado
$ext = $cadena[1];                                 //Extension
$dir = "./banners/";                               //hacemos referencia a la ruta absoluta
$archivo_enc = md5_file($archivo);                 //Nombre del archivo temporal y lo encrypta
$archivo_n1 = "$archivo_enc.$ext";
move_uploaded_file($archivo, $dir.$archivo_n1);   // origen y destino

$sql = "INSERT INTO banners
        (nombre, archivo_n, archivo)
        VALUES('$nombre', '$archivo_n', '$archivo_n1')";

$res = $con->query($sql);
header("Location: banners_lista.php");
?>
