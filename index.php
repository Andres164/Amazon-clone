<?php
     session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<Link rel="stylesheet" type="text/css" href="estilo.css">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <style>
      img {
        width: 100%;
        height: 100%;
      }
      .row {
          margin-top: 2%;
          margin-bottom: 2%;
      }
      .col-4 {
          margin-left: 1%;
          margin-right: 1%;
      }
     </style>
</head>
<body style="background-color:lightskyblue;">
     <h1>BIENVENIDO A AMAZON</h1>
     <nav>
          <ul>
               <li><a href="index.php">Inicio</a></li>
               <li><a href="Articulos.php">Articulos</a></li>
               <li><a href="Pedidos.php">Mis pedidos</a></li>
               <li><a href="carrito.php">Carrito</a></li>
               <li><a href="servicioalcliente.html">Servicio al Cliente</a></li>
             <?php 
               if(!empty($_SESSION['logInUsuario'])) {
                    $textoBtnSession = 'Cerrar Sesion';
               } else {
                    $textoBtnSession = 'Iniciar Sesion';
               }
               echo '<li><a href="iniciosesion.php">' . $textoBtnSession . '</a></li>' ?>
          </ul>
     </nav>

     <div class="row justify-content-center">
          <div class="col-4">
               <img src="img/front_page/amazon-prime.jpg" alt="">
          </div>
          <div class="col-4">
               <img src="img/front_page/amazon-prime-music.jpg" alt="">
          </div>
     </div>
     <div class="row justify-content-center">
          <div class="col-4">
               <img src="img/front_page/Amazon-Prime-Video.jpg" alt="">
          </div>
          <div class="col-4">
               <img src="img/front_page/amazon-cajas.jpg" alt="">
          </div>
     </div>
     
</body>	
</html>
