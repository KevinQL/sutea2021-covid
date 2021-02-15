<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php
    include_once('views/modules/cdnsheader.html');
    ?>
    <link rel="stylesheet" href="views/css/home.css">
    <title>Expositores</title>
</head>

<body>
    <?php
    include_once('views/modules/navegacion_inicio.html');
    ?>
    <section class="container-event container bg-white py-10 ">
        <h2 class="text-center">Título de la ponencia</h2>
        <p class=" pb-4 text-center lead">Subtitulo descripción</p>
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                        <!-- imagen -->
                    </div>
                    <h2>Nombre del ponente</h2>
                    <p small>Título, cargo</p>
                    <p class="mb-0">Breve descripción de la ponencia</p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                        <!-- imagen -->
                    </div>
                    <h2>Nombre del ponente</h2>
                    <p small>Título, cargo</p>
                    <p class="mb-0">Breve descripción de la ponencia</p>
                </div>
                <div class="col-lg-4">
                    <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                        <!-- imagen -->
                    </div>
                    <h2>Nombre del ponente</h2>
                    <p small>Título, cargo</p>
                    <p class="mb-0">Breve descripción de la ponencia</p>
                </div>
            </div>
        </div>
    </section>
    <?php
    include_once('views/modules/footer.html');
    include_once('views/modules/cdnsfooter.html');
    ?>
</body>

</html>