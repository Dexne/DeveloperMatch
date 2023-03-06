<?php
session_start();
session_destroy();//indicamos la session debe ser destruida
header("location: index.php");//redireccion a nuestro inicio de sesion
?>