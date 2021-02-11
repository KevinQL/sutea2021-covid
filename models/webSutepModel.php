<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/mainModel.php";
    }else{
        require_once "./models/mainModel.php";
    }

    class webSutepModel extends mainModel{        

        /**
         * 
         */
        protected function test_Modal(){

            $resTest = "hello model test sutep";
            return $resTest;
            
            // ejemplo interaccion servidor
            $query = "SELECT fecha_txt FROM slider WHERE id_slider=1";
            $result_query = self::ejecutar_una_consulta($query);
            $txt_fecha = "Muy Pronto...";
            if($result_query->rowCount() >= 1){
                $slider = $result_query->fetch(PDO::FETCH_ASSOC);
                $txt_fecha = $slider['fecha_txt'];
            }
            return $txt_fecha;
        }

    }

?>