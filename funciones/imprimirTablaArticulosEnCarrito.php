<?php
require_once __DIR__ . '/CRUD/detallesCarrito.php';
$detallesCarrito = READ_detallesCarrito($_SESSION['logInUsuario']);
$totalArticulos = 0;

while($detalleCarrito = mysqli_fetch_array($detallesCarrito)) {
    $articulo_ASIN = $detalleCarrito['articulo_ASIN'];
    require_once __DIR__ . '/CRUD/articulos.php';
    $articulo = mysqli_fetch_array( READ_articulos($articulo_ASIN) );
    echo "
    <tr>
         <td>
              <input name='" . $articulo_ASIN . "' type='submit' class='btn btn-sm btn-secondary' value='X'>
              " . $articulo['nombre_articulo'] . " <br>
         </td>
         <td>
            $" . $articulo['precio'] . "
         </td>
    </tr>
    ";
    $totalArticulos += $articulo['precio'];
}
if($totalArticulos > 0) {
    echo "
    <tr>
        <th scope='row'>
         Total
        </th>
        <td>
            $" . $totalArticulos . "
        </td>
    </tr>
    ";  
}
?>