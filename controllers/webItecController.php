<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/webItecModel.php";
    }else{
        require_once "./models/webItecModel.php";
    }

    class webItecController extends webItecModel{

        /**
         * Obtiene un string la fecha de inicio de clases 
         */
        public function obtener_fecha_slider_Controller(){
            $resModal = self::obtener_fecha_slider_Modal();
            return $resModal;
        }

        /**
         * 
         */
        public function obtener_dataCurso_Controller(){
            $resModal = self::obtener_dataCurso_Model();
            return $resModal;
            //return [['nombre'=>'contabilidad'],['nombre'=>'admi'],['nombre'=>'sistemas']];
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