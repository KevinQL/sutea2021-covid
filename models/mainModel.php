<?php

    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../core/configApp.php";
    }else{
        require_once "./core/configApp.php";
    }


    class mainModel{
        
        /* Funcion para conectar a la BD - Function to connect to DB */
        protected function ConnectDB(){
            $link= new PDO(SGBD,USER,PASS);//array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            $link->exec("set names utf8");
            return $link;
        }

        /* Funcion para ejecutar una consulta simple - Function to execute a simple query */
        public function ejecutar_una_consulta($query){
            $response=self::ConnectDB()->prepare($query);
            $response->execute();
            return $response;
        }

        
        /**
         * Crea carpeta ysubcarpetas en el caso de que sea necesario
         * $ruta {String} Ejmplo. "./nombre_carpeta/carpeta1/carpeta2/"
         */
        public function crear_carpeta($ruta){
            $msj_sys = "No se creo el directorio";
            $eval = false;
            // Estructura de la carpeta deseada
            $estructura = $ruta;
            // Para crear una estructura anidada se debe especificar
            // el parámetro $recursive en mkdir().
            if (!file_exists($estructura)) {
                if(!mkdir($estructura, 0777, true)) {
                    $msj_sys = 'Fallo al crear las carpetas...';
                    // die();
                }else{
                    $msj_sys = 'Se creó la carpeta!';
                    $eval = true;
                }
            }else{
                $msj_sys = 'El directorio ya existe';
            }

            return ["eval"=>$eval, "msj"=>$msj_sys];

        }


        /**
         * Retorna un array con la lista de archivos en una ruta especifica.
         * $ruta {String} ejemplo "./ruta_ejemplo/"
         */
        public function obtener_estructura_directorios($ruta){
            $msj_sys = "No se Obtuvo lista de archivos";
            $eval = false;
            $res_file = [];
            // Se comprueba que realmente sea la ruta de un directorio
            if (is_dir($ruta)){
                // Abre un gestor de directorios para la ruta indicada
                $gestor = opendir($ruta);
                // Recorre todos los elementos del directorio
                while (($archivo = readdir($gestor)) !== false)  {
                    $ruta_completa = $ruta . "/" . $archivo;
                    // Se muestran todos los archivos y carpetas excepto "." y ".."
                    if ($archivo != "." && $archivo != "..") {
                        // Si es un directorio se recorre recursivamente
                        $msj_sys = "Se Obtuvo lista de archivos";
                        $eval = true;
                        $res_file[] = $archivo;
                    }
                }
                
                // Cierra el gestor de directorios
                closedir($gestor);

            } else {
                $msj_sys = "No es una ruta de directorio valida";
            }
            // return $res_file;
            return ["eval"=>$eval,"data"=>$res_file, "msj"=>$msj_sys ];
        }


        /**
         * Función para guardar imagenes en el servidor
         * $dir_destino {string} ejemplo. "./ruta_ejemplo/" 
         * $name {string} ejemplo. "nombre.jpg" 
         * return Boolean
         */        
        public function guardar_imagen($file, $dir_destino, $name){
            $msj_sys = "No se guardo imagen";
            $eval=false;
            $resultado = move_uploaded_file($file['tmp_name'], $dir_destino . $name); 
            if($resultado){
                $msj_sys = "Se guardo imagen";
                $eval=true;
            }
            return ["eval"=>$eval, "msj"=>$msj_sys];
        }

        /**
         * Función para guardar imagenes en el servidor
         * $dir_destino {string} ejemplo. "./ruta_ejemplo/" 
         * $name {string} ejemplo. "nombre.jpg" 
         * return Boolean
         */        
        public function guardar_archvo($file, $dir_destino, $name){
            $msj_sys = "No se guardo archivo";
            $eval=false;
            $resultado = move_uploaded_file($file['tmp_name'], $dir_destino . $name); 
            if($resultado){
                $msj_sys = "Se guardo archivo";
                $eval=true;
            }
            return ["eval"=>$eval, "msj"=>$msj_sys];
        }

    }

?>