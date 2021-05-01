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
        public function crearPonente_Controller($data){
            $dataModel = new StdClass;
            $dataModel->dni = $this->txtres($data->txt_dni_crearv);
            $dataModel->nombre = $this->txtres($data->txt_nombre_crearv);
            $dataModel->apellido = $this->txtres($data->txt_apellido_crearv);
            $dataModel->observacion = $this->txtres($data->txt_obs_crearv);
            $dataModel->estado = $data->check_estado_crearv ? 1 : 0;

            $res = self::crearPonente_Model($dataModel);

// Estructura de la carpeta deseada
$estructura = '../public/nivel1/nivel2/nivel3/';

// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

if(!mkdir($estructura, 0777, true)) {
    die('Fallo al crear las carpetas...');
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
            ORDER BY p.estado DESC
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