<?php
    // Configura la fecha de america lima 
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"es_ES");

    $conAjax = true;

    require_once("../controllers/adminController.php");
    require_once("../controllers/webSutepController.php");
    require_once("../controllers/organizadorController.php");
    require_once("../controllers/ponenteController.php");
    
    require_once("../controllers/eventoController.php");
    require_once("../controllers/certificadoController.php");

    if(!is_null($_POST['data'])){
        //convirtiendo los datos enviados desde la vista, ha un objeto stdClass
        $data = json_decode($_POST['data']);
        //Instancia del objeto controller
        $objevento = new eventoController();
        $objCerti = new certificadoController();

        //array de msj para el informe del sistema
        $msj_sys = [];

        //obteniendo evento
        $evento_arr = $objevento->eventoActivo_Controller();
        $data->id_eventoActivo = $evento_arr['data'][0]['idevento']; //Id EVENTO ACTIVO
        $msj_sys[] = $evento_arr["msj"];


        //. 
        if ($data->id === "obtener-data-certificado") {
            # code...
            
            // Obtemiendo Certificado
            $res_dc = $objCerti->dataCertificado_Controller($data);
            $data->data_certificado = $res_dc["data"][0];
            $msj_sys[] = $res_dc["msj"];
            
            //Obteniendo temas del certificado
            $res_tc = $objCerti->temasCertificado_Controller($data);
            $data->data_temas = $res_tc["data"];
            $msj_sys[] = $res_tc["msj"];

            $data->operacion = $res_dc["eval"];
            $data->informe_sys = $msj_sys;

            echo json_encode($data);
        }


        elseif ($data->id === "editar-tema") {
            # code...
            // Actualizar tema por id
            $res = $objCerti->editarTema_Controller($data);
            $msj_sys[] = $res["msj"];

            $data->operacion = $res["eval"];
            $data->informe_sys = $msj_sys;

            echo json_encode($data);
        }


        elseif ($data->id === "guardar-tema") {
            # code...
            // Obteniendo ID del certificado actual
            $res_certi = $objCerti->getCertificado_Controller($data);
            $data->idcertificado = $res_certi["data"]["idcertificado"]; // id del certificado
            $msj_sys[] = $res_certi["msj"];
            
            // guardando tema
            $res = $objCerti->guardarTema_Controller($data);
            $msj_sys[] = $res["msj"];

            $data->informe_sys = $msj_sys;
            $data->operacion = $res["eval"];;

            echo json_encode($data);
        }


        elseif ($data->id === "eliminar-temas") {
            # code...
            
            // eliminando temas seleccionados
            $res = $objCerti->eliminarTemas_Controller($data);
            $msj_sys[] = $res["msj"];

            $data->operacion = $res["eval"];
            $data->informe_sys = $msj_sys;

            echo json_encode($data);
        }

        elseif ($data->id === "obtener-lista-temas") {
            # code...
            // Obteniendo ID del certificado actual
            $res_certi = $objCerti->getCertificado_Controller($data);
            $data->idcertificado = $res_certi["data"]["idcertificado"]; // id del certificado
            $msj_sys[] = $res_certi["msj"];
            
            // Get list of certificate
            $res_temario = $objCerti->getTemasCertificate_Controller($data);
            $data->data_certificado_temario = $res_temario["data"];
            $msj_sys[] = $res_temario["msj"];

            $data->informe_sys = $msj_sys;
            $data->operacion = ($res_temario["eval"] && $res_certi["eval"]);

            echo json_encode($data);
        }


        //----------------------
        elseif ($data->id === "obtener-contenido") {
            # code...
            $res_contenido = $objCerti->obtenerContenido_Certificado($data);
            $msj_sys[] = $res_contenido["msj"];
            $data->data_res = $res_contenido["data"];

            $data->informe_sys = $msj_sys;
            $data->operacion = $res_contenido["eval"];
            
            echo json_encode($data);
        }
        
        //
        elseif ($data->id === "guardar-contenido") {
            # code...

            // Guardar contenido
            $res_contenido = $objCerti->guardarContenido_Controller($data);
            $msj_sys[] = $res_contenido["msj"];

            $data->informe_sys = $msj_sys;
            $data->operacion = $res_contenido["eval"] || false;

            echo json_encode($data);
        }

        elseif ($data->id === "cambiar-estado") {
            # code...
            //actualizar el estado
            $res = $objCerti->cambiarEstadoCertificado_Controller($data);
            $data->res_data = $res;

            $data->operacion = $res["eval"];
            
            echo json_encode($data);
        }

        elseif ($data->id === "subir-certificado") {
            # code...
            //recepcionando foto certificado subido
            $data->img_certificado = $_FILES["input_certificadov"];

            $res_img = $objCerti->subirFotoCertificado_Controller($data);
            $data->ruta = $res_img["data"]->ruta; //obteniendo ruta de la imagen para actualizar en certificado
            $msj_sys[] = $res_img["msj"];
            
            //actualizar ruta del certificado
            $res_certi = $objCerti->actuaizarRuta_Controller($data);
            $msj_sys[] = $res_certi["msj"];

            $data->informe_sys = $msj_sys;
            $data->operacion = ($res_img["eval"] || $res_certi["eval"]);

            echo json_encode($data);
        }

        elseif ($data->id === "") {
            # code...

            echo json_encode($data);
        }


        else {
            echo json_encode("ERROR 2!!");
        }

    }else{
        echo json_encode("ERROR 1!!");
    }
    

?>