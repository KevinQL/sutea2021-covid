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
    <title>Login</title>
</head>

<body>
    <!-- NAVEGACION -->
    <?php
    include_once("views/modules/navegacion_inicio.html");
    ?>

    <!-- contenido form -->
    <section>
        <div class="container-event container my-3 container-login">
            <form action="" method="POST" class="col-12 col-md-6 col-lg-4 card-own p-5 m-auto" id="formInscription">
                <div class="d-flex flex-column align-items-center">
                    <h3 class="text-center lead text-muted">Iniciar sesión</h3>
                    <hr>
                    <input type="text" id="txt_user" class="form-control my-2" placeholder="Ingrese usuario" autocomplete="off" required pattern="^[A-Za-z\\s]+${1,30}" maxlength="30">
                    <input type="password" id="txt_password" class="form-control my-2" placeholder="Ingrese contraseña" autocomplete="off" required pattern="^[A-Za-z\\s]+${1,30}" maxlength="30">
                    <br>
                    <input type="submit" id="loginUserSave" class="next btn btn-primary-own" value="Iniciar Sesión" onclick="execute_loginUser(this);" />
                    <br>
                    <span class="footer-copyright"><a href="?pg=usuario_registro">Registrarse</a></span>
                </div>
                <div class="col-md-3 text-center p-5 d-none cargando">
                    <i class="fas fa-spinner fa-pulse fa-3x"></i>
                </div>
            </form>
        </div>
    </section>
    <?php
    include_once("views/modules/cdnsfooter.html");
    ?>
    <script src="./public/js/js_loginUser.js"></script>
</body>

</html>