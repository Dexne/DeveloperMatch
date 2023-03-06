<?php
    require "funciones/conecta.php";
    $conn = conecta();

    $archivo = $_POST["archivo"];

    //Procederemos a hacer una consulta que buscara el correo del usuario
    $buscarArchivo = "SELECT * from banners WHERE archivo='$archivo'";

    //Realizamos la consulta y anadimos $conecta, ya que es la variable que creamos en nuestro archivo conecta.php
    $resultado = $conn->query($buscarArchivo);

    //Usaremos la funcion mysqli_num_rows en la consulta $resultado,
    //esta funcion nos regresa el numero de filas en el resultado
    $contador = mysqli_num_rows($resultado);

    //SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
    if($contador == 0) {
       echo 0;
    } else {
       echo 1;
    }
?>