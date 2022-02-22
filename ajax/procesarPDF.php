<?php
    // Configura la fecha de america lima 
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"es_ES");

    $conAjax = true;

    require_once("../controllers/adminController.php");
    require_once("../controllers/webSutepController.php");

    if(!is_null($_POST['data'])){
        //convirtiendo los datos enviados desde la vista, ha un objeto stdClass
        $data = json_decode($_POST['data']);
        //Instancia del objeto controller
        $obj = new webSutepController();

        //Regitro usuario para la administración del sistema 
        if ($data->id === "consultar-certificado") {
            # code...
            $res = $obj->obtenerPonente_Controller($data->dni, $data->anio);
            if(!$res['eval']){
                $res = $obj->obtenerDocente_Controller($data->dni, $data->anio);
            }
            echo json_encode($res);
        }
        // elseif ($data->id === "") {
        //     # code...
        //     $res = $obj->traerInfoDocente_Controller($data);
        //     echo json_encode($res);
        // }

        else {
            echo json_encode("ERROR!!");
        }

    }else{
        echo json_encode("ERROR!!");
    }
    

?>