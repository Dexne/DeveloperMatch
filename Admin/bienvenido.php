<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>
    
</head>
<body>
    <header> <?php require_once('menu.php'); ?> </header>
    <div class="container text-center">
        <h2 class="my-4">Bienvenido <?php echo $_SESSION['nombre'];?></h2>
        <h3>Vamos a administrar nuestro sitio</h3>
        <h4 class="mt-4"> ;) </h4>
        <br>
        <br>
        <br>
        <h3>Poner el logo y tratar de recrear el home</h3>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <footer> <?php require_once('footer.php'); ?></footer>
</body>
</html>