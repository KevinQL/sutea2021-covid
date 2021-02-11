<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/mainModel.php";
    }else{
        require_once "./models/mainModel.php";
    }

    class webItecModel extends mainModel{        

        /**
         * 
         */
        protected function obtener_fecha_slider_Modal(){
            $query = "SELECT fecha_txt FROM slider WHERE id_slider=1";
            $result_query = self::ejecutar_una_consulta($query);
            $txt_fecha = "Muy Pronto...";
            if($result_query->rowCount() >= 1){
                $slider = $result_query->fetch(PDO::FETCH_ASSOC);
                $txt_fecha = $slider['fecha_txt'];
            }
            return $txt_fecha;
        }
        /**
         * 
         */
        protected function obtener_dataCurso_Model(){
            $data_cursos = [];  
            $eval = false;

            $query = "SELECT * FROM curso";
            $result_query = self::ejecutar_una_consulta($query);      
            if($result_query->rowCount() >= 1){
                while ($curso = $result_query->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    $data_cursos[] = $curso;
                }                
                $eval = true;
            }
            return ['eval'=>$eval,'data'=>$data_cursos];
        }

    }

?>