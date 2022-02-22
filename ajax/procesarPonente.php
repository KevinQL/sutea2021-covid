<?php
    // Configura la fecha de america lima 
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"es_ES");

    $conAjax = true;

    require_once("../controllers/adminController.php");
    require_once("../controllers/webSutepController.php");
    require_once("../controllers/eventoController.php");
    require_once("../controllers/organizadorController.php");
    require_once("../controllers/ponenteController.php");

    if(!is_null($_POST['data'])){
        //convirtiendo los datos enviados desde la vista, ha un objeto stdClass
        $data = json_decode($_POST['data']);
        //Instancia del objeto controller
        $objevento = new eventoController();
        $objPonente = new ponenteController();

        //array de msj para el informe del sistema
        $msj_sys = [];

        //obteniendo evento
        $evento_arr = $objevento->eventoActivo_Controller();
        $data->id_eventoActivo = $evento_arr['data'][0]['idevento'];
        $msj_sys[] = $evento_arr["msj"];


        //Agregar organizador. 
        if ($data->id === "obtener-ponente") {
            # code...
            
            // Obtemiendo Ponente
            $res_p = $objPonente->obtenerPonente_Controller($data);
            $data->data_res = $res_p["data"][0];
            $msj_sys[] = $res_p["msj"];

            if($data->id_eventoActivo === $data->data_res["evento_idevento"]){
                $msj_sys[] = "El Ponente ya está registrado";
            }

            $data->operacion = $res_p["eval"];
            $data->informe_sys = $msj_sys;

            echo json_encode($data);
        }


        elseif ($data->id === "obtener-ponente-tbl") {
            # code...

            //obteniendo Ponente
            $res = $objPonente->obtenerPonentes_Controller($data->dni, $data->nombre, $data->apellido, $data->id_eventoActivo);
            $msj_sys[] = $res["msj"]; 
            $data->operacion = $res["eval"];
            $data->data_res = $res["data"];

            $data->informe_sys = $msj_sys;

            echo json_encode($data);

        }

        elseif ($data->id === "add-ponente") {
            # code...

            $res = $objPonente->crearPonente_Controller($data);
            $data->data_res = $res["data"];
            $msj_sys[] = $res["msj"];

            $data->informe_sys = $msj_sys;
            $data->operacion = $res["eval"];

            echo json_encode($data);
        }


        elseif ($data->id === "eliminar-ponente") {
            # code...
            $res = $objPonente->eliminarPonente_Controller($data);
            $msj_sys[] = $res["msj"];

            $data->informe_sys = $msj_sys;
            $data->operacion = $res["eval"];

            echo json_encode($data);
        }


        elseif ($data->id === "obtener-ponente-upd") {
            # code... 
            // Obteniendo ponene por idponente
            $res = $objPonente->obtenerPonenteId_Controller($data);
            $data->data_res = $res["data"][0];
            $msj_sys[] = $res["msj"];

            $data->operacion = $res["eval"];
            // Obteniendo lista de documentos del ponente
            $res_doc = $objPonente->obtener_estructura_directorios(".." . $data->data_res["ruta_archivos"]);
            $data->data_res_doc = $res_doc["data"];
            $msj_sys[] = $res_doc["msj"];

            $data->informe_sys = $msj_sys;

            echo json_encode($data);
        }


        elseif ($data->id === "upd-ponente") {
            # code...

            // actualizar ponente
            $res = $objPonente->actualizarPonente_Controller($data);
            $msj_sys[] = $res["msj"];
            
            $data->operacion = $res["eval"];
            $data->informe_sys = $msj_sys;

            echo json_encode($data);
        }


        elseif ($data->id === "subir_foto_ponente") {
            # code...
            //recibiendo imagen
            $data->img_ponente = $_FILES["file_foto_updv"];
            //guardando foto postuante
            $res = $objPonente->subirFotoPonente_Controller($data);
            $msj_sys[] = $res["msj"];
            
            $data->operacion = $res["eval"];
            $data->informe_sys = $msj_sys;
            echo json_encode($data);
        }


        elseif ($data->id === "subir_doc_ponente") {
            # code...
            //recibiendo imagen
            $data->documento = $_FILES["file_doc_updv"];
            // $data->nombreDoc = $data->documento["name"];
            //guardar archivo
            $res = $objPonente->subirDocPonente_Controller($data);
            $msj_sys[] = $res["msj"];
            
            // Obteniendo lista de documentos del ponente
            $res_doc = $objPonente->obtener_estructura_directorios("../public/curso_files/evento-{$data->id_eventoActivo}/{$data->txt_dni_updv}/");
            $data->data_res_doc = $res_doc["data"];
            $msj_sys[] = $res_doc["msj"];
            
            $data->operacion = $res["eval"];
            $data->informe_sys = $msj_sys;

            echo json_encode($data);
        }


        else {
            echo json_encode("ERROR 2!!");
        }

    }else{
        echo json_encode("ERROR 1!!");
    }
    

?>