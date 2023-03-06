<?php
// Ubicacion del archivo
// ./funciones/conecta.php
//database data
define("HOST","localhost:3306");
define("BD",'cliente01');
define("USER_BD",'root');
define("PASS_BD",'');

function conecta(){
    $con = new mysqli(HOST, USER_BD, PASS_BD, BD);
    return $con;
}
?>