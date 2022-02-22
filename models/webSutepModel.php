<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/mainModel.php";
    }else{
        require_once "./models/mainModel.php";
    }

    class webSutepModel extends mainModel{     
        
        protected function obtenerRutaCertificado_Model($data){
            $query = "SELECT * FROM certificado c WHERE c.evento_idevento = {$data->evento_idevento} AND c.tipo_persona_idtipo_persona = {$data->tipo_persona_idtipo_persona}";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                while($user_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    //
                    $data = $user_fla;
                    $eval = true;
                }             
            }
            return ['eval'=>$eval, 'data'=>$data];
        }


        /**
         *  Función que se utiliza en la automatizacion de PDF's 
         */
        protected function obtenerDocente_Model($data){
            $query = "SELECT r.anio, r.estado, r.evento_idevento, d.dni, d.nombre, d.apellido, d.especialidad, tp.idtipo_persona, tp.detalle as tipo_persona 
                FROM registro r 
                INNER JOIN decente d 
                ON r.decente_iddecente = d.iddecente
                INNER JOIN tipo_persona tp
                ON tp.idtipo_persona = d.tipo_persona_idtipo_persona
                WHERE r.anio = {$data->anio}
                AND d.dni = '{$data->dni}'
                AND r.estado = 1
            ";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                while($user_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    //verifica que la contrasenia sea correspondida
                    $data = $user_fla;
                    $eval = true;
                }             
            }
            return ['eval'=>$eval, 'data'=>$data];
        }


        /**
         *  Función que se utiliza en la automatizacion de PDF's 
         */
        protected function obtenerPonente_Model($data){
            $query = "SELECT * FROM ponente p 
                        WHERE p.dni='{$data->dni}' 
                        AND p.anio={$data->anio} 
                        AND p.estado=1
                    ";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                while($user_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    //verifica que la contrasenia sea correspondida
                    $data = $user_fla;
                    $eval = true;
                }             
            }
            return ['eval'=>$eval, 'data'=>$data];
        }


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