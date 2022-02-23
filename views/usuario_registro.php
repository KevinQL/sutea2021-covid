<!DOCTYPE html>
<html lang="es">

<head>

    <?php
    include_once("views/modules/cdnsheader.html");
    ?>
    
    <!-- custom css file link  (new 2022)-->
    <link rel="stylesheet" href="./public/css/style.css">

    <link rel="stylesheet" href="views/css/home.css">

    <title>Registrarse</title>

    <!-- (Estilos new 2022) -->
    <style>
        .form-control, .form-select{
        padding: 1.1rem 1.4rem;
        font-size: 1.7rem;
        }
    </style>

</head>

<body>

    <!-- NAVEGACION -->
    
    <?php
    include_once("views/modules/navegacion_inicio.html");
    ?>

    <!-- contenido form-->
    <section>
        <div class="container-event container my-3 container-login">
            <form action="" method="POST" class="col-12 col-md-6 col-lg-4 card-own p-5 m-auto" id="formInscription">
                <div class="d-flex flex-column align-items-center">
                    <h3 class="text-center mb-3">Registrarse</h3>
                    <input type="text" id="txt_user" class="form-control my-2" placeholder="Ingrese usuario" autocomplete="off" required pattern="^[A-Za-z\\s]+${1,30}" maxlength="30">
                    <input type="password" id="txt_password" class="form-control my-2" placeholder="Ingrese contraseña" autocomplete="off" required pattern="^[A-Za-z\\s]+${1,30}" maxlength="30">
                    <br>
                    <input type="submit" id="registerUserSave" class="next btn btn-primary-own" value="Registrarse" onclick="execute_regisUser(this);" />
                </div>
            </form>
        </div>
    </section>


    <?php
    include_once('views/modules/footer.html');
    include_once('views/modules/cdnsfooter.html');
    ?>
    
    <script src="./public/js/js_registroUsuario.js"></script>
</body>

</html>