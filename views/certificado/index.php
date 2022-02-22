<?php
require('fpdf/fpdf.php');
require_once("phpqrcode/qrlib.php");

//VARIABLES OBTENIDAS
$dni = $_GET['code'];
$anio = $_GET['anio'];

//VARIABLES GLOBALES
$nombre = 'ING. LENYN ELÍ FLORES BALANDRA $msj_test';
$nombre = utf8_decode($nombre);
$nombre = strtoupper($nombre);

$nivel = "ingeniero"; $nivel = strtoupper(utf8_decode($nivel));
$tipo_persona = "ponente"; $tipo_persona = strtoupper(utf8_decode($tipo_persona));

$tipo_certificado = 0;


//consulta si existe el usuario con el tipo y anio de evento

//Imagen QR
QRcode::png($dni, "test.png");


//INICIANDO CON LA HOJA EN BLANCO
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

// IMAGEN FONDO DEL CERTIFICADO
$pdf->Image('images/2021/cert1.jpg',0,0,300,211);

// CODE QR DEL DNI EN ELCERTIFICADO
$pdf->Image("test.png", 28, 17, 35, 35,"png");
// $pdf->Image("http://localhost/sutea2021-covid/views/certificado/test-qr.php?code=$dni",20,20,30,30,"png");

//NOMBRE DEL USUARIO CERTIFICADO
$pdf->SetFont('Arial','B',16);
$pdf->SetY(80);
$pdf->Cell(63);
$pdf->Cell(160, 9, $nombre, 0, 1, 'C');

//NIVEL DEL USUARIO CERTIFICADO
$pdf->SetFont('Arial','B',14);
$pdf->SetY(94);
$pdf->Cell(84);
$pdf->Cell(51, 7, $nivel, 0, 1, 'C');

//TIPO DEL USUARIO CERTIFICADO
$pdf->SetFont('Arial','B',14);
$pdf->SetY(94);
$pdf->Cell(220);
$pdf->Cell(51, 7, $tipo_persona, 0, 1, 'C');

//NOMRE DE LA PERSONA CERTIFICADA.
// $pdf->Text(75, 80, "kevin quispe lima");

// LINK DE REFERENCIA DEL CERTIFICADO
$pdf->SetFont('Times','B',8);
$pdf->Text(10, 206, "Verificar certificado digital en ");
$pdf->SetTextColor(0,0,255);
$pdf->SetFont('','U');
$pdf->Text(48, 206, "https://cersutea.com/cersutea/?pg=certification");



$pdf->Output();

?>