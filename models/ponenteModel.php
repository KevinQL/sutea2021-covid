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
        protected function actualizarPonente_Model($data){
            $msj_sys = "No se actualizó Ponente.";
            //TIENE QUE RETORNAR EL REGISTR MÁS ACTUAL POSIBLE.Si es posible corregir el ORDER BY del query
            $query = "UPDATE
                        ponente p 
                        SET p.dni = '{$data->dni}',
                            p.nombre = '{$data->nombre}',
                            p.apellido = '{$data->apellido}',
                            p.observacion = '{$data->observacion}'
                        WHERE p.idponente = '{$data->idponente}'
                        AND p.evento_idevento = '{$data->evento_idevento}'
                ";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;

            if($result->rowCount() >= 1){
                $msj_sys = "Se encontró ponente.";
                $eval = true;                
            }
            return ['eval'=>$eval, 'msj'=>$msj_sys];
        }


        /**
         * 
         */
        protected function obtenerPonenteId_Model($data){
            $msj_sys = "No se encontro Ponente.";
            //TIENE QUE RETORNAR EL REGISTR MÁS ACTUAL POSIBLE.Si es posible corregir el ORDER BY del query
            $query = "SELECT *
                FROM ponente p 
                WHERE p.idponente LIKE '{$data->idponente}'
                AND p.evento_idevento = '{$data->evento_idevento}'
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
        protected function eliminarPonente_Model($data){
            $msj_sys = "No se elimino ponente";
            $query = "DELETE FROM ponente WHERE idponente = '{$data->idponente}'";

            $result_query = mainModel::ejecutar_una_consulta($query);
            $eval = false;
            if($result_query->rowCount() >= 1){
                $eval = true;
                $msj_sys = "Se eliminó el ponente";
            }

            return ["eval"=>$eval, "msj"=>$msj_sys];
        }


        /**
         * 
         */
        protected function crearPonente_Model($data){

            $msj_sys="No se inserto en ponente";
            $query = "INSERT INTO ponente SET 
                        dni = '{$data->dni}',
                        nombre = '{$data->nombre}',
                        apellido = '{$data->apellido}',
                        observacion = '{$data->observacion}',
                        ruta_archivos = '{$data->ruta_archivos}',
                        ruta_foto = '{$data->ruta_foto}',
                        anio = '{$data->anio}',
                        estado = '{$data->estado}',
                        evento_idevento = '{$data->evento_idevento}'
            ";
            $result_query = self::ejecutar_una_consulta($query);
            $eval = false;
            if($result_query->rowCount() >= 1){
                $eval = true;
                $msj_sys = "Se inserto en ponente";
            }
            return ["eval"=>$eval, "data"=>$data, "msj"=>$msj_sys];

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