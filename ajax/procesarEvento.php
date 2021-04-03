<?php
    // Configura la fecha de america lima 
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"es_ES");

    $conAjax = true;

    require_once("../controllers/adminController.php");
    require_once("../controllers/webSutepController.php");
    require_once("../controllers/eventoController.php");

    if(!is_null($_POST['data'])){
        //convirtiendo los datos enviados desde la vista, ha un objeto stdClass
        $data = json_decode($_POST['data']);
        //Instancia del objeto controller
        $obj = new eventoController();

        //Regitro usuario para la administración del sistema 
        if ($data->id === "crear-evento") {
            # code...
            $res = $obj->crearEvento_Controller($data);
            echo json_encode($res);
        }
        elseif ($data->id === "option-evento") {
            # code...
            $res = $obj->optionEvento_Controller($data);
            echo json_encode($res);
        }
        elseif ($data->id === "actualizar-evento") {
            # code...
            $res = $obj->actualizarEvento_Controller($data);
            echo json_encode($res);
        }

        else {
            echo json_encode("ERROR!!");
        }

    }else{
        echo json_encode("ERROR!!");
    }
    

?>