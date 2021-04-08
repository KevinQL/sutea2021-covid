<?php
    // Configura la fecha de america lima 
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"es_ES");

    $conAjax = true;

    require_once("../controllers/adminController.php");
    require_once("../controllers/webSutepController.php");
    require_once("../controllers/eventoController.php");
    require_once("../controllers/organizadorController.php");

    if(!is_null($_POST['data'])){
        //convirtiendo los datos enviados desde la vista, ha un objeto stdClass
        $data = json_decode($_POST['data']);
        //Instancia del objeto controller
        $objevento = new eventoController();

        $objOrg = new organizadorController();

        //Agregar organizador. 
        if ($data->id === "agregar-organizador") {
            # code...
            /**
             * Obtener Evento actual activo. 
             * comprobar si el docente ya existe en DECENTE, si es así obtener su ID
             * Verificar si el organizador ya existe en la tabala REGISTRO con el evento actual, Si existe entonces No registrar (Actualizar es otra funcion).
             *  
             */
            $msj_sys = [];
            $operacion = false;

            $data->estado_cv = ($data->estado_cv != "")? 1 : 0;

            $data->tipo_persona = "2";
            $data->id_decente = -1; // en el caso de que no exista registro mantendrá el valor de -1
            $idevento_ultimo_decente = -1; // id_evento del organizador del utimo evento registrado 
            $decente_arr = $objOrg->obtenerDocenteDni_Controller($data->dni_cv);
            $msj_sys[] = $decente_arr["msj"];
            if($decente_arr['eval']){
                $data->id_decente = $decente_arr['data']['iddecente'];
                $idevento_ultimo_decente = $decente_arr['data']['evento_idevento'];
            }
            $evento_arr = $objevento->eventoActivo_Controller();
            $data->id_eventoActivo = $evento_arr['data'][0]['idevento'];
            $msj_sys[] = $evento_arr["msj"];
            // comprobando si ya está registrado en el evento como organizador.
            if($idevento_ultimo_decente != $data->id_eventoActivo){
                // FALTA REGISTAR EN EL EVENTO ACTUAL ACTIVO 
                if($decente_arr['eval']){
                    // actualizar decente
                    $msj_sys[] = $objOrg->actualizarDecente_controller($data)["msj"];

                    // y insertar registro
                    $msj_sys[] = $objOrg->insertarRegistro_controller($data)["msj"];

                    $data->accion = "ORGANIZADOR REGISTRADO Y ACTUALIZADO.";
                    $operacion = true;
                }else{
                    // insertar decente
                    $msj_sys[] = $objOrg->insertarDecente_controller($data)["msj"];
                    // insertar registro
                    $decente_arr = $objOrg->obtenerDocenteDni_Controller($data->dni_cv);
                    $data->id_decente = $decente_arr['data']['iddecente'];
                    $msj_sys[] = $decente_arr["msj"];
                    $msj_sys[] = $objOrg->insertarRegistro_controller($data)["msj"];
                    
                    $data->accion = "ORGANIZADOR REGISTRADO.";
                    $operacion = true;
                }
            }else{
                // YA SE REGISTRO EN EL EVENTO ACTUAL ACTIVO
                $data->accion = "EL USUARIO YA ESTÁ REGISTRADO";
                $operacion = false;
            }
            $data->informe_sys = $msj_sys;
            $data->operacion = $operacion;
            // $res = $obj->crearOrganizador_Controller($data);
            // echo json_encode($res);
            echo json_encode($data);
        }



        elseif ($data->id === "obtener-docente") {
            # code...
            $res = $objOrg->obtenerDocenteDni_Controller($data->dni_cv);
            echo json_encode($res);
        }



        elseif ($data->id === "obtener-docentes_tbl") {
            # code...
            $msj_sys = [];

            $evento_arr = $objevento->eventoActivo_Controller();
            $msj_sys[] = $evento_arr["msj"];
            
            $data->id_eventoActivo = $evento_arr['data'][0]['idevento'];
            $res = $objOrg->obtenerOrganizadores_Controller($data->dni, $data->nombre, $data->apellido, $data->id_eventoActivo);
            $data->data_res = $res["data"];
            $msj_sys[] = $res["msj"];
            $data->operacion = $res["eval"];

            $data->informe_sys = $msj_sys;
            
            echo json_encode($data);
        }



        elseif ($data->id === "cargar-organizador") {
            # code...
            $res = $objOrg->obtenerOrganizador_idRegistro_Controller($data->idregistro);
            $data->data_res = $res["data"];
            $data->informe_sys = $res["msj"];
            $data->operacion = $res["eval"];
            echo json_encode($data);
        }



        elseif ($data->id === "actualizar-organizacion") {
            # code...
            $msj_sys = [];

            $evento_arr = $objevento->eventoActivo_Controller();
            $data->id_eventoActivo = $evento_arr['data'][0]['idevento'];
            $msj_sys[] = $evento_arr["msj"];

            $res_d = $objOrg->EsDniDocenteDuplicado_Controller($data->dni_updv, $data->iddecente_updv);
            $msj_sys[] = $res_d['msj'];
            
            if(!$res_d['eval']){
                $res = $objOrg->actualizarDecenteUPD_controller($data); 
                $msj_sys[] = $res["msj"]; 
    
                $res2 = $objOrg->actualizarRegistroUPD_controller($data);
                $msj_sys[] = $res2["msj"];

                $operacion_r = true;
            }else{
                $msj_sys[] = "Ya existe un usuario con el mismo dni!";
                $operacion_r = false;
            }

            
            $data->operacion = $operacion_r; 
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