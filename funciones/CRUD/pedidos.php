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

?>