<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once('views/modules/cdnsheader.html');
    ?>
    <link rel="stylesheet" href="views/css/home.css">
    <title>Asistencia</title>
</head>
<body>
    <?php
        include_once('views/modules/navegacion_inicio.html');
    ?>
    <section class="container-event container">
        <div class="card card-own p-sm-4 p-md-4">
            <div class="card-body">
                <h2>Asistencia del evento</h2>
                <p class="lead">Descripción u observación adicional
                </p>
                <form action="" method="POST" class="d-flex flex-column align-items-start" id="formInscription">
                    <div class="col-12 col-md-9 col-lg-6 mb-3">
                        <label for="email">Documento de identidad</label>
                        <input type="text" class="form-control" id="document" name="assistance_document" placeholder="DNI" autocomplete="off"
                        required 
                        pattern="^[0-9\\s]+$"
                        minLength="8"
                        maxlength = "8" 
                        onkeyup="execute_traerDocente(this);">
                    </div>
                    <div class="col-12 col-md-9 col-lg-6 mb-3">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="assistance_name" placeholder="Nombre" autocomplete="off"
                        required 
                        pattern="^[A-Za-z0-9\\s]+$"
                        maxlength = "30"
                        readonly>
                    </div>
                    <div class="col-12 col-md-9 col-lg-6 mb-3">
                        <label for="lastName">Apellido</label>
                        <input type="text" class="form-control" id="lastName" name="assistance_lastName" placeholder="Apellido" autocomplete="off"
                        required 
                        pattern="^[A-Za-z0-9\\s]+${1,50}" 
                        maxlength = "50"
                        readonly>
                    </div>
                    <!-- INput default -->
                    <div class="col-12 col-md-9 col-lg-6 mb-3">
                        <input type="hidden" id="txt_idregistro" name="txt_idregistro">
                        <input type="hidden" id="txt_iddocente" name="txt_iddocente">
                    </div>

                    <input type="submit" id="assistanceSave" class="next btn btn-primary-own mx-2" value="Confirmar"/>
                </form>
            </div>
            <img src="views/assets/animation/post-person.svg" alt="" class="form-img d-none d-md-block">
        </div>
    </section>    
    <?php
            include_once('views/modules/footer.html');
            include_once('views/modules/cdnsfooter.html');
    ?>
    <script src="./public/js/js_asistencia.js"></script>
</body>
</html>