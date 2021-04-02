<?php

//liberias para generar el PDF y QR
require_once('./public/lib/fpdf/fpdf.php');
require_once("./public/lib/phpqrcode/qrlib.php");

//VARIABLES OBTENIDAS
$dni = $_GET['code'];
$anio = $_GET['anio'];
$control_asistente = isset($_GET['ctrl_asistente'])? false:true; //Si existe, permitimos buscar solo como asistente u organizador.

//filtrar y limpiar los datos para ataques de inyeccion sql

//VARIABLES GLOBALES
$nombre = "";
$nivel = "";
$tipo_persona = "";

//Imagen QR
//QRcode::png($dni, "test.png"); // Esto parece innecesario. asi que se puede comentar para que eventualmente se elimine. 

//Instancia objeto controlador. Para resolver metodos necesarios para desarrollar la automatización de los certificados.
$objPDF = new webSutepController();

$nombre = txt_certi($nombre);

$eval_certi = true; //Controla si el registro existe en la base de datos. 

$res_ponente = $objPDF->obtenerPonente_Controller($dni,$anio); // Se filtran los datos en la tabla ponente. 

//Es ponente? En el caso de que exista 
if($res_ponente['eval'] && $control_asistente){
    $ponente = $res_ponente['data'];

    $nombre = txt_certi($ponente['nombre']) . ' ' . txt_certi($ponente['apellido']);
    // $nivel = txt_certi($ponente['especialidad']);
    $nivel = txt_certi('especialista');
    $tipo_persona = txt_certi('ponente');
    $fondo_certi = $objPDF->obtenerRutaCertificado_Controller($ponente['evento_idevento'], 3); //"2021/cert3.jpg". El 3 significa que es de tipo persona ponente (id de tabla).
}else{
    //es asistente?
    $res_usuario = $objPDF->obtenerDocente_Controller($dni, $anio);
    if($res_usuario['eval']){
        $usuario = $res_usuario['data'];

        $nombre = txt_certi($usuario['nombre']) . ' ' . txt_certi($usuario['apellido']);
        $nivel = txt_certi($usuario['especialidad']);
        $tipo_persona = txt_certi($usuario['tipo_persona']);
        $fondo_certi = $objPDF->obtenerRutaCertificado_Controller($usuario['evento_idevento'], $usuario['idtipo_persona']); //"2021/cert#.jpg"
    }else{
        //El registro no existe en la base de datos
        $eval_certi = false;
    }
}

if($eval_certi){
    
    // var_dump($res_ponente);
    // echo "<br>";
    // echo "<br>";
    // var_dump($res_usuario);

    //INICIANDO CON LA HOJA EN BLANCO
    $pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();

    // IMAGEN FONDO DEL CERTIFICADO
    $pdf->Image("./public/images_certi/{$fondo_certi}", 0, 0, 300, 211);

    // CODE QR DEL DNI EN ELCERTIFICADO
    // $pdf->Image("test.png", 28, 17, 35, 35,"png");
    // $pdf->Image("http://localhost/sutea2021-covid/?pg=certificado/test-qr&code=$dni", 28, 17, 35, 35,"png");
    $pdf->Image("https://cersutea.com/cersutea/?pg=certificado/test-qr&code=$dni", 28, 17, 35, 35, "png");

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

    // LINK DE REFERENCIA DEL CERTIFICADO
    $pdf->SetFont('Times','B',8);
    $pdf->Text(10, 206, "Verificar certificado digital en ");
    $pdf->SetTextColor(0,0,255);
    $pdf->SetFont('','U');
    $pdf->Text(48, 206, "https://cersutea.com/cersutea/?pg=certification");


    $pdf->Output();


}else{
    // En el caso de que no exista el registro en la base de datos.Hacer lo siguiente.
    echo "NO TIENE CERTIFICADO!! Comuniquese con el administrador para verificar el estado de su inscripción.";
}




//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------

/**
 * FUNCION PARA CORREGIR TILDE Y PONER EN MAYUSCULA EL TEXTO QUE SE ENVIÉ POR PARAMETRO.
 */
function txt_certi($txt){
    return utf8_decode(strtoupper($txt));
}


?>