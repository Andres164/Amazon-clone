<?php
     session_start();
     require_once 'funciones/CRUD/articulos.php'
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
	<tittle></tittle>
	<Link rel="stylesheet" type="text/css" href="estilo.css">

     <script>
          function agregarAlCarrito(ASIN) {
               var data = new FormData();
               data.append("articulo_ASIN", ASIN);

               var xhr = new XMLHttpRequest();
               xhr.open("POST", "funciones/agregarArticuloCarrito.php");
               xhr.send(data);
               alert("Articulo añadido al carrito");
               return false;
          }
     </script>
</head>
<body style="background-color:lightskyblue;">
     <h1>BIENVENIDO A AMAZON</h1>
     <nav>
          <ul>
             <li><a href="index.html">Inicio</a></li>
             <li><a href="Articulos.html">Articulos</a></li>
             <li><a href="Proveedores.html">Proveedores</a></li>
             <li><a href="carrito.html">Carrito</a></li>
              <li><a href="servicioalcliente.html">Servicio al Cliente</a></li>
             <li><a href="iniciosesion.html">Cerrar Sesion</a></li>
          </ul>
     </nav>
          
     <h4>TENDENCIA DEL MERCADO</h4>     
     <form>
     <div class="productos">
          <div class="contenedores">
           <h3>Tarjeta Grafica 2080</h3>
           <img src="img/grafica.jpg"/>
           <h3>$6,317</h3>
           <h3><p style="color:green;">Envio Gratis</p>Llega Mañana lunes</h3><br>
           <input class="button-add" type="submit" value="Comprar"><br>
           <input type="button" value="Agregar" onclick="agregarAlCarrito('amazonnv2080')"><br>
           <br>
           </div>    

           <div class="contenedores">
           <h3>Playera Color Gris</h3>
           <img src="img/playera.jpg"/>
           <h3>$230</h3>
           <h3><p style="color:green;">Costo de envio $115</p>Llega dia miercoles</h3><br>
           <input class="button-add" type="submit" value="Comprar"><br>
           <input type="button" value="Agregar" onclick="agregarAlCarrito('amazonplcogr')"><br>
           <br>
           </div>

           <div class="contenedores">
           <h3>Nintendo Switch</h3>
           <img src="img/switch.jpg"/>
           <h3>$2,000</h3>
           <h3><p style="color:green;">Costo de envio $130</p>LLega mañana</h3><br>
           <input class="button-add" type="submit" value="Comprar"><br>
           <input type="button" value="Agregar" onclick="agregarAlCarrito('amazonnintsw')"><br>
           <br>
           </div> 

           <div class="contenedores">
           <h3>Figura Goku ssj3</h3>
           <img src="img/goku.jpg"/>
           <h3>$620</h3>
          <h3><p style="color:green;">Envio Gratis</p>Llega pasado mañana</h3><br>
          <input class="button-add" type="submit" value="Comprar"><br>
          <input type="button" value="Agregar" onclick="agregarAlCarrito('amazongokuss')"><br>
           <br>
           </div> 

           <div class="contenedores">
           <h3>Xbox Series X </h3>
           <img src="img/xbox.jpg"/>
           <h3>$5,700</h3>
          <h3><p style="color:green;">Costo de envio $200</p>Llega dia martes</h3><br>
          <input class="button-add" type="submit" value="Comprar"><br>
          <input type="button" value="Agregar" onclick="agregarAlCarrito('amazonnv2080')"><br>
           <br>
           </div> 

           <div class="contenedores">
           <h3>Taquetes Adidas X 19.3</h3>
           <img src="img/taquetes.jpg"/>
           <h3>$2,100</h3>
           <h3><p style="color:green;">Envio Gratis</p>Llega dia martes</h3><br>
           <input class="button-add" type="submit" value="Comprar"><br>
           <input type="button" value="Agregar" onclick="agregarAlCarrito('amazonnv2080')"><br>
           <br>
           </div> 

           <div class="contenedores">
           <h3>Gabinete Gamer RGB</h3>
           <img src="img/gabinete.jpg"/>
           <h3>$900</h3>
           <h3><p style="color:green;">Costo de envio $129</p>Llega mañana</h3><br>
           <input class="button-add" type="submit" value="Comprar"><br>
           <input type="button" value="Agregar" onclick="agregarAlCarrito('amazonnv2080')"><br>
           <br>
           </div> 

           <div class="contenedores">
           <h3>Peluche de pochita</h3>
           <img src="img/peluche.jpg"/>
           <h3>$230</h3>
          <h3><p style="color:green;">Costo de envio $115</p>Llega dia lunes</h3><br>
          <input class="button-add" type="submit" value="Comprar"><br>
          <input type="button" value="Agregar" onclick="agregarAlCarrito('amazonnv2080')"><br>
           <br>
           </div> 

           <div class="contenedores">
           <h3>Teclado Gamer Mecanico RGB</h3>
           <img src="img/teclado.jpg"/>
           <h3>$1,300</h3>
           <h3><p style="color:green;">Envio Gratis</p>Llega dia Domingo</h3><br>
           <input class="button-add" type="submit" value="Comprar"><br>
           <input type="button" value="Agregar" onclick="agregarAlCarrito('amazonnv2080')"><br>
           <br>
           </div> 
     </div>
     </form>

</body>   
</html>     