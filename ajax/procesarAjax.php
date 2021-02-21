<?php
    // Configura la fecha de america lima 
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"es_ES");

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
            //en el caso de que no se suba el voucher, 
            $img_voucher = isset($_FILES["img_voucher"])? $_FILES["img_voucher"] : ["type"=>"admin"];
            $res = $obj->exeInscripcion_Controller($data, $img_voucher);
            echo json_encode($res);
        }
        elseif ($data->id === "exe-loginUser") {
            # code...
            $res = $obj->session_user_Controller($data);
            echo json_encode($res);
        }

        elseif ($data->id === "exe-traerDocenteAsis") {
            # code...
            $res = $obj->exeTraerDocenteAsis_Controller($data);
            echo json_encode($res);
        }

        elseif ($data->id === "exe-traerDocenteEvento") {
            # code...
            $res = $obj->exeTraerDocenteEvento_Controller($data);
            echo json_encode($res);
        }
        //validar registro desde admin
        elseif ($data->id === "exe-validarRegistro") {
            # code...
            $res = $obj->exeValidarRegistro_Controller($data);
            echo json_encode($res);
        }

        elseif ($data->id === "exe-eliminarRegistro") {
            # code...
            $res = $obj->exeeliminarRegistro_Controller($data);
            echo json_encode($res);
        }

        else {
            echo json_encode("ERROR!!");
        }

    }else{
        echo json_encode("ERROR!!");
    }
    

?>