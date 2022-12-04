<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body class="bg-light">
  <h1>BIENVENIDO A AMAZON</h1>
     <nav>
          <ul>
             <li><a href="index.php">Inicio</a></li>
             <li><a href="Articulos.php">Articulos</a></li>
             <li><a href="Proveedores.html">Proveedores</a></li>
             <li><a href="carrito.php">Carrito</a></li>
              <li><a href="servicioalcliente.html">Servicio al Cliente</a></li>
             <li><a href="iniciosesion.php">Cerrar Sesion</a></li>
          </ul>
     </nav>  
<div class="container">
  <main>
    <div style="margin-top: 1%;" class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Mi carrito</span>
          <span class="badge bg-primary rounded-pill"> 1 </span>
        </h4>
        <ul class="list-group mb-3">
          <form method="POST">
            <?php
              session_start();
              if(!empty($_POST)) {
                require 'funciones/CRUD/detallesCarrito.php';
                $articulo_ASIN = array_keys($_POST);
                DELETE_productoCarrito($_SESSION['logInUsuario'], $articulo_ASIN[0]);
              }
              require 'funciones/imprimirTablaArticulosEnCarrito.php';
            ?>
          </form>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Domicilio de envio</h4>
        <form method="POST" class="needs-validation" action="realizarPedido.php">
          <div class="row g-3">
            <div class="col-12">
              <label for="address" class="form-label">Direccion</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Calle" required>
              <div class="invalid-feedback">
                Ingresa tu direccion de envio.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Estado</label>
              <select class="form-select" id="state" required>
                <option value="">Estados</option>
                <option>Sinaloa</option>
              </select>
              <div class="invalid-feedback">
                Ingresa el estado al que se envia el pedido.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Codigo postal</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Ingresa el codigo postal.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Pago</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Tarjeta de credito</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Tarjeta de debito</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Nombre en la tarjeta</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Nombre completo como esta escrito en la tarjeta</small>
              <div class="invalid-feedback">
                El nombre en la tarjeta es requerido
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Numero de tarjeta de credito</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Numero de tarjeta de credito requerido
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiracion</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Ingresa la fecha de expiracion
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Codigo de seguridad requerido
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continuar con el pago</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
  </footer>
</div>


    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


      <script src="form-validation.js"></script>
  </body>
</html>
