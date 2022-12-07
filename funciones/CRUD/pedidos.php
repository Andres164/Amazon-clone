<?php
function CREATE_pedido($nombre_usuario, $articulo_ASIN) {
    require_once __DIR__ . '/../coneccion.php';
    require_once __DIR__ . '/articulos.php';
    $conn = conectar();

    $articulo = READ_articulos($articulo_ASIN);
    $tiempoDeEnvio = mysqli_fetch_array($articulo)['tiempo_envio'];
    $tiempoDeEnvio = explode(':', $tiempoDeEnvio);
    $fecha_entrega = new DateTime(date('Y-m-d h:i:s'));
    $fecha_entrega->add(new DateInterval('PT' . $tiempoDeEnvio[0] . 'H'));
    $fecha_entrega = $fecha_entrega->format('Y-m-d h:i:s');

    $sql = 'INSERT INTO pedidos(nombre_usuario, articulo_ASIN, fecha_entrega) VALUES (?, ?, ?)';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $nombre_usuario, $articulo_ASIN, $fecha_entrega);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
function READ_pedidos($nombre_usuario) {
    require_once __DIR__ . '/../coneccion.php';
    $conn = conectar();
    $sql = 'SELECT * FROM pedidos WHERE nombre_usuario = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $nombre_usuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $result;
}
function READ_pedido($pedido_id) {
    require_once __DIR__ . '/../coneccion.php';
    $conn = conectar();
    $sql = 'SELECT * FROM pedidos WHERE pedido_id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $pedido_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $result;
}
function UPDATE_pedidosNoEntregados() {
    require_once __DIR__ . '/../coneccion.php';
    $conn = conectar();
    $sql = 
   'UPDATE pedidos 
    SET entregado = 1
    WHERE entregado = 0 && fecha_entrega <= NOW()';
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

?>