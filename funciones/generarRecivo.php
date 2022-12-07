<?php
require '../fpdf/fpdf.php';
require '../funciones/CRUD/pedidos.php';
require '../funciones/CRUD/articulos.php';

session_start();
$pedido_id = key($_POST);
$pedido = mysqli_fetch_array( READ_pedido($pedido_id) );
$articulo = mysqli_fetch_array( READ_articulos($pedido['articulo_ASIN']) );

$fecha_compra = $pedido['fecha_compra'];
$nombre_usuario = $_SESSION['logInUsuario'];
$precio = $articulo['precio'];
$IVA = $precio * 0.16;
$articulo_ASIN = $articulo['ASIN'];
$nobmre_articulo = $articulo['nombre_articulo'];

$pdf = new FPDF('L', 'mm', array(150, 280));
$pdf->AddPage();
$pdf->SetFont('Arial','B', 16);
$pdf->Cell(0, 0, 'Amazon.com', 0, 0, 'C');
$pdf->Ln(20);
$pdf->SetFont('Arial', '', 14);
$pdf->Cell(0, 0, $fecha_compra);
$pdf->Cell(0, 0, 'Pedido No. ' . $pedido_id, 0, 0, 'R');
$pdf->Ln(5);
$pdf->SetFont('Arial','B', 16);
$pdf->Cell(0, 30, '   '.$nombre_usuario, 'LRT');
$pdf->Image('../img/amazon-logo.png', 160, 19);
$pdf->SetFont('Arial', '', 13);
$pdf->Ln(30);
$pdf->Cell(0, 12, '   ', 'LR');
$pdf->Ln(12);
$pdf->Cell(0, 30, '    '. $articulo_ASIN . '  -  ' . $nobmre_articulo);
$pdf->Ln(0);
$pdf->Cell(0, 40, 'SubTotal: $' . $precio . '    ', 'LRB', 0, 'R');
$pdf->Ln(11);
$pdf->Cell(0, 30, 'IVA(16%): $' . $IVA . '    ', 0, 0, 'R');
$pdf->Cell(0, 33, '________________    ', 0, 0, 'R');
$pdf->Ln(8);
$pdf->Cell(0, 30, 'Total: $' . ($precio + $IVA) . '    ', 0, 0, 'R');
$pdf->Output();
?>