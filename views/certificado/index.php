<?php
require('fpdf/fpdf.php');
require_once("phpqrcode/qrlib.php");


//VARIABLES OBTENIDAS
$dni = $_GET['code'];
$anio = $_GET['anio'];

//VARIABLES GLOBALES
$nombre = 'kevin quispe lima';
$nombre = utf8_decode($nombre);
$nombre = strtoupper($nombre);

$tipo_certificado = 0;


//consulta si existe el usuario con el tipo y anio de evento

//Imagen QR
QRcode::png($dni, "test.png");


//INICIANDO CON LA HOJA EN BLANCO
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

// IMAGEN FONDO DEL CERTIFICADO
$pdf->Image('images/cert1.jpg',0,0,300,211);

// CODE QR DEL DNI EN ELCERTIFICADO
$pdf->Image("test.png", 20, 20, 30, 30,"png");
// $pdf->Image("http://localhost/sutea2021-covid/views/certificado/test-qr.php?code=$dni",20,20,30,30,"png");

//NOMBRE DEL USUARIO CERTIFICADO
$pdf->SetFont('Arial','B',16);
$pdf->SetY(73);
$pdf->Cell(63);
$pdf->Cell(160, 9, $nombre, 1, 1, 'C');

//NOMRE DE LA PERSONA CERTIFICADA.
// $pdf->Text(75, 80, "kevin quispe lima");

// LINK DE REFERENCIA DEL CERTIFICADO
$pdf->SetTextColor(0,0,255);
$pdf->SetFont('','U');
$pdf->Text(75, 205, "https://cersutea.com/cersutea/index.php?pg=certification");



$pdf->Output();

?>