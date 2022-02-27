<!doctype html>
<html lang="es">

<head>


  <!-- Required meta tags -->
  <?php
  include_once('views/modules/cdnsheader.html');
  ?>
  
  <!-- custom css file link  (new 2022)-->
  <link rel="stylesheet" href="./public/css/style.css">
  <!-- <link rel="stylesheet" href="views/css/home.css"> -->
  
  <title>Surtea</title>

</head>

<body>

  <?php
  include_once('views/modules/navegacion_inicio.html');
  ?>

<!-- home section starts  -->

<section class="home">

    <div class="slides-container">

        <div class="slide active">
            <div class="content">
                <span>Educación 2022</span>
                <h3>CER SUTEA</h3>
                <p>CURSO DE ACTUALIZACIÓN Y FORTALECIMIENTO PEDAGÓGICO  VIRTUAL 2022</p>
                <a href="?pg=inscripcion_evento" class="btn">Inscripciones AQUÍ</a>
            </div>
            <div class="image">
                <img src="./public/img/home-img-1.jpg" alt="">
            </div>
        </div>

        <div class="slide">
            <div class="content">
                <span>Evento 2022</span>
                <h3>CER SUTEA</h3>
                <p>POR UNA EDUCACIÓN CIENTÍFICA Y NACIONALISTA, REAL PARA EL DESARROLLO DE LOS PUEBLOS ANDINOS DE APURIMAC</p>
                <a href="?pg=inscripcion_evento" class="btn">Inscripciones AQUÍ</a>
            </div>
            <div class="image">
                <img src="./public/img/home-img-2.jpg" alt="">
            </div>
        </div>

    </div>

    <div id="slide-next" onclick="next()" class="fas fa-angle-right"></div>
    <div id="slide-prev" onclick="prev()" class="fas fa-angle-left"></div>

</section>

<!-- home section ends -->

<!-- banner section starts  -->

<section class="banner-container">

    <div class="banner">
        <img src="./public/img/banner-1.png" alt="">
        <div class="content">
            <span>Evento 2022</span>
            <h3>Inscribite <br> Aquí</h3>
            <a href="?pg=inscripcion_evento" target="_blank" class="btn">Inscripción</a>
        </div>
    </div>

    <div class="banner">
        <img src="./public/img/banner-2.png" alt="">
        <div class="content">
            <span>Evento 2022</span>
            <h3>Ponencias <br> virtuales</h3>
            <a href="?pg=transmision" target="_blank" class="btn">Capacitación</a>
        </div>
    </div>

    <div class="banner">
        <img src="./public/img/banner-3.jpg" alt="">
        <div class="content">
            <span>Evento 2022</span>
            <h3>Certificado <br> digital</h3>
            <a href="?pg=certification" target="_blank" class="btn">Certificado</a>
        </div>
    </div>

</section>

<!-- banner section ends -->


  <!-- Pie de página -->
  <?php
  include_once('views/modules/footer.html');
  include_once('views/modules/cdnsfooter.html');
  ?>
  <!-- <script src="./views/js/load_home.js" type="module"></script> -->


</body>

</html>