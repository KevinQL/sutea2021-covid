<?php

$file = $_FILES['img_test'];
$data = $_REQUEST;

//var_dump($data);

//echo "<br>";
//var_dump($file);

//die;

$data_res = json_decode( json_encode($_FILES));

// $nombre = $file["name"];
// $dir_img_slider = './../public/img_vouchers/test' . $nombre;

// $resultado = move_uploaded_file($file['tmp_name'], $dir_img_slider); //se guarda el modelo json


//------------------------aui otroooo
$dni = $data["txt_dni"];

$imgBase64 = $data["txt_nombre"];
$arrImg = explode(",", $imgBase64);

//echo "<br> arr <br>";
//var_dump($arrImg[1]);

//die;

$imgBase64_bl = $arrImg[1];

$rutaImagenSalida = "./../public/img_vouchers/test" .$dni.".jpg";
$imagenBinaria = base64_decode($imgBase64_bl);
$bytes = file_put_contents($rutaImagenSalida, $imagenBinaria);
//echo "$bytes bytes fueron escritos en $rutaImagenSalida";

//echo "<br>";

if($bytes){
    
    
    


?>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>okok</title>
</head>
<body>
    <h1>TTITULOOO</h1>
    <img id="blah" src="https://i.ibb.co/Br8tf3Y/Whats-App-Image-2020-09-26-at-12-50-00-PM.jpg" alt="Tu imagen" width="150" height="150px" />
        <img id="blah" src="<?php //echo $imgBase64; ?>" alt="Tu imagen" width="150" height="150px" />
</body>
</html>
 -->


<?php
        header("Location: ../index.php?pg=info");
        die;
        //echo json_encode([$data_res,$file]);
        //echo json_encode("okok");
        
    }else{
        echo json_encode("errrrrror");
    }


?>