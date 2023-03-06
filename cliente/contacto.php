<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Contacto</title>

     <link rel="stylesheet" href="style.css">
</head>
<body>
     <header> <?php require_once('header.php'); ?> </header>

     <div class="wrapper">
         <form method="post" action="contacto.php">
            <h2>Contactanos</h2><br>
            Destinatario: <br>
            <input type="text" name="email" placeholder="developermatchoficial@gmail.com"><br>
            Motivo: <br>
            <input type="text" name="subject"><br>
            Mensaje: <br>
            <textarea name="body" placeholder="Escribe aquí tu mensaje, nos pondremos en contacto lo mas pronto posible. Agradecemos tu preferencia"></textarea><br>
            <input type="submit" value="Enviar" name="submit">            
         </form>

         <?php
         if(isset($_POST['submit'])){
            $url = "https://script.google.com/macros/s/AKfycbyggRrXMNeB2zcE25XBpVtw57KMIyisLk2reoKphkfjzCrHME0r2W2SRIqOtzxSfaJnUQ/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $_POST['email'],
                  "subject"   => $_POST['subject'],
                  "body"      => $_POST['body']
               ])
            ]);
            $result = curl_exec($ch);
            echo $result;
         }
         ?>
      </div>
     
<?php require_once 'footer.php' ?>