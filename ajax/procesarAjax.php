<?php

    $conAjax = true;

    require_once("../controllers/adminController.php");

    if(!is_null($_POST['data'])){
        //convirtiendo los datos enviados desde la vista, ha un objeto stdClass
        $data = json_decode($_POST['data']);
        //Instancia del objeto controller
        $obj = new adminController();

        //Regitro usuario para la administración del sistema 
        if ($data->id === "exe-registroUser") {
            # code...
            $res = $obj->insert_user_Controller($data);
            echo json_encode($res);
        }
        elseif ($data->id === "exe-traerinfo") {
            # code...
            $res = $obj->traerInfoDocente_Controller($data);
            echo json_encode($res);
        }
        elseif ($data->id === "exe-inscripcion") {
            # code...
            $img_voucher = $_FILES["img_voucher"];
            $res = $obj->exeInscripcion_Controller($data, $img_voucher);
            echo json_encode($res);
        }
        elseif ($data->id === "exe-loginUser") {
            # code...
            $res = $obj->session_user_Controller($data);
            echo json_encode($res);
        }

        else {
            echo json_encode("ERROR!!");
        }

    }else{
        echo json_encode("ERROR!!");
    }
    

?>