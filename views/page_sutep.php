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
  <section>
  <!-- Seciton Noticias -->
  <div class="container-slide">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="views/assets/image/fondo_slide.jpeg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="d-flex align-items-center justify-content-center mx-4 h-100">
              <!-- Image o gif -->
              <div>
                <img src="views/assets/image/slide_image1.jpg" class="w-100 h-100" alt="...">
              </div>
              <!-- contenido -->
              <div class="column my-auto slide-information w-75">
                <h2>Slide label</h2>
                <h4 class="mx-5">Some representative placeholder content for
                Some representative placeholder content
                Some representative </h4>
              </div>              
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="views/assets/image/fondo_slide.jpeg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          <div class="d-flex align-items-center justify-content-center mx-4 h-100">
              <!-- Image o gif -->
              <div>
                <img src="views/assets/image/slide_image1.jpg" class="w-100 h-100 rounded" alt="...">
              </div>
              <!-- contenido -->
              <div class="column my-auto slide-information w-75">
                <h2>Slide label</h2>
                <h4 class="mx-5">Some representative placeholder content for
                Some representative placeholder content
                Some representative </h4>
              </div>              
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="views/assets/image/fondo_slide.jpeg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          <div class="d-flex align-items-center justify-content-center mx-4 h-100">
              <!-- Image o gif -->
              <div>
                <img src="views/assets/image/slide_image1.jpg" class="w-100 h-100" alt="...">
              </div>
              <!-- contenido -->
              <div class="column my-auto slide-information w-75">
                <h2>Slide label</h2>
                <h4>Some representative placeholder content for
                Some representative placeholder content
                Some representative </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- Sección Eventos -->
  <div class="row mx-4 container-event" id="noticias">
  <h2 class="text-center">Title in the list of events</h2>
  <p class="text-muted pb-4 text-center">Subtitle description</p>
    <div class="col-sm-4 mb-3">
      <div class="card card-own">
        <div class="card-body">
          <h5 class="card-title">Notice title</h5>
          <h6 class="card-subtitle mb-2 text-muted">Date: 12/02/2019</h6>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
            Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <button type="button" class="btn btn-secondary-own"><a href="#">See more</a></button>          
          </div>
      </div>
    </div>
    <div class="col-sm-4 mb-3">
    <div class="card card-own">
      <div class="card-body">
        <h5 class="card-title">Notice title</h5>
        <h6 class="card-subtitle mb-2 text-muted">Date: 12/02/2019</h6>
        <p class="card-text">
          Some quick example text to build on the card title and make up the bulk of the card's content.
          Some quick example text to build on the card title and make up the bulk of the card's content.
        </p>
        <button type="button" class="btn btn-secondary-own"><a href="#">See more</a></button>
      </div>
    </div>
  </div>
  <div class="col-sm-4 mb-3">
    <div class="card card-own">
      <div class="card-body">
        <h5 class="card-title">Notice title</h5>
        <h6 class="card-subtitle mb-2 text-muted">Date: 12/02/2019</h6>
        <p class="card-text">
          Some quick example text to build on the card title and make up the bulk of the card's content.
          Some quick example text to build on the card title and make up the bulk of the card's content.
        </p>
        <button type="button" class="btn btn-secondary-own"><a href="#">See more</a></button>
      </div>
    </div>
  </div>
  </div>

  <!-- Sección videos -->
  <!-- Si son videos el fondo deberá estar oscuro -->
  <div class="container-event dark-content" id="capacitacion">
    <div class="mx-4">
      <!-- Título -->
      <h2 class="text-center font-color-white">Hi, enjoy the video</h2>
      <p class="text-muted pb-4 text-center"></p>
    </div>
    <div>
      <div>
        <!-- Video -->
        <iframe width="100%" height="500vh" src="https://www.youtube.com/embed/tgbNymZ7vqY">
        </iframe>
      </div>
    </div>
  </div>
</section>

<!-- Pie de página -->
    <?php
        include_once('views/modules/footer.html');
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- CSS only -->
    <!--SCRIPT ME-->
    <!-- <script src="./public/js/script_sutep.js"></script> -->

  </body>
</html>