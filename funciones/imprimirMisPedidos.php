<?php
require_once __DIR__ . '/CRUD/pedidos.php';
$pedidos = READ_pedidos($_SESSION['logInUsuario']);

while($pedido = mysqli_fetch_array($pedidos)) {
    $articulo_ASIN = $pedido['articulo_ASIN'];
    require_once __DIR__ . '/CRUD/articulos.php';
    $articulo = mysqli_fetch_array( READ_articulos($articulo_ASIN) );
    $fecha_compra = new DateTime($pedido['fecha_compra']);
    $fecha_compra = $fecha_compra->format('d-M-Y');
    $fecha_entrega = new DateTime($pedido['fecha_entrega']);
    $fecha_entrega = $fecha_entrega->format('d-M-Y');
    $fueResivido = $pedido['entregado'] ? 'Este pedido ya fue entregado' : 'Pedido en camino';
    echo "
    <div class='rounded container shadow'>
        <div class='encabezadoPedido row justify-content'>
            <div class='col-4'>
                fecha de compra:
                <h5>" . $fecha_compra . "</h5>
            </div>
            <div class='col-6'>
                fecha de entrega:
                <h5>" . $fecha_entrega . "</h5>
            </div>
            <div class='col-2'>
                <form action='funciones/generarRecivo.php' method='POST'> <input name='". $pedido['pedido_id'] ."' type='submit' class='btn btn-secondary btn-sm' value='Generar recivo' recivo> </form>
            </div>
        </div>
        <div class=''>
            <h3>" . $articulo['nombre_articulo'] . "</h3>
            <b>" . $fueResivido . "</b>
        </div>
    </div>
    ";
}

?>