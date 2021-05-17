<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/mainModel.php";
    }else{
        require_once "./models/mainModel.php";
    }

    class certificadoModel extends mainModel{     

        /**
         * 
         */
        protected function eliminarTemas_Model($data){
            $msj_sys = "No se Elimino tema {$data->idtemario_certificado}";
            $eval = false;

            $query = "DELETE FROM temario_certificado
                    WHERE idtemario_certificado = '{$data->idtemario_certificado}'
                ";
            $result = mainModel::ejecutar_una_consulta($query);
            if($result->rowCount() >= 1){
                $eval = true; 
                $msj_sys = "Se elimino tema {$data->idtemario_certificado}!!";
            }
            
            return ["eval"=>$eval, "msj"=>$msj_sys];
        }


        /**
         * getTemasCertificate_Model
         */
        protected function getTemasCertificate_Model($data){
            $msj_sys = "No se obtubo temario certificado";
            $eval = false;
            $data_res;

            $query = "SELECT * FROM temario_certificado tc
                    WHERE tc.certificado_idcertificado = '{$data->certificado_idcertificado}'
                ";
            $result = mainModel::ejecutar_una_consulta($query);
            if($result->rowCount() >= 1){
                $eval = true;
                $msj_sys = "Se obtubo temario certificado!!";
                while ($regis_fla = $result->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    $data_res[] = $regis_fla;
                }
            }
            
            return ["eval"=>$eval,"data"=>$data_res, "msj"=>$msj_sys];
        }

        /**
         * 
         */
        protected function getCertificado_Model($data){
            $msj_sys = "No se obtubo certificado";
            $eval = false;
            $data_res;

            $query = "SELECT * FROM certificado c
                    WHERE c.evento_idevento = '{$data->evento_idevento}'
                    AND c.tipo_persona_idtipo_persona = '{$data->tipo_persona_idtipo_persona}'
                ";
            $result = mainModel::ejecutar_una_consulta($query);
            if($result->rowCount() >= 1){
                $eval = true;
                $msj_sys = "Se obtubo data certificado!!";
                while ($regis_fla = $result->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    $data_res[] = $regis_fla;
                }
            }
            
            return ["eval"=>$eval,"data"=>$data_res[0], "msj"=>$msj_sys];
        }
        
        
        /**
         * 
         */
        protected function obtenerContenido_Model($data){
            $msj_sys = "No se obtubo contenido";
            $eval = false;
            $data_res;

            $query = "SELECT c.contenido_principal FROM certificado c
                    WHERE c.evento_idevento = '{$data->evento_idevento}'
                    AND c.tipo_persona_idtipo_persona = '{$data->tipo_persona_idtipo_persona}'
                ";
            $result = mainModel::ejecutar_una_consulta($query);
            if($result->rowCount() >= 1){
                $eval = true;
                $msj_sys = "Se obtubo el contenido!!";
                while ($regis_fla = $result->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    $data_res = $regis_fla;
                }
            }
            
            return ["eval"=>$eval,"data"=>$data_res, "msj"=>$msj_sys];
        }


        /**
         * 
         */
        protected function guardarContenido_Model($data){
            $msj_sys = "No se actualizó contenido";
            $eval = false;

            $query = "UPDATE certificado c
                    SET c.contenido_principal = '{$data->contenido_principal}'
                    WHERE c.evento_idevento = '{$data->evento_idevento}'
                    AND c.tipo_persona_idtipo_persona = '{$data->tipo_persona_idtipo_persona}'
                ";
            $result = mainModel::ejecutar_una_consulta($query);
            if($result->rowCount() >= 1){
                $eval = true;
                $msj_sys = "Se actualizó el contenido!!";
            }
            
            return ["eval"=>$eval, "msj"=>$msj_sys];
        }

        /**
         * 
         */
        protected function actuaizarRuta_Model($data){
            $msj_sys = "No se actualizó la ruta!";
            $eval = false;

            $query = "UPDATE certificado c
                    SET c.ruta = '{$data->ruta}'
                    WHERE c.evento_idevento = '{$data->evento_idevento}'
                    AND c.tipo_persona_idtipo_persona = '{$data->tipo_persona_idtipo_persona}'
                ";
            $result = mainModel::ejecutar_una_consulta($query);
            if($result->rowCount() >= 1){
                $eval = true;
                $msj_sys = "Se actualizó la ruta del certificado!!";
            }
            
            return ["eval"=>$eval, "msj"=>$msj_sys];
        }

        /**
         * 
         */
        public function cambiarEstadoCertificado_Model($data){
            $msj_sys = "El estado no se actualizó";
            $eval = false;

            $query = "UPDATE certificado c 
                    SET c.estado = '{$data->estado}'
                    WHERE c.evento_idevento = '{$data->evento_idevento}'
                    AND c.tipo_persona_idtipo_persona = '{$data->tipo_persona_idtipo_persona}'
            ";

            $result = mainModel::ejecutar_una_consulta($query);

            if($result->rowCount() >= 1){
                $msj_sys = "El estado se atulizó";
                $eval = true;
            }
            
            return ["eval"=>$eval, "msj"=>$msj_sys];
        }


        protected function temasCertificado_Model($data){
            $msj_sys = "No se encotró temas";

            //TIENE QUE RETORNAR EL REGISTR MÁS ACTUAL POSIBLE.Si es posible corregir el ORDER BY del query
            $query = "SELECT * FROM temario_certificado tc 
                WHERE tc.certificado_idcertificado = '{$data->certificado_idcertificado}'
            ";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                $msj_sys = "Se encontró temas.";
                $eval = true;
                while($regis_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    // code
                    $data[] = $regis_fla;
                }             
            }
            return ['eval'=>$eval, 'data'=>$data, 'msj'=>$msj_sys];
        }


        protected function dataCertificado_Model($data){
            $msj_sys = "No se encotró el certificado";

            //TIENE QUE RETORNAR EL REGISTR MÁS ACTUAL POSIBLE.Si es posible corregir el ORDER BY del query
            $query = "SELECT * FROM certificado c
                    WHERE c.tipo_persona_idtipo_persona = '{$data->tipo_persona_idtipo_persona}'
                    AND c.evento_idevento = '{$data->evento_idevento}'
                ";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                $msj_sys = "Se encontró certificado.";
                $eval = true;
                while($regis_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    // code
                    $data[] = $regis_fla;
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