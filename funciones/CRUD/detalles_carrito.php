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
?>