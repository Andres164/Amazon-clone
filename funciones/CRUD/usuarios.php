<?php
function CREATE_usuario($nombre_usuario, $correo_electronico, $contra) {
    require_once __DIR__ . '/../coneccion.php';
    require_once __DIR__ . '/carrito.php';
    $conn = conectar();

    CREATE_carrito($nombre_usuario);
    $sql = 'SELECT carrito_id FROM carrito WHERE nombre_usuario = "' . $nombre_usuario . '"';
    $carrito_id = mysqli_fetch_array(mysqli_query($conn, $sql))['carrito_id'];
    $sql = 'INSERT INTO usuarios VALUES (?, ?, ?, ?)';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'isss', $carrito_id, $nombre_usuario, $correo_electronico, $contra);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function READ_usuario($nombre_usuario) {
    require_once __DIR__ . '/../coneccion.php';
    $conn = conectar();
    $sql = 'SELECT * FROM usuarios WHERE nombre_usuario = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $nombre_usuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $result;
}

function UPDATE_usuario() {
    
}

function DELETE_usuario() {
    
}

?>