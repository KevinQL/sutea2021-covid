<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once('views/modules/cdnsheader.html');
    ?>
    <link rel="stylesheet" href="views/css/home.css">
    <title>Inscripción</title>
</head>
<body>
    <?php
        include_once('views/modules/navegacion_inicio.html');
    ?>
    <section class="container-event container">
        <h2 class="text-center">Registar asistencia</h2>
        <p class="text-muted pb-4 text-center"></p>
        <form action="" method="POST">
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <label for="email">Documento de identidad</label>
                <input type="text" class="form-control" id="document" name="assistance_document" placeholder="DNI" autocomplete="off"
                required 
                pattern="^[0-9\\s]+$"
                minLength="8"
                maxlength = "8">
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="assistance_name" placeholder="Nombre" autocomplete="off"
                required 
                pattern="^[A-Za-z0-9\\s]+$"
                maxlength = "30">
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <label for="lastName">Apellido</label>
                <input type="text" class="form-control" id="lastName" name="assistance_lastName" placeholder="Apellido" autocomplete="off"
                required 
                pattern="^[A-Za-z0-9\\s]+${1,50}" 
                maxlength = "50">
            </div>
            <div class="d-flex justify-content-end">
                <input type="button" id="assistanceClear" class="next btn btn-secondary-own mx-2" value="Cancelar"/>
                <input type="submit" id="assistanceSave" class="next btn btn-primary-own mx-2" value="Confirmar"/>
            </div>
        </form>
    </section>    
    <?php
            include_once('views/modules/footer.html');
            include_once('views/modules/cdnsfooter.html');
    ?>
</body>
</html>