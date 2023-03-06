<?php
    require "funciones/conecta.php";
    $conn = conecta();

    $codigo_producto = $_POST["codigo_producto"];
    
    //Procederemos a hacer una consulta que buscara el correo del usuario
    $buscarCodigo = "SELECT * from productos WHERE codigo_producto='$codigo_producto'";
    
    if ( isset($_POST["id"]) ) {
      $id = $_POST["id"];
      $buscarCodigo = $buscarCodigo."AND id != $id";
   }

    //Realizamos la consulta y anadimos $conecta, ya que es la variable que creamos en nuestro archivo conecta.php
    $resultado = $conn->query($buscarCodigo);

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