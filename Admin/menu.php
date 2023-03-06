<?php
//indicamos que queremos iniciar una session
session_start();
//si no tenemos la variable nombre NO tenemos sesion activa
if ( empty( $_SESSION['nombre'] ) ) {
    header( 'location: index.php' );
}
$nombre = $_SESSION['nombre'];
?>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- jQuery Only -->
<script src="js/jquery-3.3.1.min.js"></script>   

<!-- HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="bienvenido.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="administradores_lista.php">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="productos_lista.php">Vacantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="banners_lista.php">Banners</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pedidos_lista.php">Pedidos</a>
        </li>
        <li>
        <a class="nav-link active" aria-current="page">Bienvenido <?php echo $nombre ?></a>
        </li>
    </ul>
    <span class="navbar-text">
        <a class="btn btn-md btn-danger nav-text" aria-current="page" href="salir.php">Cerrar sesion</a>
    </span>
    </div>
  </div>
</nav>
