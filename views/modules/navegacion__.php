<?php

    if($_SESSION['data']['tipo_usuario'] == 1){ // 1 - administrador
        include_once("views/modules/navegacion.html");            
    }else{ // 0 - invitado
        include_once("views/modules/navegacion_invitado.html");            
    }