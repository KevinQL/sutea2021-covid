<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/organizadorModel.php";
    }else{
        require_once "./models/organizadorModel.php";
    }


    class organizadorController extends organizadorModel{

        /**
         * 
         */
        public function actualizarRegistroUPD_controller($data){
            $dataModel = new StdClass;
            // $dataModel->anio = $this->txtres("");
            // $dataModel->ruta_voucher = $this->txtres("");
            // $dataModel->type_voucher = $this->txtres("");
            // $dataModel->num_operacion = $this->txtres("");
            // $dataModel->fecha_registro = "";
            $dataModel->estado = $this->txtres($data->estado_updv);
            $dataModel->especialidadr = $this->txtres($data->nivel_updv);
            $dataModel->ugelr = $this->txtres($data->ugel_updv);
            $dataModel->tipo_personar = $this->txtres($data->tipo_persona_updv);
            $dataModel->decente_iddecente = $this->txtres($data->iddecente_updv);
            $dataModel->evento_idevento = $this->txtres($data->id_eventoActivo);

            $res = self::actualizarRegistroUPD_Model($dataModel);

            return $res;
        }


        /**
         * 
         */
        public function actualizarDecenteUPD_controller($data){
            $dataModel = new StdClass;
            $dataModel->iddecente = $this->txtres($data->iddecente_updv);
            $dataModel->dni = $this->txtres($data->dni_updv);
            $dataModel->nombre = $this->txtres($data->nombre_updv);
            $dataModel->apellido = $this->txtres($data->apellido_updv);
            $dataModel->celular = $this->txtres($data->celular_updv);
            $dataModel->correo = $this->txtres($data->correo_updv);
            $dataModel->especialidad = $this->txtres($data->nivel_updv);
            $dataModel->ugel = $this->txtres($data->ugel_updv);
            $dataModel->tipo_persona_idtipo_persona = $this->txtres($data->tipo_persona_updv);

            $res = self::actualizarDecente_Model($dataModel);

            return $res;
        }



        /**
         * Insertar Organzador
         */
        public function insertarDecente_controller($data){
            $dataModel = new StdClass;
            $dataModel->dni = $this->txtres($data->dni_cv);
            $dataModel->nombre = $this->txtres($data->nombre_cv);
            $dataModel->apellido = $this->txtres($data->apellido_cv);
            $dataModel->celular = $this->txtres($data->celular_cv);
            $dataModel->correo = $this->txtres($data->correo_cv);
            $dataModel->especialidad = $this->txtres($data->nivel_cv);
            $dataModel->ugel = $this->txtres($data->ugel_cv);
            $dataModel->control_dia = 0;
            $dataModel->control_asistencia = 0;
            $dataModel->tipo_persona_idtipo_persona = $this->txtres($data->tipo_persona);

            $res = self::insertarDecente_Model($dataModel);

            return $res;
        }


        /**
         * 
         */
        public function insertarRegistro_controller($data){
            $dataModel = new StdClass;
            $dataModel->anio = $this->txtres(date("Y"));
            $dataModel->ruta_voucher = $this->txtres("");
            $dataModel->type_voucher = $this->txtres("");
            $dataModel->num_operacion = $this->txtres("");
            $dataModel->fecha_registro = "";
            $dataModel->estado = $this->txtres($data->estado_cv);
            $dataModel->especialidadr = $this->txtres($data->nivel_cv);
            $dataModel->ugelr = $this->txtres($data->ugel_cv);
            $dataModel->tipo_personar = $this->txtres($data->tipo_persona);
            $dataModel->decente_iddecente = $this->txtres($data->id_decente);
            $dataModel->evento_idevento = $this->txtres($data->id_eventoActivo);

            $res = self::insertarRegistro_Model($dataModel);

            return $res;
        }


        /**
         * 
         */
        public function actualizarDecente_controller($data){
            $dataModel = new StdClass;
            $dataModel->iddecente = $this->txtres($data->id_decente);
            $dataModel->dni = $this->txtres($data->dni_cv);
            $dataModel->nombre = $this->txtres($data->nombre_cv);
            $dataModel->apellido = $this->txtres($data->apellido_cv);
            $dataModel->celular = $this->txtres($data->celular_cv);
            $dataModel->correo = $this->txtres($data->correo_cv);
            $dataModel->especialidad = $this->txtres($data->nivel_cv);
            $dataModel->ugel = $this->txtres($data->ugel_cv);
            $dataModel->tipo_persona_idtipo_persona = $this->txtres($data->tipo_persona);

            $res = self::actualizarDecente_Model($dataModel);

            return $res;
        }


        
        /**
         * ****************************************
         * METODOS DE ACCESO RAPIDO.
         */

        //
        public function EsDniDocenteDuplicado_Controller($dni, $id_decente){
            $msj_sys = "No se encontraron duplicados.";
            
            $query = "SELECT * FROM decente d 
                    WHERE d.dni = '{$dni}' 
                    AND d.iddecente != {$id_decente} 
                ";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                $msj_sys = "Se encontraron duplicados en el dni.";
                $eval = true;
                while($user_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    $data[] = $user_fla;
                }             
            }
            return ['eval'=>$eval, 'data'=>$data, 'msj'=>$msj_sys];
        }

        //
        public function obtenerOrganizador_idRegistro_Controller($idregistro){
            $msj_sys = "No se encontraron organizadores.";
            //TIENE QUE RETORNAR EL REGISTR MÁS ACTUAL POSIBLE.Si es posible corregir el ORDER BY del query
            $query = "SELECT d.*, r.idregistro, r.anio, r.especialidadr, r.ugelr, r.fecha_registro, r.evento_idevento, r.estado
                FROM registro r 
                RIGHT JOIN decente d 
                ON r.decente_iddecente = d.iddecente
                WHERE r.tipo_personar = '2'
                AND r.idregistro = '{$idregistro}'
            ";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                $msj_sys = "Se encontraron organizadores.";
                $eval = true;
                while($user_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    //verifica que la contrasenia sea correspondida
                    if($user_fla["idregistro"] != null){
                        $data[] = $user_fla;
                    }else{

                    }
                }             
            }
            return ['eval'=>$eval, 'data'=>$data, 'msj'=>$msj_sys];
        }

        //
        public function obtenerOrganizadores_Controller($dni, $nombre, $apellido, $idevento){
            $msj_sys = "No se encontraron organizadores.";
            //TIENE QUE RETORNAR EL REGISTR MÁS ACTUAL POSIBLE.Si es posible corregir el ORDER BY del query
            $query = "SELECT d.*, r.idregistro, r.anio, r.especialidadr, r.ugelr, r.fecha_registro, r.evento_idevento, r.estado
            FROM registro r 
            RIGHT JOIN decente d 
            ON r.decente_iddecente = d.iddecente
            WHERE d.dni LIKE '%{$dni}%' 
            AND d.nombre LIKE '%{$nombre}%'
            AND d.apellido LIKE '%{$apellido}%'
            AND r.tipo_personar = '2'
            AND r.evento_idevento = '{$idevento}'
            ORDER BY r.fecha_registro DESC
            ";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                $msj_sys = "Se encontraron organizadores.";
                $eval = true;
                while($user_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    //verifica que la contrasenia sea correspondida
                    if($user_fla["idregistro"] != null){
                        $data[] = $user_fla;
                    }else{

                    }
                }             
            }
            return ['eval'=>$eval, 'data'=>$data, 'msj'=>$msj_sys];
        }


        //-Trae decente y registro del docente
        public function obtenerDocenteDni_Controller($dni){
            $msj_sys = "No hay docente con el dni {$dni}";
            //TIENE QUE RETORNAR EL REGISTR MÁS ACTUAL POSIBLE.Si es posible corregir el ORDER BY del query
            $query = "SELECT d.*, r.anio, r.especialidadr, r.ugelr, r.fecha_registro, r.evento_idevento, r.estado
            FROM registro r 
            RIGHT JOIN decente d 
            ON r.decente_iddecente = d.iddecente
            WHERE d.dni = '{$dni}' 
            ORDER BY r.fecha_registro DESC LIMIT 1
            ";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                while($user_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    //verifica que la contrasenia sea correspondida
                    $data = $user_fla;
                    $eval = true;
                    $msj_sys = "Se obtubo docente con el dni {$dni}";
                }             
            }
            return ['eval'=>$eval, 'data'=>$data, 'msj'=>$msj_sys];
        }

        
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