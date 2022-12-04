<?php
     session_start();
     if(!empty($_POST)) {
          require 'funciones/CRUD/detallesCarrito.php';
          $articulo_ASIN = array_keys($_POST);
          DELETE_productoCarrito($_SESSION['logInUsuario'], $articulo_ASIN[0]);
     }
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
               padding: 2%;
          }
          .table {
               background-color: white;
          }
     </style>
</head>
<body style="background-color:lightskyblue;">
     <h1>BIENVENIDO A AMAZON</h1>
     <nav>
          <ul>
             <li><a href="index.php">Inicio</a></li>
             <li><a href="Articulos.php">Articulos</a></li>
             <li><a href="Proveedores.html">Proveedores</a></li>
             <li><a href="carrito.php">Carrito</a></li>
              <li><a href="servicioalcliente.html">Servicio al Cliente</a></li>
             <li><a href="iniciosesion.html">Cerrar Sesion</a></li>
          </ul>
     </nav>
     
     <h2>Carrito</h2>
     <div class="container shadow">
          <form method="POST">
               <table class="table table-bordered">
                    <tbody>
                         <?php
                         require 'funciones/imprimirTablaArticulosEnCarrito.php';
                         ?>
                    </tbody>
               </table> 
          </form>
          <form action="formPago.php">
          <input type="submit" class="btn btn-primary" value="Proceder con el pago">
          </form>
     </div>
</body>   
</html>     