<?php
     function CREATE_articulos() {
        /*
        require_once __DIR__ . '/../coneccion.php';
        $conn = conectar();
        $sql = 'INSERT INTO articulos VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $nombre_usuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        */
    }
    
    function READ_articulos($ASIN) {
        require_once __DIR__ . '/../coneccion.php';
        $conn = conectar();
        $sql = 'SELECT * FROM articulos WHERE ASIN = ?';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $ASIN);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $result;
    }
    
    function UPDATE_articulos() {
        
    }
    
    function DELETE_articulos() {
        
    }
?>