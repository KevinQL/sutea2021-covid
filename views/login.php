<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        include_once("views/modules/cdnsheader.html");
    ?>

    <title>LOGIN</title>
  </head>
  <body>
    <!-- NAVEGACION -->
    <?php
        include_once("views/modules/navegacion_inicio.html");
    ?>

    <!-- contenido form -->
    <div class="container my-3">        
        <div class="row text-center">
            <div class="col-md-4 form-group">
                 <h3 class="text-center lead text-muted">INICIAR SESSION</h3>
                 <hr>
                 <input type="text" id="txt_user" class="form-control text-uppercase my-2" placeholder="INGRESE USUARIO">                     
                 <input type="password" id="txt_password" class="form-control text-uppercase my-2" placeholder="INGRESE CONTRASEÑA"
                 > 
                 <input type="submit" class="btn btn-primary btn-lg btn-block my-3" value="INICIAR SESSION" onclick="execute_loginUser()">
                 <br>
                 <a href="?pg=usuario_registro">registrarse</a>
             </div>
             <div class="col-md-3 text-center p-5 d-none cargando">
                 <i class="fas fa-spinner fa-pulse fa-3x"></i>
             </div>
         </div>        
    </div>

    
    <?php        
        include_once("views/modules/cdnsfooter.html");        
    ?>

  </body>
</html>