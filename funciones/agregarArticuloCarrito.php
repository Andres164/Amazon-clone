<?php
    session_start();
    require 'CRUD/detallesCarrito.php';
    require 'CRUD/carrito.php';
    $carrito_id = READ_carrito($_SESSION['logInUsuario']);
    $carrito_id = mysqli_fetch_array($carrito_id)['carrito_id'];
    CREATE_detallesCarrito($carrito_id, $_POST['articulo_ASIN']);
?>