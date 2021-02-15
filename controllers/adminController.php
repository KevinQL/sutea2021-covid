<?php    

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/adminModel.php";
    }else{
        require_once "./models/adminModel.php";
    }

    class adminController extends adminModel{

        /**
         * VERIFICADO
         * (IMPORTANTE)
         */
        public function verificarSessionController(){
            $session = (isset($_SESSION['start']) && !empty($_SESSION['start']) &&!is_null($_SESSION)) ? true:false;
            return $session;
        }


        /**
         * VERIFICADO
         * (IMPORTANTE)
         */
        public function administrarPaginasController($session){

            //Cuando la sessión sea VERDADERA
            if($session){
                
                $pagina = isset($_GET['pg']) && !empty($_GET['pg']) ? $_GET['pg'] : "page_sutep";
                $pagina = strtolower(trim($pagina));   

                //por si es 'login'. cambiamos a 'inicio'
                $pagina = ($pagina != "login")? $pagina : "inicio"; //Agregado ultimo

                //Validando niveles de seguridad. [1]:NIVEL ADMINISTRADOR
                if($_SESSION['data']['tipo_usuario']==1){
                    $arrayPaginas = ["salir_sistema","inicio","page_sutep","info","inscripcion_evento"];
                }else{
                    //Nivel invitado pro defecto
                    $arrayPaginas = ["salir_sistema","inicio","page_sutep","info","inscripcion_evento"];
                }              
                
                /**
                 * Solo en caso de que esté logueado; verifica pagina seleccionada, y luego lo redirige.
                 * Si no coincide con ninguna página, te ridirecciona a la página de Inicio.php
                 */
                if(in_array($pagina, $arrayPaginas, true)){
                    $pagina .= ".php";
                }else {
                    $pagina = "inicio.php";
                }

            }else{
                //CUANDO LA SESSIÓN NO EXISTA
                //Presentación de la página principal

                $pagina = isset($_GET['pg']) && !empty($_GET['pg']) ? $_GET['pg'] : "page_sutep";
                $pagina = strtolower(trim($pagina));                          
                $arrayPaginas = ['login',"usuario_registro", "inscripcion_evento", "info", "assistance", "certification", "speakers"];

                if(in_array($pagina, $arrayPaginas, true)){
                    $pagina .= ".php";
                }else {
                    $pagina = "page_sutep.php";
                }                
            
            }  

            return $pagina;

        }

        /***
         * 
         * 
         * SUTEP 2021 
         */
        public function saveimg_Controller($data, $file){
            $dataModel = new stdClass;

            $dataModel->nombre = $this->txtres($data->txt_nombrev);
            $dataModel->dni = $this->txtres($data->txt_dniv);
            $dataModel->url_img = $this->txtres($data->nameIMG); //tratar nombre imagen

            //$res_model = self::insert_curso_Model($dataModel);
            
            $res_img = $this->guardar_img($file, './../public/curso_files/imgtest-', $dataModel->url_img);
            
            if($res_img ){
                return ['eval'=>true, 'data'=>$dataModel];
            }else{
                return ['eval'=>false, 'data'=>null];
            }

        }


        public function traerInfoDocente_Controller($data){
            $dataModel = new stdClass;
            $dataModel->dni = $this->txtres($data->txt_documentv);

            $res = self::traerInfoDocente_Model($dataModel);
            return $res;
        }

        public function exeInscripcion_Controller($data, $img_voucher){
            $dataModel = new stdClass;
            $dataModel->dni = $this->txtres($data->txt_documentv);
            $dataModel->nombre = $this->txtres($data->txt_namev);
            $dataModel->apellido = $this->txtres($data->txt_lastNamev);
            $dataModel->celular = $this->txtres($data->txt_phonev);
            $dataModel->correo = $this->txtres($data->txt_emailv);
            $dataModel->especialidad = $this->txtres($data->txt_specialtyv);
            $dataModel->control_dia = 0;
            $dataModel->control_asistencia = 0;
            $dataModel->tipo_persona_idtipo_persona = 1; //asistente

            $dataModel->anio = date("Y"); //
            $dataModel->ruta_voucher = date("Y").$data->txt_documentv.".jpg"; //
            $dataModel->type_voucher = $img_voucher["type"]; //
            $dataModel->num_operacion = $this->txtres($data->txt_operationv); //
            $dataModel->fecha_registro = null; 
            $dataModel->estado = 0; //esto sirve para validar el voucher operacion 
            $dataModel->decente_iddecente = $this->txtres($data->txt_documentv); //
            $dataModel->evento_idevento = 100; // codigo del evento

            $res_model = self::exeInscripcion_Model($dataModel);
            //falta ordeanr el codigo de aaqui abajo
            $res_img = false;
            if($res_model["eval"] || $res_model["cvoucher"]){
                $res_img = $this->guardar_img($img_voucher, './../public/img_voucher/', $dataModel->ruta_voucher);
            }

            if ($res_img) {
                # code...
                return $res_model;
            }

            return $res_model;
        }

        // ----------------- ejem metodos controller
        /**
         * 
         */
        public function insert_user_Controller($data){
            $pass_hash = self::encriptar_desencriptar($this->txtres($data->txt_passwordv),'');
            $dataModel = new stdClass;            
            $dataModel->user = $this->txtres($data->txt_userv);
            $dataModel->password = $pass_hash;
            $dataModel->estado = 1; //1. activo 0. inactivo
            $res_model = self::insert_user_Model($dataModel);     
            return $res_model;
        }

        /**
         * 
         */
        public function session_user_Controller($data){

            $user = $this->txtres($data->txt_userv);
            $password = $this->txtres($data->txt_passwordv);
            //enviado datos al modelo
            $res_model = self::session_user_Model($user,$password);
            //evaluando resultados
            if($res_model['eval']){           
                
                $data_user = $res_model['data'];
                //Iniciando session
                session_start();
                $_SESSION['start']=true;
                $_SESSION['data']=$data_user;
                
                return ['eval'=>true,'data'=>$data_user];                
            }else{
                return ['eval'=>false,'data'=>[]];
            }            
        }
        /**
         * 
         */
        public function insert_slider_Controller($data, $file){
            
            $dataModel = new stdClass;

            $dataModel->fecha_txt = $this->txtres($data->txt_fechav);

            $res_model = self::insert_slider_Model($dataModel);

            $res_img = $this->guardar_img($file, './../public/slider_files/iduser-', 'slider.png');

            if( $res_model['eval'] && $res_img ){
                return $res_model;
            }else{
                return ['eval'=>false,'eval_img'=>$res_img, 'data'=>null];
            }
        }       
        /**
         * 
         */
        public function insert_curso_Controller($data, $file){
            $dataModel = new stdClass;

            $dataModel->nombre_curso = $this->txtres($data->txt_carrerav);
            $dataModel->fecha_txt = $this->txtres($data->txt_fechav);
            $dataModel->costo = $this->txtres($data->txt_costov);
            $dataModel->orden = $this->txtres($data->ordenSelectv);
            $dataModel->url_img = $this->txtres($data->nameIMG); //tratar nombre imagen

            $res_model = self::insert_curso_Model($dataModel);
            
            $res_img = $this->guardar_img($file, './../public/curso_files/iduser-', $dataModel->url_img);
            
            if( $res_model['eval'] && $res_img ){
                return $res_model;
            }else{
                return ['eval'=>false, 'data'=>null];
            }
            /*
            */            

        }          
        /**
         * 
         */
        public function select_curso_Controller($data){
            $txt_search = $this->txtres($data->txt_search);            
            $res_model = self::select_curso_Model($txt_search);
            return $res_model;
        }
        /**
         * 
         */
        public function delete_curso_Controller($data){
            $id_curso = $this->txtres($data->id_curso);            
            $res_model = self::delete_curso_Model($id_curso);
            return $res_model;
        }

        // fin ejemplo metodos controller



        //------------------------------------------------------------------------------

        /**
         * Función para guardar imagenes en el servidor
         */        
        private function guardar_img($file, $dir_destino, $name){
            $resultado = move_uploaded_file($file['tmp_name'], $dir_destino . $name); 
            return $resultado;
        }
        /**
         * (IMPORTANTE)
         * Datos del usuario actual REGISTRADO o LOGUEADO
         */
        private function usuario(){
            session_start();
            return $_SESSION['data'];
        }


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