<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/mainModel.php";
    }else{
        require_once "./models/mainModel.php";
    }

    class eventoModel extends mainModel{     
        

        /**
         * 
         */
        protected function eventoActivo_Model(){
            $eval = false;
            $data_res = [];
            $msj_sys = "";
            
            $query = "SELECT * FROM evento e WHERE e.estado = 1";

            $res_query = self::ejecutar_una_consulta($query);
            if($res_query->rowCount() >= 1){
                while ($elem_doc = $res_query->fetch(PDO::FETCH_ASSOC)) {
                    $data_res[] = $elem_doc;
                }
                $eval = true;
                $msj_sys = "Obteniendo evento activo";
            }
            return ['eval'=>$eval, 'data'=>$data_res, 'msj'=>$msj_sys ];
        }


        /**
         * 
         */
        protected function actualizarEvento_Model($data){
            $res = false;
            $msj_sys = "";
            $query = "UPDATE evento e
                        SET e.nombre = '{$data->nombre}',
                            e.estado = {$data->estado}
                        WHERE e.idevento = '{$data->idevento_select}' 
                    ";

            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                $res = true;
                $msj_sys = "Se catualizo el evento {$data->idevento_select}"; 
            }
            return ['eval'=>$res, 'msj'=> $msj_sys ];
        }


        /**
         * 
         */
        protected function desactivarEvento_Model($idevento){
            $res = false;
            $msj_sys = "";
            $query = "UPDATE evento e
                        SET e.estado = 0 
                        WHERE e.idevento = '{$idevento}' 
                    ";

            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                $res = true;
                $msj_sys = "Se desactivo el evento $idevento"; 
            }
            return ['eval'=>$res, 'msj'=> $msj_sys ];
        }

        /**
         * 
         */
        protected function crearEvento_Model($data){
            $query = "INSERT INTO evento SET 
                        anio = '{$data->anio}',
                        nombre = '{$data->nombre}',
                        estado = '{$data->estado}',
                        fecha_registro = current_timestamp()
            ";
            $result_query = self::ejecutar_una_consulta($query);
            $eval = false;
            if($result_query->rowCount() >= 1){
                $eval = true;
            }
            return $eval;
        }

        /**
         * 
         */
        protected function obtenerEventos_Model($data){
            $eval = false;
            $data_res = [];
            
            $query = "SELECT * FROM evento WHERE 1";
            if($data->idevento !== ""){
                $query = "SELECT * FROM evento e 
                        WHERE e.idevento = '{$data->idevento}'
                        ";
            }

            $res_query = self::ejecutar_una_consulta($query);
            if($res_query->rowCount() >= 1){
                while ($elem_doc = $res_query->fetch(PDO::FETCH_ASSOC)) {
                    $data_res[] = $elem_doc;
                }
                $eval = true;
            }
            return ['eval'=>$eval, 'data'=>$data_res];
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