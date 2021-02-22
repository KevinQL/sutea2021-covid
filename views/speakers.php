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
    <section class="container-event container bg-white py-10">
        <h2 class="text-center" id="speakerTitle"></h2>
        <p class=" pb-4 text-center lead" id="speakerSubtitle"></p>
        <div class="container">
            <div class="column" id="listSpeakers"></div>
        </div>
        <!-- aqui culmina otro dia de ponentes -->
    </section>
    <?php
    include_once('views/modules/footer.html');
    include_once('views/modules/cdnsfooter.html');
    ?>

<script src="./views/js/load_speaker.js" type="module"></script>
</body>

</html>