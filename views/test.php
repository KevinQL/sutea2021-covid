<?php

$file = $_FILES['img_test'];
var_dump($file);

// echo "ojoj1";
// die;
// echo "ojoj2";
$data = json_decode( json_encode($_FILES));

$nombre = "slider.png";
$dir_img_slider = './../public/img_vouchers/test' . $nombre;

$resultado = move_uploaded_file($file['tmp_name'], $dir_img_slider); //se guarda el modelo json


if($resultado){
    
    echo json_encode([$data,$file]);
    
}else{
    echo json_encode("errrrrror");
}


?>