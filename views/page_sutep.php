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
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur quisquam, magnam enim sed debitis perspiciatis.</p>
                <a href="#" class="btn">Inscripciones AQUÍ</a>
            </div>
            <div class="image">
                <img src="./public/img/home-img-1.jpg" alt="">
            </div>
        </div>

        <div class="slide">
            <div class="content">
                <span>Evento 2022</span>
                <h3>CER SUTEA</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur quisquam, magnam enim sed debitis perspiciatis.</p>
                <a href="#" class="btn">Inscripciones AQUÍ</a>
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
            <a href="#" class="btn">Inscripción</a>
        </div>
    </div>

    <div class="banner">
        <img src="./public/img/banner-2.png" alt="">
        <div class="content">
            <span>Evento 2022</span>
            <h3>Ponencias <br> virtuales</h3>
            <a href="#" class="btn">Capacitación</a>
        </div>
    </div>

    <div class="banner">
        <img src="./public/img/banner-3.jpg" alt="">
        <div class="content">
            <span>Evento 2022</span>
            <h3>Certificado <br> digital</h3>
            <a href="#" class="btn">Certificado</a>
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