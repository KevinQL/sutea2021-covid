<?php
    // Configura la fecha de america lima 
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"es_ES");

    $conAjax = true;

    require_once("../controllers/adminController.php");
    require_once("../controllers/eventoController.php");

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

            if($data->txt_base64v !== ""){
                if($res["eval"] || $res["cvoucher"]){
                    
                    $ruta = "./../public/img_voucher/";
                    $arr_data = explode(",",$data->txt_base64v);
                    $base64 = $arr_data[1]; //base64 en texto plano
                    $file_img = base64_decode($base64);
                    $ruta_name = $ruta .$res["data"]->ruta_voucher;
                    file_put_contents($ruta_name, $file_img);
                }
            }

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
        elseif ($data->id === "exe-docenteAsistencia") {
            # code...
            $res = $obj->exedocenteAsistencia_Controller($data);
            echo json_encode($res);
        }

        /**
         * Modulo validar. Procedimientos para realizar la actualización de datos DOCENTE y REGISTRO
         */
        elseif ($data->id === "exe-getdataUpdate_ModValid"){
            $res = $obj->exeGetDataUpdateMValid_Controller($data);
            echo json_encode($res);
        }

        /**
         * Modulo validar. Procedimientos actualizar data form en DECENTE y REGISTRO
         */
        elseif ($data->id === "exe-setdataUpdate_ModValid"){
            $reciev_data = $data->env_dta;
            $res = $obj->exeSetdataUpdate_MValid_Controller($reciev_data);
            echo json_encode($res);
        }
        else {
            echo json_encode("ERROR!!");
        }

    }else{
        echo json_encode("ERROR!!");
    }
    

?>