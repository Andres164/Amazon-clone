<?php
     session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<Link rel="stylesheet" type="text/css" href="estilo.css">
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
             <?php 
               if(!empty($_SESSION['logInUsuario'])) {
                    $textoBtnSession = 'Cerrar Sesion';
               } else {
                    $textoBtnSession = 'Iniciar Sesion';
               }
               echo '<li><a href="iniciosesion.php">' . $textoBtnSession . '</a></li>' ?>
          </ul>
     </nav>
     
</body>	
</html>
