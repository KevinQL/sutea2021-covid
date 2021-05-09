<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/ponenteModel.php";
    }else{
        require_once "./models/ponenteModel.php";
    }


    class ponenteController extends ponenteModel{

        
        /**
         * 
         */
        public function subirDocPonente_Controller($data){
            //creado carpeta en el caso de que no exista.
            $estructura = "../public/curso_files/evento-{$data->id_eventoActivo}/{$data->txt_dni_updv}/";
            $res_carpeta = mainModel::crear_carpeta($estructura);
            //guardar foto ponetne
            $res = mainModel::guardar_archvo($data->documento, $estructura, $data->documento["name"]);
            return $res;
        }


        /**
         * 
         */
        public function subirFotoPonente_Controller($data){
            //creado carpeta en el caso de que no exista.
            $estructura = "../public/ponentes/{$data->txt_dni_updv}/";
            $res_carpeta = mainModel::crear_carpeta($estructura);
            //guardar foto ponetne
            $res = mainModel::guardar_imagen($data->img_ponente, $estructura, "ponente.jpg");
            return $res;
        }


        /**
         * 
         */
        public function actualizarPonente_Controller($data){
            $dataModel = new StdClass;
            $dataModel->idponente = $data->txt_idponente_updv;
            $dataModel->dni = $data->txt_dni_updv;
            $dataModel->nombre = $data->txt_nombre_updv;
            $dataModel->apellido = $data->txt_apellido_updv;
            $dataModel->observacion = $data->txt_obs_updv;
            $dataModel->evento_idevento = $data->id_eventoActivo;

            $res = self::actualizarPonente_Model($dataModel);

            return $res;
        }


        /**
         * 
         */
        public function obtener_estructura_directorios($ruta){
            $res = mainModel::obtener_estructura_directorios($ruta);
            return $res;
        }

        /**
         * 
         */
        public function obtenerPonenteId_Controller($data){
            $dataModel = new StdClass;
            $dataModel->idponente = $data->idponente;
            $dataModel->evento_idevento = $data->id_eventoActivo;

            $res = self::obtenerPonenteId_Model($dataModel);

            return $res;
        }

        /**
         * 
         */
        public function eliminarPonente_Controller($data){
            $dataModel = new StdClass;
            $dataModel->idponente = $data->idponente;
            $dataModel->evento_idevento = $data->id_eventoActivo;

            $res = self::eliminarPonente_Model($dataModel);

            return $res;
        }


        /**
         * 
         */
        public function crearPonente_Controller($data){
            $dataModel = new StdClass;
            $dataModel->dni = $this->txtres($data->txt_dni_crearv);
            $dataModel->nombre = $this->txtres($data->txt_nombre_crearv);
            $dataModel->apellido = $this->txtres($data->txt_apellido_crearv);
            $dataModel->observacion = $this->txtres($data->txt_obs_crearv);
            $dataModel->estado = $data->check_estado_crearv ? 1 : 0;

            $dataModel->anio = date("Y");

            $dataModel->ruta_foto = "/public/ponentes/{$dataModel->dni}/";
            $dataModel->ruta_archivos = "/public/curso_files/evento-{$data->id_eventoActivo}/{$dataModel->dni}/";

            $dataModel->evento_idevento = $data->id_eventoActivo;


            $res = self::crearPonente_Model($dataModel);

            try {
                //code...
                $estructura = "../public/ponentes/{$dataModel->dni}/";
                $res_carpeta = mainModel::crear_carpeta($estructura);
                
                $estructura2 = "../public/curso_files/evento-{$data->id_eventoActivo}/{$dataModel->dni}/";
                $res_carpeta2 = mainModel::crear_carpeta($estructura2);
                
            } catch (Exception $e) {
                //throw $th;
                $msj2 = 'Excepción capturada: ' .  $e->getMessage(). "\n";
            }
            
                
            return $res;
        }


        /**
         * 
         */
        public function obtenerPonente_Controller($data){
            $dataModel = new StdClass;
            $dataModel->dni = $this->txtres($data->txt_dni_crearv);

            $res = self::obtenerPonente_Model($dataModel);

            return $res;
        }

                /**
         * FUNCIONES RAPIDAS
         */
        public function obtenerPonentes_Controller($dni, $nombre, $apellido, $idevento){
            $msj_sys = "No se encontraron Ponentes.";
            //TIENE QUE RETORNAR EL REGISTR MÁS ACTUAL POSIBLE.Si es posible corregir el ORDER BY del query
            $query = "SELECT *
            FROM ponente p 
            WHERE p.dni LIKE '%{$dni}%' 
            AND p.nombre LIKE '%{$nombre}%'
            AND p.apellido LIKE '%{$apellido}%'
            AND p.evento_idevento = '{$idevento}'
            ORDER BY p.estado  DESC, p.idponente DESC
            ";
            $result = mainModel::ejecutar_una_consulta($query);
            
            $eval = false;
            $data = [];

            if($result->rowCount() >= 1){
                $msj_sys = "Se encontraron ponentes.";
                $eval = true;
                while($user_fla = $result->fetch(PDO::FETCH_ASSOC)){
                    // code
                    $data[] = $user_fla;
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