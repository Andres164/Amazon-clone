<?php
function CREATE_carrito($nombre_usuario) {
    require_once __DIR__ . '/../coneccion.php';
    $conn = conectar();
    $sql = 'INSERT INTO carrito (nombre_usuario) VALUES (?)';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $nombre_usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function READ_carrito($nombre_usuario) {
    require_once __DIR__ . '/../coneccion.php';
    $conn = conectar();
    $sql = 'SELECT * FROM carrito WHERE nombre_usuario = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $nombre_usuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $result;
}

function UPDATE_carrito() {
    
}

function DELETE_carrito() {
    
}

?>