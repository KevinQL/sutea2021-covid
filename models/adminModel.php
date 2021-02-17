<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/mainModel.php";
    }else{
        require_once "./models/mainModel.php";
    }

    class adminModel extends mainModel{        

        /**
         * 
         */
        protected function insert_user_Model($data){
            $query = "INSERT INTO usuario SET 
                        usuario = '{$data->usuario}',
                        password = '{$data->password}',
                        dni = '{$data->dni}',
                        nombre = '{$data->nombre}',
                        apellido = '{$data->apellido}',
                        celular = '{$data->celular}',
                        email = '{$data->email}',
                        tipo_usuario = {$data->tipo_usuario},
                        intentos = '{$data->intentos}'
                        ";
            //verificar si el usuario ya existe. Programarlo, o configurar en el modelo de db a unique
            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                return ['eval'=>true, 'data'=> $data];
            }else{
                return ['eval'=>false, 'data'=> null];
            }
            
        }
        
        /**
         * 
         */
        protected function session_user_Model($user,$password){
            $query = "SELECT * FROM usuario u WHERE u.usuario='{$user}' AND u.tipo_usuario=1";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                while($user_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    //verifica que la contrasenia sea correspondida
                    if($this->encriptar_desencriptar($password, $user_fla['password'])){
                        $data = $user_fla;
                        $eval = true;
                    }
                }             
            }
            return ['eval'=>$eval, 'data'=>$data];
        }



        /**
         *
         */
        protected function traerInfoDocente_Model($data){
            $eval = false;
            $docente = [];
            
            $query = "SELECT * FROM decente d WHERE d.dni = '{$data->dni}'";
            $res_query = self::ejecutar_una_consulta($query);
            if($res_query->rowCount() >= 1){
                while ($elem_doc = $res_query->fetch(PDO::FETCH_ASSOC)) {
                    $docente[] = $elem_doc;
                }
                $eval = true;
            }
            return ['eval'=>$eval, 'data'=>$docente];
        }

        /**
         * 
         */
        protected function exeInscripcion_Model($data){
            $res_docente = $this->existeDocente($data->dni);
            $idevento = $this->obtenerEventoActivo();
            $res = false;
            $cvoucher = false;

            $data->evento_idevento = $idevento;
            if($res_docente["eval"]){
                $data->decente_iddecente = $res_docente["data"]["iddecente"];
                //verificar si ya esta registrado
                if(!$this->docenteRegistrado($data)){
                    $res = $this->insertarRegistro($data);
                }else{
                    //actualizar numero de operacion mientras aun no se le valida al usuario (PENDIENTE)
                    //actualizar voucher en el caso de que no ha sido VALIDADO aun
                    if($this->estadoVoucher($data)){
                        $cvoucher = false; // ya no admite cambiar el voucher por que ya esta validado
                    }else{
                        $cvoucher = true; // admite cambiar el voucehr por que aun no se validad
                    }
                }
            }else{
                //insertar en docente y luego en registro
                $res = $this->insertarDocente($data);
                if($res){
                    $res_docente = $this->existeDocente($data->dni);
                    $data->decente_iddecente = $res_docente["data"]["iddecente"];
                    $res = $this->insertarRegistro($data);
                }
            }
            //return $res_docente["data"]["iddecente"];
            return ["eval"=>$res, "data"=>$data, "cvoucher" => $cvoucher];
        }

        //Verifica el estado del voucher, o el registro del docente. Si su registro es valido o no.
        private function estadoVoucher($data){
            $res = false;
            $estado = 0;
            $query = "SELECT estado FROM registro r WHERE r.decente_iddecente = '{$data->decente_iddecente}' AND r.evento_idevento = '{$data->evento_idevento}'";
            $res_query = self::ejecutar_una_consulta($query);
            if ($res_query->rowCount()) {
                # code...
                while ($elem = $res_query->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    $estado = $elem["estado"];
                }
            }
            if($estado){
                $res = true;
            }
            return $res;
        }

        private function docenteRegistrado($data){
            $res = false;
            $query = "SELECT * FROM registro r WHERE r.decente_iddecente = '{$data->decente_iddecente}' AND r.evento_idevento = '{$data->evento_idevento}'";
            $res_query = self::ejecutar_una_consulta($query);
            if ($res_query->rowCount()) {
                # code...
                $res = true;
            }
            return $res;
        }

        private function insertarDocente($data){
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
            }
            return $eval;
        }

        private function insertarRegistro($data){
            $query = "INSERT INTO registro SET 
                        anio = '{$data->anio}',
                        ruta_voucher = '{$data->ruta_voucher}',
                        type_voucher = '{$data->type_voucher}',
                        num_operacion = '{$data->num_operacion}',
                        fecha_registro = current_timestamp(),
                        estado = '{$data->estado}',
                        decente_iddecente = '{$data->decente_iddecente}',
                        evento_idevento = '{$data->evento_idevento}'
            ";
            $result_query = self::ejecutar_una_consulta($query);
            $eval = false;
            if($result_query->rowCount() >= 1){
                $eval = true;
            }
            return $eval;
        }

        //Suponiendo que el ultimo evento insertado es el evento activo
        private function obtenerEventoActivo(){
            $query = "SELECT idevento FROM evento ORDER BY anio, idevento DESC LIMIT 1";
            $res_query = self::ejecutar_una_consulta($query);
            if ($res_query->rowCount()) {
                # code...
                while ($elem = $res_query->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    return $elem["idevento"];
                }
            }else{
                return 0;
            }
        }

        private function existeDocente($dni){
            $res = false;
            $data = null;
            $query = "SELECT iddecente, dni FROM decente d WHERE d.dni = '{$dni}' LIMIT 1";
            $res_query = self::ejecutar_una_consulta($query);
            if($res_query->rowCount() >= 1){
                $res = true;
                while ($elem = $res_query->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    $data = $elem;
                }
            }
            return ["eval"=>$res, "data"=>$data];
        }


        /**
         * Asistencia docente
         */
        protected function exeTraerDocenteAsis_Model($data){
            $res = false;
            $data_res = [];
            $idevento = $this->obtenerEventoActivo();
            $query = "SELECT d.iddecente,d.dni,d.nombre,d.apellido FROM decente d INNER JOIN registro r on d.iddecente = r.decente_iddecente AND r.evento_idevento = {$idevento} AND d.dni = '{$data->dni}'";
            $res_q = self::ejecutar_una_consulta($query);
            if($res_q->rowCount()){
                $res = true;
                while ($elem = $res_q->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    $data_res[] = $elem;
                }
            }
            return ["eval"=>$res, "data"=>$data_res];
        }

        /**
         * --------------------------------------------- 
         */
        protected function insert_slider_Model($data){
            $query = "UPDATE slider SET fecha_txt='{$data->fecha_txt}' WHERE id_slider = 1";
            $result_query = self::ejecutar_una_consulta($query);
            $eval = false;
            if($result_query->rowCount() >= 1){
                $eval = true;
            }
            return ['eval'=>$eval, 'data'=>$data];
        }

        /**
         * 
         */
        protected function delete_curso_Model($id_curso){
            $eval = false;
            $query = "DELETE FROM curso WHERE id_curso='{$id_curso}'";
            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                $eval = true;
            }
            return ['eval'=>$eval, 'data'=>null];
        }

        
        //-------------------------------------------------------------------------------
        /**
         * (IMPORTANTE)
         * si es verad encripta y sino desencripta
         * @param boolean $encriptar
         * Contraseña a encriptar o desencriptar
         * @param string $password
         * @return string boolean
         * 
         * Función que encripta y desencripta
         */        
        protected function encriptar_desencriptar($password,$password_db){
            if(trim($password_db) === ''){
                return password_hash($password, PASSWORD_DEFAULT);//Encripta (SOLO se necesita el PRIMER parametro.EJEM: ->fn('pass','')<-)
            }else{
                return password_verify($password,$password_db);//desencripta (SOLO cuando los DOS parametros tengan valor)
            }
        }



    }

?>