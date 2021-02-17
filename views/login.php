<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        include_once("views/modules/cdnsheader.html");
    ?>
    <link rel="stylesheet" href="views/css/home.css">
    <title>LOGIN</title>
  </head>
  <body>
    <!-- NAVEGACION -->
    <?php
        include_once("views/modules/navegacion_inicio.html");
    ?>

    <!-- contenido form -->
    <div class="container my-3">        
        <form action="" method="POST" class="row" id="formInscription">
            <div class="col-md-4 form-group">
                <h3 class="text-center lead text-muted">INICIAR SESSION</h3>
                <hr>
                <input type="text" id="txt_user" class="form-control text-uppercase my-2" placeholder="INGRESE USUARIO"
                autocomplete="off"
                required 
                pattern="^[A-Za-z\\s]+${1,30}"
                maxlength = "30"
                >                     
                <input type="password" id="txt_password" class="form-control text-uppercase my-2" placeholder="INGRESE CONTRASEÑA"
                autocomplete="off"
                required 
                pattern="^[A-Za-z\\s]+${1,30}"
                maxlength = "30"
                > 
                <input type="submit" id="loginUserSave" class="next btn btn-primary-own" value="Iniciar Session" onclick="execute_loginUser(this);" />
                <br>
                <a href="?pg=usuario_registro">registrarse</a>
            </div>
            <div class="col-md-3 text-center p-5 d-none cargando">
                <i class="fas fa-spinner fa-pulse fa-3x"></i>
            </div>
        </form>      
    </div>

    
    <?php        
        include_once("views/modules/cdnsfooter.html");        
    ?>
    <script src="./public/js/js_loginUser.js"></script>
  </body>
</html>