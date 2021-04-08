<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/eventoModel.php";
    }else{
        require_once "./models/eventoModel.php";
    }


    class eventoController extends eventoModel{

        /**
         * Devuelve los datos del evento actual activo.
         * retorna: ['res'=>$eval, 'data'=>[0 : arr_data]]
         */
        public function eventoActivo_Controller(){
            return self::eventoActivo_Model();
        }


        /**
         * Actualizar Evento
         */
        public function actualizarEvento_Controller($data){
            $dataModel = new StdClass;
            $dataModel->anio = $this->txtres($data->anio_evento_av);
            $dataModel->nombre = $this->txtres($data->nombre_evento_av);
            $dataModel->estado = $this->txtres($data->estado_evento_av);
            $dataModel->idevento_activo = $this->txtres($data->idevento_activov);
            $dataModel->idevento_select = $this->txtres($data->idevento_selectv);

            $msj_arr = [];
            $eval = false;
            //traendo evento activo
            $res_idevento = self::eventoActivo_Model();
            $msj_arr[] = $res_idevento['eval']? $res_idevento['msj'].$res_idevento['data'][0]['idevento'] : "No se pudo obtener el evento actual" ;

            if($dataModel->idevento_activo == $res_idevento['data'][0]['idevento']){
                //Si la actualizacion es activo, entonces
                if($dataModel->estado == "1"){
                    //desactivando evento activo, ya que se esta actualizando un evento como activo.
                    $res_deM = self::desactivarEvento_Model($dataModel->idevento_activo);
                    $msj_arr[] = $res_deM["eval"]? $res_deM["msj"] : "No se desactivo el evento activo";
                }else {
                    # code...
                    $dataModel->estado = "0"; // y que llega como vacio.
                }
                
                //Actaulizando el evento
                $res_aeM = self::actualizarEvento_Model($dataModel);
                $msj_arr[] = $res_aeM["eval"]? $res_aeM["msj"] : "No se actualizo el evento";

                $eval = $res_aeM["eval"];
            }
            else{

                $eval = false;
                $msj_arr[] = "No coinciden los codigos de los eventos";
            }

            return ["eval"=> $eval, "data" => $dataModel, "msj" => $msj_arr ];
        }


        /**
         * Trae los datos del evento con el id
         */
        public function optionEvento_Controller($data){
            $res = $this->obtenerEventos_Controller($data->idevento_selectv);
            return $res;
        }


        /**
         * CREAR EVENTO
         */
        public function crearEvento_Controller($data){            
            $dataModel = new StdClass;
            $dataModel->anio = $this->txtres($data->anio_eventov);
            $dataModel->nombre = $this->txtres($data->nombre_eventov);
            $dataModel->estado = $this->txtres($data->estado_eventov);
            $dataModel->idevento_activo = $this->txtres($data->idevento_activov);

            //mensajes de acción de todo el proceso
            $msj_arr = [];

            $res = self::crearEvento_Model($dataModel);

            //Desactiva evento actual en el caso de que el nuevo evento este como activo
            if($res){
                $msj_arr[] = "Se inserto el evento";
                
                if($dataModel->estado === "1"){
                    $res_deM = self::desactivarEvento_Model($dataModel->idevento_activo);
                    $msj_arr[] = $res_deM["msj"];

                }
            }

            return [ "eval"=>$res, "data"=>$dataModel, "msj"=>$msj_arr ];
        }


        /**
         * Devuelve todos los eventos creados. cuando el id está vacio
         * En el caso de que se pase el parametro especifico, devuelve el evento de ese mismo. 
         */
        public function obtenerEventos_Controller($id){
            $dataModel = new StdClass;
            $dataModel->idevento = $this->txtres($id);
            $res = self::obtenerEventos_Model($dataModel);
            return $res;
        }

        
        /**
         * Test controller
         */
        public function test_Controller(){
            $resModal = self::test_Modal();
            return $resModal;
        }


        //------------------------------------------------------------------------------

        /**
         * (IMPORTANTE)
         * Parametro
         * @param {string} $variable
         * @return {string}
         * 
         * Limpia los espacios al principio y alfinal y luego lo convierte a minuscula
         */
        private function txtres($variable){
            return mb_strtolower(trim($variable),'UTF-8');            
        }

    }



?>