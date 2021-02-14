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
  <div class="container-slide">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner carousel-home bg-img-cover">        
        <div class="carousel-item active">
          <div class="w-100">
            <div class="page-header-content py-5">
              <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10 text-center">
                      <div data-aos="fade-up" class="aos-init aos-animate">
                        <h1 class="">What is Lorem Ipsum</h1>
                        <p class="">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                        dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book..
                        </p>
                      </div>
                      <a class="btn  btn-primary-own font-weight-500 aos-init aos-animate" href="#!" data-aos="fade-up" data-aos-delay="100">Lorem Ipsum</a>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="carousel-item">
          <div class="w-100">
            <div class="page-header-content py-5">
              <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10 text-center">
                      <div data-aos="fade-up" class="aos-init aos-animate">
                        <h1 class="">What is Lorem Ipsum</h1>
                        <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                           Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                           when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                           It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="w-100">
            <div class="page-header-content py-5">
              <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10 text-center">
                      <div data-aos="fade-up" class="aos-init aos-animate">
                        <h1 class="">What is Lorem Ipsum</h1>
                        <p class="">We are a group of creatives and developers who design, build, and optimize brands and digital experiences.</p>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
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
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
          <button type="button" class="btn btn-inline-own"><a href="#">See more</a></button>          
          </div>
      </div>
    </div>
    <div class="col-sm-4 mb-3">
      <div class="card card-own">
        <div class="card-body">
          <h5 class="card-title">Notice title</h5>
          <h6 class="card-subtitle mb-2 text-muted">Date: 12/02/2019</h6>
          <p class="card-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
          </p>
          <button type="button" class="btn btn-inline-own"><a href="#">See more</a></button>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mb-3">
      <div class="card card-own">
        <div class="card-body">
          <h5 class="card-title">Notice title</h5>
          <h6 class="card-subtitle mb-2 text-muted">Date: 12/02/2019</h6>
          <p class="card-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
          </p>
          <button type="button" class="btn btn-inline-own"><a href="#">See more</a></button>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mb-3">
      <div class="card card-own">
        <div class="card-body">
          <h5 class="card-title">Notice title</h5>
          <h6 class="card-subtitle mb-2 text-muted">Date: 12/02/2019</h6>
          <p class="card-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
          <button type="button" class="btn btn-inline-own"><a href="#">See more</a></button>          
          </div>
      </div>
    </div>
    <div class="col-sm-4 mb-3">
      <div class="card card-own">
        <div class="card-body">
          <h5 class="card-title">Notice title</h5>
          <h6 class="card-subtitle mb-2 text-muted">Date: 12/02/2019</h6>
          <p class="card-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
          </p>
          <button type="button" class="btn btn-inline-own"><a href="#">See more</a></button>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mb-3">
      <div class="card card-own">
        <div class="card-body">
          <h5 class="card-title">Notice title</h5>
          <h6 class="card-subtitle mb-2 text-muted">Date: 12/02/2019</h6>
          <p class="card-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
          </p>
          <button type="button" class="btn btn-inline-own"><a href="#">See more</a></button>
        </div>
      </div>
    </div>
  </div>

  <!-- Sección videos -->
  <section class="bg-light container-event">
    <h2 class="text-center">Capacitaciones con los mejores video</h2>
    <p class="text-muted pb-4 text-center"></p>
    <div class="container">
    <div id="carouselVideoIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner carousel-videos bg-img-cover">        
        <div class="carousel-item active">
          <video width="100%" height="550px" controls>
            <source src="movie.mp4" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
            Your browser does not support the video tag.
          </video>
        </div>
        
        <div class="carousel-item">
          <div class="w-100">
            <div class="">
              <iframe class="" src="https://www.youtube.com/embed/6hgVihWjK2c?rel=0" allowfullscreen  width="100%" height="550vh"></iframe>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="w-100">
            <div class="">
            <iframe width="100%" height="550vh" src="https://www.youtube.com/embed/tgbNymZ7vqY" allowfullscreen>
              </iframe>
            </div>
          </div>
        </div>
      </div>
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
</section>

<!-- Pie de página -->
    <?php
        include_once('views/modules/footer.html');
        include_once('views/modules/cdnsfooter.html');
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- CSS only -->
    <!--SCRIPT ME-->
    <!-- <script src="./public/js/script_sutep.js"></script> -->
  </body>
</html>