<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/mainModel.php";
    }else{
        require_once "./models/mainModel.php";
    }

    class organizadorModel extends mainModel{     

        /**
         * 
         */
        protected function actualizarRegistroUPD_Model($data){
            $msj_sys = "No se actualizo el registro"; 
            $res = false;
            $msj_sys = "";
            $query = "UPDATE registro r
                        SET r.estado = '{$data->estado}',
                            r.especialidadr = '{$data->especialidadr}',
                            r.ugelr = '{$data->ugelr}',
                            r.tipo_personar = '{$data->tipo_personar}'
                        WHERE r.decente_iddecente = '{$data->decente_iddecente}' 
                        AND r.evento_idevento = '{$data->evento_idevento}'
                    ";

            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                $res = true;
                $msj_sys = "Se actualizo el registro {$data->decente_iddecente}"; 
            }
            return ['eval'=>$res, 'msj'=> $msj_sys ];
        }


        /**
         * 
         */
        protected function insertarDecente_Model($data){
            $msj_sys="No se inserto en decente";
            $query = "INSERT INTO decente SET 
                        dni = '{$data->dni}',
                        nombre = '{$data->nombre}',
                        apellido = '{$data->apellido}',
                        celular = '{$data->celular}',
                        correo = '{$data->correo}',
                        especialidad = '{$data->especialidad}',
                        ugel = '{$data->ugel}',
                        control_dia = '{$data->control_dia}',
                        control_asistencia = '{$data->control_asistencia}',
                        tipo_persona_idtipo_persona = '{$data->tipo_persona_idtipo_persona}'
            ";
            $result_query = self::ejecutar_una_consulta($query);
            $eval = false;
            if($result_query->rowCount() >= 1){
                $eval = true;
                $msj_sys = "Se inserto en decente";
            }
            return ["eval"=>$eval, "data"=>$data, "msj"=>$msj_sys];
        }

        
        /**
         * 
         */
        protected function insertarRegistro_Model($data){
            $msj_sys="No se inserto en registro.";
            $query = "INSERT INTO registro SET 
                        anio = '{$data->anio}',
                        ruta_voucher = '{$data->ruta_voucher}',
                        type_voucher = '{$data->type_voucher}',
                        num_operacion = '{$data->num_operacion}',
                        fecha_registro = current_timestamp(),
                        estado = '{$data->estado}',
                        especialidadr = '{$data->especialidadr}',
                        ugelr = '{$data->ugelr}',
                        tipo_personar = '{$data->tipo_personar}',
                        decente_iddecente = '{$data->decente_iddecente}',
                        evento_idevento = '{$data->evento_idevento}'
            ";
            $result_query = self::ejecutar_una_consulta($query);
            $eval = false;
            if($result_query->rowCount() >= 1){
                $eval = true;
                $msj_sys="Se inserto en registro.";
            }
            return ["eval"=>$eval, "data"=>$data, "msj"=>$msj_sys];
        }


        /**
         *  Actulizar docente / organizador
         */
        protected function actualizarDecente_Model($data){
            $msj_sys = "No se actualizo en docente"; 
            $res = false;
            $msj_sys = "";
            $query = "UPDATE decente d
                        SET d.dni = '{$data->dni}',
                            d.nombre = '{$data->nombre}',
                            d.apellido = '{$data->apellido}',
                            d.celular = '{$data->celular}',
                            d.correo = '{$data->correo}',
                            d.especialidad = '{$data->especialidad}',
                            d.ugel = '{$data->ugel}',
                            d.tipo_persona_idtipo_persona = {$data->tipo_persona_idtipo_persona}
                        WHERE d.iddecente = '{$data->iddecente}' 
                    ";

            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                $res = true;
                $msj_sys = "Se actualizo el docente {$data->iddecente}"; 
            }
            return ['eval'=>$res, 'msj'=> $msj_sys ];
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