<?php
function conectar() {
    $conn = mysqli_connect('localhost', 'root', '', 'amazon_bd') or die('sucedio un error de coneccion con la base de datos');
    return $conn;
}
?>