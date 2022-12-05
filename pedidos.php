<?php
     session_start();
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
	<tittle></tittle>
	<Link rel="stylesheet" type="text/css" href="estilo.css">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <style>
          .container {
               background-color: #b6e1fc;
               margin-bottom: 3%;
               padding-bottom: 4%;
          }
          .encabezadoPedido {
               background-color: #6cc3f9;
               padding-left: 1%;
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
             <li><a href="iniciosesion.php">Cerrar Sesion</a></li>
          </ul>
     </nav>
     
     <h2>Mis pedidos</h2>
     <?php
          require 'funciones/imprimirMisPedidos.php';
     ?>
</body>   
</html>     