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
            // Traemos docente si existe
            $res_docente = $this->existeDocente($data->dni);
            $idevento = $this->obtenerEventoActivo();
            $res = false;
            $cvoucher = false;
            $res_ope = false;
            //id evento actual
            $data->evento_idevento = $idevento;
            if($res_docente["eval"]){
                //obteniendo id docente
                $data->decente_iddecente = $res_docente["data"]["iddecente"];
                // traemos registro si existe. Traemos ESTADO y idregistro
                $registro = $this->docenteRegistrado($data);
                //Si no está registrado.
                if(!$registro["eval"]){
                    if(!$this->existeNumOperacion($data)){
                        $res = $this->insertarRegistro($data);
                    }else{
                        $res_ope = true;
                    }
                }else{
                    $data->idregistro = $registro["data"]["idregistro"]; // id registro
                    $data->estado = $registro["data"]["estado"]; // estado registro
                    // Si esta registrado: hacer
                    //Si el registro esta VALIDADO aun
                    if($data->estado){
                        $cvoucher = false; // ya no admite cambiar el voucher por que ya esta validado
                    }else{
                        //actualizar numero de operacion mientras aun no se le valida al usuario (PENDIENTE)
                        if(!$this->existeNumOperacion($data)){
                            $res = $this->cambiarNumOperacion($data);
                            $cvoucher = true; // admite cambiar el voucehr por que aun no se validad
                        }else{
                            $res_ope = true;
                        }
                    }
                }
            }else{
                //insertar en docente y luego en registro
                if(!$this->existeNumOperacion($data)){
                    $res = $this->insertarDocente($data);
                    if($res){
                        $res_docente = $this->existeDocente($data->dni); // traer id docente creado
                        $data->decente_iddecente = $res_docente["data"]["iddecente"]; // id docente registrado
                        $res = $this->insertarRegistro($data);
                    }
                }else{
                    $res_ope = true;
                }
            }
            //return $res_docente["data"]["iddecente"];
            return ["eval"=>$res, "data"=>$data, "cvoucher" => $cvoucher, "operacion"=>$res_ope];
        }

        //Comprueba que el numero de operacion no se duplique en todos los registros. Esto debe ser únicos
        private function existeNumOperacion($data){
            if($data->num_operacion === ""){
                return false;
            }

            $res = false;
            $query = "SELECT idregistro, anio, num_operacion 
                        FROM registro 
                        WHERE num_operacion='{$data->num_operacion}' LIMIT 1";
            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                $res = true;
            }
            return $res;
        }

        private function cambiarNumOperacion($data){
            $res = false;
            $query = "UPDATE registro 
                        SET num_operacion='{$data->num_operacion}' 
                        WHERE idregistro = '{$data->idregistro}'";
            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                $res = true;
            }
            return $res;
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
            $res_data = [];
            $query = "SELECT idregistro, estado 
                        FROM registro r 
                        WHERE r.decente_iddecente = '{$data->decente_iddecente}' 
                        AND r.evento_idevento = '{$data->evento_idevento}' LIMIT 1";
            $res_query = self::ejecutar_una_consulta($query);
            if ($res_query->rowCount()) {
                # code...
                $res = true;
                while ($elem = $res_query->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    $res_data = $elem;
                }
                //$data = $res_query->fetch(PDO::FETCH_ASSOC);
            }
            return ["eval"=>$res, "data"=> $res_data];
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
            $data = [];
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
            $query = "SELECT d.iddecente,d.dni,d.nombre,d.apellido, r.idregistro FROM decente d INNER JOIN registro r on d.iddecente = r.decente_iddecente AND r.evento_idevento = {$idevento} AND d.dni = '{$data->dni}'";
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
         * Validar docente
         */
        protected function exeTraerDocenteEvento_Model($data){
            $res = false;
            $data_res = [];
            $idevento = $this->obtenerEventoActivo();
            $query = "SELECT d.iddecente,d.dni,d.nombre,d.apellido, d.celular, r.idregistro, r.ruta_voucher, r.num_operacion, r.fecha_registro, r.estado 
            FROM decente d INNER JOIN registro r 
            on d.iddecente = r.decente_iddecente 
            AND r.evento_idevento = {$idevento} 
            AND d.dni LIKE '%{$data->dni}%' 
            AND d.nombre LIKE '%{$data->nombre}%' 
            AND d.apellido LIKE '%{$data->apellido}%' ORDER BY r.estado ASC";

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
         * validar registro. 
         */
        protected function exeValidarRegistro_Model($data){
            $res = false;
            $estado = ($data->estado==="0")? "1":"0";
            $idevento = $this->obtenerEventoActivo();
            $query = "UPDATE registro r 
                    SET r.estado='{$estado}' 
                    WHERE r.idregistro = '{$data->idregistro}' 
                    AND r.decente_iddecente = '{$data->iddecente}' 
                    AND r.evento_idevento = '{$idevento}'";

            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                $res = true;
            }
            return ['eval'=>$res, 'data'=>$data];
        }

        /**
         * Eliminar registro
         */
        protected function exeeliminarRegistro_Model($data){
            $res = false;
            $msj = "";
            //cuando el registro no está validado
            if(!$data->estado){
                $res = $this->eliminarControl($data);
                $msj .= $res? "Se Eliminó Control.":"No se eliminó Control.";
                //eliminar registro del evento actual
                $res = $this->eliminarRegistro($data);
                $msj .= $res? "\n Se Eliminó Registro.":"\n No se eliminó Registro.";
                // eliminar docente
                if($res){
                    $res = $this->eliminarDocente($data);
                    $msj .= $res? "\n Se Eliminó docente.":"\n No se eliminó docente.";
                }
            }

            return ['eval'=>$res, 'data'=>$data, "msj" => $msj];
        }

        private function eliminarControl($data){
            $res = false;
            $query = "DELETE FROM control 
                    WHERE registro_idregistro='{$data->idregistro}'";
            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                $res = true;
            }
            return $res;
        }

        private function eliminarRegistro($data){
            $idevento = $this->obtenerEventoActivo();
            $res = false;
            $query = "DELETE FROM registro 
                    WHERE idregistro='{$data->idregistro}' 
                    AND evento_idevento = '{$idevento}'";
            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                $res = true;
            }
            return $res;
        }
        private function eliminarDocente($data){
            $res = false;
            $query = "DELETE FROM decente
                    WHERE iddecente='{$data->iddecente}' ";
            $result_query = self::ejecutar_una_consulta($query);
            if($result_query->rowCount() >= 1){
                $res = true;
            }
            return $res;
        }



        /**
         * Modulo asistencia docente
         */
        protected function exedocenteAsistencia_Model($data){
            
            // el docente esta registrado en el evento actual. Esto se valida en el formulario.
            // datos que llegan aquí 

            $res = false;
            $sis_msj = "";
            $sis_ctrl_reg = true; // Poner en 'false' para que funcione el control de validacion de docente.
            
            $anio = date("Y");
            $control_dia=0;
            $control_asistencia=0;

            // El registro del docente está validado?
            $reg_val = $this->registroValidado($data->registro_idregistro);
            
            if($reg_val || $sis_ctrl_reg){
                //obtener registro de control, y validar su registro de acuerdo a la fecha acual ingresada. 
                // verifica si ya registró su asistencia en el intervalo de tiempo programado
                $res_ctrl = $this->controlAsistenciaControl($data->registro_idregistro);
                $sis_msj = $res_ctrl["sis_msj"];
                if(!$res_ctrl["eval"]){
                    $query = "INSERT INTO control SET 
                                anio = '{$anio}',
                                fecha_registro = current_timestamp(),
                                control_dia = '{$control_dia}',
                                control_asistencia = '{$control_asistencia}',
                                registro_idregistro = '{$data->registro_idregistro}'
                    ";
                    $result_query = self::ejecutar_una_consulta($query);
                    if($result_query->rowCount() >= 1){
                        $sis_msj = "Asistencia Registrada!";
                        $res = true;
                    }else{
                        $sis_msj = "No se inserto ningún dato.";
                    }
                }
            }else{
                $sis_msj = "Falta validar su registro";
            }
         
            return ['eval'=>$res, 'data'=>$data, "sis_msj"=>$sis_msj];

        }
        //----
        public function controlAsistenciaControl($idregistro){
            // El idregistro, ya está validado que pertenece al evento actual.
            $res = false;
            $sis_msj = "";
            $anio = date("Y");
            $fecha_actual = date("Y-m-d H:i:s");
            $fecha_temprano = [date("Y-m-d")." 09:00:00", date("Y-m-d")." 13:00:00"];
            $fecha_tarde = [date("Y-m-d")." 13:59:00", date("Y-m-d")." 17:00:00"];

            $f_entrada="";
            $f_salida="";
            //entonecs traemos las fechas registradas del registro en cotrol
            
            if($fecha_actual > $fecha_temprano[0] && $fecha_actual < $fecha_temprano[1]){
                # code...
                // echo "entro mania";
                $f_entrada = $fecha_temprano[0];
                $f_salida = $fecha_temprano[1];
            }
            elseif ($fecha_actual > $fecha_tarde[0] && $fecha_actual < $fecha_tarde[1]) {
                # code...
                // echo "entro tared";
                $f_entrada = $fecha_tarde[0];
                $f_salida = $fecha_tarde[1];
            } else {
                # code...
                $sis_msj = "La asistencia aun no está habilitada";
                $res = true;
            }

            if($sis_msj === "" || true){
                $query = "SELECT * FROM control c 
                            WHERE c.fecha_registro > '{$f_entrada}' 
                            AND c.fecha_registro < '{$f_salida}' 
                            AND C.registro_idregistro = '{$idregistro}'
                            AND c.anio = '{$anio}'
                        ";
                $res_q = self::ejecutar_una_consulta($query);
                if($res_q->rowCount() >= 1){
                    $res = true;   
                    $sis_msj = "El docente ya registró su asistencia";
                }else{
                    $res = false; 
                    $sis_msj = "El docente aun no registro su asistencia";
                }
            }

            return ["eval"=>$res, "sis_msj"=>$sis_msj];

        }
        //---
        private function registroValidado($idregistro){
            $res = false;
            $data_estado = "0";
            $query = "SELECT estado FROM registro r WHERE r.idregistro = '{$idregistro}'";
            $res_q = self::ejecutar_una_consulta($query);
            if($res_q->rowCount() >= 1){
                while ($elem = $res_q->fetch(PDO::FETCH_ASSOC)) {
                    # code...
                    $data_estado = $elem["estado"];
                }
                if($data_estado === "1"){
                    $res = true;
                }
            }
         
            return $res;
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