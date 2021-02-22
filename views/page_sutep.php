<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <?php
  include_once('views/modules/cdnsheader.html');
  ?>
  <link rel="stylesheet" href="views/css/home.css">
  <title>Surtea</title>
</head>

<body>
  <?php
  include_once('views/modules/navegacion_inicio.html');
  ?>
  <section class="container-slide">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner carousel-home bg-img-cover" id="sliderHome"></div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>

  <!-- Sección Eventos -->
  <section class="row mx-4 container-event" id="noticias"></section>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title w-100 text-center" id="exampleModalLabel"><span class="text-center" id="titleNews">...</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="contentNews" class="text-center">
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Sección videos -->
  <section class="bg-light container-event" id="capacitacion">
    <h2 class="text-center" id="videosHomeTitle"></h2>
    <p class="text-muted pb-4 text-center" id="videosHomeSutitle"></p>
    <div class="container">
      <div id="carouselVideoIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner carousel-videos bg-img-cover" id="videosHome"></div>
        <a class="carousel-control-prev" href="#carouselVideoIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselVideoIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>

  <!-- Pie de página -->
  <?php
  include_once('views/modules/footer.html');
  include_once('views/modules/cdnsfooter.html');
  ?>
  <script src="./views/js/load_home.js" type="module"></script>
</body>

</html>