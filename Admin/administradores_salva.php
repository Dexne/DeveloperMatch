<?php
// administradores_salva.php
require "funciones/conecta.php";
$con = conecta();

//Recibe variables
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$correo = $_REQUEST['correo'];
$pass = $_REQUEST['pass'];
$rol = $_REQUEST['rol'];


$archivo_n =  $_FILES["archivo"]["name"];
$archivo = $_FILES["archivo"]["tmp_name"];
$cadena = explode(".", $archivo_n);          //Separa la cadena en base al parametro mandado
$ext = $cadena[1];                           //Extension
$dir = "imagenes/";                          //hacemos referencia a la ruta absoluta
$archivo_enc = md5_file($archivo);           //Nombre del archivo temporal y lo encrypta

// encriptar la password
$passEnc = md5($pass); 

if( $archivo_n != '' ){
    $archivo_n1 = "$archivo_enc.$ext";
    move_uploaded_file($archivo, $dir.$archivo_n1);    // origen y destino
}
// sentencias SQL para afectar la BD
$sql = "INSERT INTO administradores
        (nombre, apellidos, correo, pass, rol, archivo_n, archivo)
        VALUES('$nombre', '$apellidos', '$correo', '$passEnc', $rol, '$archivo_n', '$archivo_n1')";
$res = $con->query($sql);

// rediccionamiento
header("Location: administradores_lista.php");
?>