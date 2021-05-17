<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/certificadoModel.php";
    }else{
        require_once "./models/certificadoModel.php";
    }


    class certificadoController extends certificadoModel{

        /**
         * 
         */
        public function editarTema_Controller($data){
            $dataModel = new StdClass;
            $dataModel->idtemario_certificado = $data->id_temav;
            $dataModel->tema = $data->txt_temav;
            $res = self::editarTema_Model($dataModel);
            return $res;
        }

        /**
         * 
         */
        public function guardarTema_Controller($data){
            $dataModel = new StdClass;            
            $dataModel->tema = $data->txt_temav;
            $dataModel->certificado_idcertificado = $data->idcertificado;
            $res = self::guardarTema_Model($dataModel);
            
            return $res;
        }

        /**
         * 
         */
        public function eliminarTemas_Controller($data){
            $dataModel = new StdClass;
            $idtemas = $data->temas_arr;
            $msj_sys = []; 
            foreach ($idtemas as $tema) {
                # code...
                $dataModel->idtemario_certificado = $tema->id;
                $res = self::eliminarTemas_Model($dataModel);
                $msj_sys[] = $res["msj"];
            }
            $res["msj"] = $msj_sys;
            return $res;
        }


        /**
         * 
         */
        public function getTemasCertificate_Controller($data){
            $dataModel = new StdClass;
            $dataModel->certificado_idcertificado = $data->idcertificado;
            $res = self::getTemasCertificate_Model($dataModel);
            return $res;
        }

        /**
         * 
         */
        public function getCertificado_Controller($data){
            $dataModel = new StdClass;
            $dataModel->evento_idevento = $data->id_eventoActivo;
            $dataModel->tipo_persona_idtipo_persona = $data->s_tp_personav;
            $res = self::getCertificado_Model($dataModel);
            return $res;
        }


        /**
         * 
         */
        public function obtenerContenido_Certificado($data){
            $dataModel = new StdClass;
            $dataModel->evento_idevento = $data->id_eventoActivo;
            $dataModel->tipo_persona_idtipo_persona = $data->s_tp_personav;
            $res = self::obtenerContenido_Model($dataModel);
            return $res;
        }

        /**
         * 
         */
        public function guardarContenido_Controller($data){
            $dataModel = new StdClass;
            $dataModel->contenido_principal = $data->txt_contenidov;
            $dataModel->evento_idevento = $data->id_eventoActivo;
            $dataModel->tipo_persona_idtipo_persona = $data->s_tp_personav;

            $res = self::guardarContenido_Model($dataModel);

            return $res;
        }

        /**
         * 
         */
        public function actuaizarRuta_Controller($data){

            $dataModel = new StdClass;
            $dataModel->ruta = $data->ruta;
            $dataModel->evento_idevento = $data->id_eventoActivo;
            $dataModel->tipo_persona_idtipo_persona = $data->s_tp_personav;

            $res = self::actuaizarRuta_Model($dataModel);

            return $res;

        }


        /**
         * 
         */
        public function subirFotoCertificado_Controller($data){
            $dataModel = new StdClass;
            $anio = date("Y");

            $estructura = "/public/images_certi/{$anio}/";
            $name_img = "cert{$data->s_tp_personav}.jpg";
            $dataModel->ruta = $estructura . $name_img; //ruta para que se guarde en la base de datos

            $res_carpeta = mainModel::crear_carpeta($estructura);
            $res = mainModel::guardar_imagen($data->img_certificado, "..".$estructura, $name_img);
            $res = array_merge($res, ['data'=>$dataModel]);
            
            return $res;
        }

        /**
         * 
         */
        public function cambiarEstadoCertificado_Controller($data){
            $dataModel = new StdClass;
            $dataModel->estado = $data->estado_certiv;
            $dataModel->tipo_persona_idtipo_persona = $data->s_tp_personav;
            $dataModel->evento_idevento = $data->id_eventoActivo;

            $res = self::cambiarEstadoCertificado_Model($dataModel);

            return $res;
        }

        /**
         * PENDIENTE PARA DATOS POR DEFECTO
         */
        public function dataCertificadoXDefecto_Controller($data){
            $dataModel = new StdClass;
            $dataModel->evento_idevento = $data->id_eventoActivo;
            $dataModel->tipo_persona_idtipo_persona = 1;

            // $res = self::dataCertificadoXDefecto_Model($dataModel);

            return $res;
        }


        public function temasCertificado_Controller($data){
            
            $dataModel = new StdClass;
            $dataModel->certificado_idcertificado = $data->data_certificado["idcertificado"];

            $res = self::temasCertificado_Model($dataModel);

            return $res;
        }

        public function dataCertificado_Controller($data){
            
            $dataModel = new StdClass;
            $dataModel->tipo_persona_idtipo_persona = $data->s_tp_personav;
            $dataModel->evento_idevento = $data->id_eventoActivo;

            $res = self::dataCertificado_Model($dataModel);

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