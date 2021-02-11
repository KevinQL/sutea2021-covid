<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/webSutepModel.php";
    }else{
        require_once "./models/webSutepModel.php";
    }

    class webSutepController extends webSutepModel{

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