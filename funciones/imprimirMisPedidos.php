<?php
require_once __DIR__ . '/CRUD/pedidos.php';
$pedidos = READ_pedidos($_SESSION['logInUsuario']);

while($pedido = mysqli_fetch_array($pedidos)) {
    $articulo_ASIN = $pedido['articulo_ASIN'];
    require_once __DIR__ . '/CRUD/articulos.php';
    $articulo = mysqli_fetch_array( READ_articulos($articulo_ASIN) );
    $fecha_compra = new DateTime($pedido['fecha_compra']);
    $fecha_compra = $fecha_compra->format('d-M-Y');
    echo "
    <div class='rounded container shadow'>
        <div class='encabezadoPedido'>
            fecha de compra:
            <h5>" . $fecha_compra . "</h5>
        </div>
        <div class=''>
            <h3>" . $articulo['nombre_articulo'] . "</h3>
        </div>
    </div>
    ";
}

?>