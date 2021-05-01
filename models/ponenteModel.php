<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/mainModel.php";
    }else{
        require_once "./models/mainModel.php";
    }

    class ponenteModel extends mainModel{     

        /**
         * 
         */
        protected function crearPonente_Model($data){

            

            return $data;

        }


        /**
         * 
         */
        protected function obtenerPonente_Model($data){
            $msj_sys = "No se encontro Ponente.";
            //TIENE QUE RETORNAR EL REGISTR MÁS ACTUAL POSIBLE.Si es posible corregir el ORDER BY del query
            $query = "SELECT *
            FROM ponente p 
            WHERE p.dni LIKE '{$data->dni}'
            ORDER BY p.idponente DESC
            LIMIT 1
            ";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                $msj_sys = "Se encontró ponente.";
                $eval = true;
                while($user_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    // code
                    $data[] = $user_fla;
                }             
            }
            return ['eval'=>$eval, 'data'=>$data, 'msj'=>$msj_sys];
        }


        /**
         * 
         */
        protected function test_Modal(){

            $resTest = "hello model test sutep";
            return $resTest;

        }

    }

?>