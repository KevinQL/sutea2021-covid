<?php

	/*===========================================
	|  Datos del servidor - Data of the server  |
	===========================================*/

	//server
	const SERVER="localhost";
	const DB="cersutea_2021";
    const USER="cersutea_2021"; //root
	const PASS="rXesT[DTXgSJ"; //


	// Solo modificar la siguiente línea en caso el gestor de base de datos no sea MySQL
	//Only modify the following line in case the database manager is not MySQL
    const SGBD="mysql:host=".SERVER.";dbname=".DB;

    /* Funcion para conectar a la BD - Function to connect to DB */
    function ConnectDB(){
        $link = new PDO(SGBD,USER,PASS);//array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        $link->exec("set names utf8");
        return $link;
    }

    /* Funcion para ejecutar una consulta simple - Function to execute a simple query */
    function ejecutar_una_consulta($query){
        $response = ConnectDB()->prepare($query);
        $response->execute();
        return $response;
    }


    /////////////////////////////////////
    ////////////////////////////////////
    // SPACE PROYECT MAIN

    /**
     * ? control de fecha, para control cache 
     * * vardump imprime la fecha actualizada 
     */
    $date_control = '2022-03-22';
    var_dump($date_control);

    if(isset($_GET['go'])){
        
        $fp = fopen("./views/m_test/files/data.txt", "r");
        while (!feof($fp)){
            
            /**
             * mt Lunes, 28 De Febreroro Del 2022 ---
             * t Martes, 01 De Marzo Del 2022 ----
             * t Miercoles, 02 De Marzo Del 2022 ---
             * t Jueves, 03 De Marzo Del 2022---
             * t Viernes, 04 De Marzo Del 2022--
             * mt Sábado, 05 De Marzo Del 2022 --
             * t Lunes, 07 De Marzo Del 2022 --
             * t Martes, 08 De Marzo Del 2022 --
             * t Miércoles, 09 De Marzo Del 2022 --
             * t Jueves, 10 De Marzo Del 2022 --
             * t Viernes, 11 De Marzo Del 2022 --
             * mt Sábado, 12 De Marzo Del 2022 --
             * t Lunes, 14 De Marzo Del 2022 --
             * t Martes, 15 De Marzo Del 2022 --
             * t Miércoles, 16 De Marzo Del 2022 --
             * t Jueves, 17 De Marzo Del 2022 --
             * t Viernes, 18 De Marzo Del 2022 --
             * mt Sábado, 19 De Marzo Del 2022 --
             * t Lunes, 21 De Marzo Del 2022 --
             * t Martes, 22 De Marzo Del 2022
             * 
             */
            $date_event = [
                            [
                                $date_control, 
                                'early'=>['0'.rand(8,9),rand(10,59),rand(10,59)],
                                'lasted'=>[rand(14,22),rand(10,59),rand(10,59)],
                            ]
                        ];


            $registro_idregistro = fgets($fp);

            // turno mañana
            $query = "INSERT INTO control SET 
                        anio = '2023',
                        fecha_registro = '{$date_event[0][0]} {$date_event[0]['early'][0]}:{$date_event[0]['early'][1]}:{$date_event[0]['early'][2]}',
                        control_dia = 0,
                        control_asistencia = 1,
                        registro_idregistro = '{$registro_idregistro}'
                ";
            $res_q = ejecutar_una_consulta($query);
            if($res_q->rowCount() >= 1){
                echo "Se inserto MAÑANA " . $registro_idregistro . " {$date_event[0][0]} {$date_event[0]['early'][0]}:{$date_event[0]['early'][1]}:{$date_event[0]['early'][2]} </br>";
            }

            // turno tarde
            $query = "INSERT INTO control SET 
                        anio = '2023',
                        fecha_registro = '{$date_event[0][0]} {$date_event[0]['lasted'][0]}:{$date_event[0]['lasted'][1]}:{$date_event[0]['lasted'][2]}',
                        control_dia = 1,
                        control_asistencia = 1,
                        registro_idregistro = '{$registro_idregistro}'
                ";
            $res_q = ejecutar_una_consulta($query);
            if($res_q->rowCount() >= 1){
                echo "Se inserto TARDE " . $registro_idregistro . " {$date_event[0][0]} {$date_event[0]['lasted'][0]}:{$date_event[0]['lasted'][1]}:{$date_event[0]['lasted'][2]} </br>";
            }
            
        }
        fclose($fp);

    }