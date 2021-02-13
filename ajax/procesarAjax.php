<?php

    session_start();

    $conAjax = true;

    require_once("../controllers/adminController.php");

    if(!is_null($_POST['data'])){
        //convirtiendo los datos enviados desde la vista, ha un objeto stdClass
        $data = json_decode($_POST['data']);
        //Instancia del objeto controller
        $obj = new adminController();

        //Regitro usuario para la administración del sistema 
        if ($data->id === "REGISTRO-USER") {
            # code...
            $result_operation = $obj->insert_user_Controller($data);
            echo json_encode($result_operation);
        }
        elseif ($data->id === "save-img") {
            # code...
            $img_test = $_FILES["img_file"];
            $result_operation = $obj->saveimg_Controller($data, $img_test);
            echo json_encode($result_operation);
        }
        elseif ($data->id === "SESSION-USER") {
            # code...
            //$result_operation = $obj->session_user_Controller($data);
            //echo json_encode($result_operation);
            $res = ["eval"=>true, "data"=>$data];
            echo json_encode($res);
        }
        elseif ($data->id === "INSERT-SLIDER") {
            # code...
            $img_slider = $_FILES['img_file'];            
            $result_operation = $obj->insert_slider_Controller($data, $img_slider);
            echo json_encode($result_operation);
        }
        elseif ($data->id === "INSERT-CURSO") {
            # code...
            $img_slider = $_FILES['img_file'];            
            $result_operation = $obj->insert_curso_Controller($data, $img_slider);
            echo json_encode($result_operation);
        }
        elseif ($data->id === "SELECT-CURSO") {
            # code...                     
            $result_operation = $obj->select_curso_Controller($data);
            echo json_encode($result_operation);
        }
        elseif ($data->id === "DELETE-CURSO") {
            # code...                     
            $result_operation = $obj->delete_curso_Controller($data);
            echo json_encode($result_operation);
        }


        else {
            echo json_encode("ERROR!!");
        }

    }else{
        echo json_encode("ERROR!!");
    }
    

?>