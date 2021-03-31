<?php

    session_start();
    
    // Desactivar toda las notificaciónes del PHP
    // error_reporting(0);
    
    // Configura la fecha de america lima 
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"es_ES");

    // clases con los metodos de conexion al servidor
    require_once("controllers/adminController.php");
    require_once("controllers/webSutepController.php");
    
    $pag = new adminController();

    /**
     * metodo de la clase adminController
     */
    $session = $pag->verificarSessionController();
    
    /**
     * metodo de la clase adminController
     * administra las paginas que se mostrarán para los usuarios en funcion de la url
     */
    $paginaResult = $pag->administrarPaginasController($session);
    
    include_once("views/".$paginaResult);     


?>