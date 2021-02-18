<!DOCTYPE html>
<html lang="es">
<head>
    
    <?php
        include_once("views/modules/cdnsheader.html");
    ?>
    <link rel="stylesheet" href="views/css/home.css">
    <title>Registrarse</title>
</head>
<body>

    <!-- NAVEGACION -->
    <?php
        include_once("views/modules/navegacion_inicio.html");
    ?>

    <!-- contenido form-->
    <div class="container my-3">        
       <div class="container">
            <form action="" method="POST" class="row" id="formInscription">
                <div class="col-md-4 form-group">
                    <h3 class="text-center text-muted lead">REGISTRARSE</h3>
                    <hr>
                    <input type="text" id="txt_user" class="form-control text-uppercase my-2" placeholder="INGRESE USUARIO"
                    autocomplete="off"
                    required 
                    pattern="^[A-Za-z\\s]+${1,30}"
                    maxlength = "30" 
                    >                     
                    <input type="password" id="txt_password" class="form-control text-uppercase my-2" placeholder="INGRESE PASSWORD" 
                    autocomplete="off"
                    required 
                    pattern="^[A-Za-z\\s]+${1,30}"
                    maxlength = "30" 
                    > 

                    <!-- <input type="submit" class="btn btn-primary btn-lg btn-block my-3" value="REGISTRARSE" onclick="execute_registroUsuario()"> -->

                    <input type="submit" id="registerUserSave" class="next btn btn-primary-own" value="Registrarse" onclick="execute_regisUser(this);" />
                </div>
            </form>
        </div>
    </div>


    <?php        
        include_once("views/modules/cdnsfooter.html");        
    ?>
    <script src="./public/js/js_registroUsuario.js"></script>
</body>
</html>