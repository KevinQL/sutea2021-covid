<?php
    session_start();
    
    require_once("controllers/adminController.php");
    require_once("controllers/webItecController.php");
    
    $pag = new adminController();

    $session = $pag->verificarSessionController();        
    
    $paginaResult = $pag->administrarPaginasController($session);
    
    include_once("views/".$paginaResult);     


?>