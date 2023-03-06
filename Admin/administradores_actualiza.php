<?php
require "funciones/conecta.php";
$con = conecta();

// variables
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$correo = $_REQUEST['correo'];
$rol = $_REQUEST['rol'];

//actualizacion de datos
$query = "UPDATE administradores SET nombre='$nombre', apellidos='$apellidos', correo='$correo', rol=$rol";

//Si tenemos foto por cargar
if ( $_FILES['archivo']['name'] != "" ) {
    // almacenamos el nombre del archivo original y el tambien el encriptado
    $archivo_n = $_FILES['archivo']['name'];
    $archivo = $_FILES['archivo']['tmp_name'];

    //extension del archivo
    $cadena = explode(".", $archivo_n);
    $ext = $cadena[1];     
    //ruta donde se guardara                     
    $dir = "../imagenes/";                         
    $archivo_enc = md5_file($archivo);//encriptamos el archivo
    $archivo_n1 = "$archivo_enc.$ext";
    move_uploaded_file($archivo, $dir.$archivo_n1);

    // si SI tenemos archivo le concatenamos la foto a la sentencia query
    $query = $query.", archivo_n='$archivo_n', archivo='$archivo_n1'";
}

// si el usuario introdujo contrasenia
if ( $_REQUEST['pass'] != "" ){
    $passEnc = md5( $_REQUEST['pass'] );// encriptamos
    $query = $query.", pass='$passEnc'";//concatenamos al query
}

// limitamos la query en caso de no querer cambiar la contrasenia
$query = $query." WHERE id = $id";
$res = $con->query($query);
// // redireccion
header("Location: administradores_lista.php");
?>