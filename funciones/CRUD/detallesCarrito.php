<?php
function CREATE_detallesCarrito($carrito_id, $articulo_ASIN) {
    require_once __DIR__ . '/../coneccion.php';
    $conn = conectar();
    $sql = 'INSERT INTO detalles_carrito (carrito_id, articulo_ASIN) VALUES (?, ?)';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'is', $carrito_id, $articulo_ASIN);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
function READ_detallesCarrito($nombre_usuario) {
    require_once __DIR__ . '/../coneccion.php';
    require_once __DIR__ . '/usuarios.php';
    $conn = conectar();

    $usuario = READ_usuario($nombre_usuario);
    $carrito_id = mysqli_fetch_array($usuario)['carrito_id'];

    $sql = 'SELECT * FROM detalles_carrito WHERE carrito_id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $carrito_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $result;
}
function DELETE_productoCarrito($nombre_usuario, $articulo_ASIN) {
    require_once __DIR__ . '/../coneccion.php';
    require_once __DIR__ . '/usuarios.php';
    $conn = conectar();

    $usuario = READ_usuario($nombre_usuario);
    $carrito_id = mysqli_fetch_array($usuario)['carrito_id'];

    $sql = 'DELETE FROM detalles_carrito WHERE carrito_id = ? AND articulo_ASIN = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'is', $carrito_id, $articulo_ASIN);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>