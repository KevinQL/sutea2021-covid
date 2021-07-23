<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/webSutepModel.php";
    }else{
        require_once "./models/webSutepModel.php";
    }


    class webSutepController extends webSutepModel{

        /**
         * 
         */
        public function obtenerRutaCertificado_Controller($idEvento, $idTipoPersona){
            $dataModel = new StdClass;
            $dataModel->evento_idevento = $this->txtres($idEvento);
            $dataModel->tipo_persona_idtipo_persona = $this->txtres($idTipoPersona);

            $res = self::obtenerRutaCertificado_Model($dataModel);

            if($res['eval']){
                $fondo_certi = $res['data']['ruta'];
            }else{
                $fondo_certi = "sinfondo.jpg";
            }
            return $fondo_certi;
        }


        /**
         * 
         */
        public function obtenerPonente_Controller($dni, $anio){
            $dataModel = new StdClass;
            $dataModel->dni = $this->txtres($dni);
            $dataModel->anio = $this->txtres($anio);
            $res = self::obtenerPonente_Model($dataModel);
            return $res;
        }


        /**
         * 
         */
        public function obtenerDocente_Controller($dni, $anio){
            $dataModel = new StdClass;
            $dataModel->dni = $this->txtres($dni);
            $dataModel->anio = $this->txtres($anio);
            $res = self::obtenerDocente_Model($dataModel);
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