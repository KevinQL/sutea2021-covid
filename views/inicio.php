<!DOCTYPE html>
<html lang="es">

<head>

    <?php
    include_once('views/modules/cdnsheader.html');
    ?>

    <title>Inicio</title>
</head>

<body>

    <?php
    include_once("views/modules/navegacion__.php");
    ?>

    <section id="inicioSutep" class="inicio_sutep">
        <div class="container text-center d-flex flex-column align-items-center justify-content-center position-absolute content-cover">
            <div class="col-md-12">
                <h1>Bienvenido a <span class="font-color-vprimary">CERSUTEA</span> </h1>
                <h2 class="mb-5">
                    Frase descripción Frase descripción Frase descripción Frase descripción
                </h2>
                <a class="btn  btn-primary-own btn-lg" target="_blank" href="?pg=page_sutep" role="button">Web CERSUTEA 2021</a>
            </div>
        </div>
        <div class="container text-center d-flex align-items-center justify-content-end position-absolute social">
            <a class="btn social-white mx-1" target="_blank" href="?pg=" role="button"><i class="fab fa-facebook-f"></i></a>
            <a class="btn social-white mx-1" target="_blank" href="?pg=" role="button"><i class="fab fa-twitter"></i></a>
            <a class="btn social-white mx-1" target="_blank" href="?pg=" role="button"><i class="fab fa-youtube"></i></a>
            <a class="btn social-white mx-1" target="_blank" href="?pg=" role="button"><i class="fas fa-envelope"></i></a>
        </div>
    </section>
    <?php
    include_once('views/modules/cdnsfooter.html');
    ?>

</body>

</html>