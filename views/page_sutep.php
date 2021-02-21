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
      <div class="carousel-inner carousel-home bg-img-cover">        
        <div class="carousel-item active">
          <div class="w-100">
            <div class="page-header-content py-5">
              <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10 text-center">
                      <div data-aos="fade-up" class="aos-init aos-animate">
                        <h1 class="">Curso de actualización y fortalecimiento pedagógico de corte internacional</h1>
                        <p class="">
                        Del 22 de febrero al 06 de marzo
                        </p>
                      </div>
                      <a class="btn  btn-primary-own font-weight-500 aos-init aos-animate" href="#!" data-aos="fade-up" data-aos-delay="100">IR AL EVENTO</a>
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
                        <h1 class="">La educación es el arma más poderosa que puedes usar para cambiar el mundo.</h1>
                        <p class="">"Nelson Mandela"</p>
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
                        <h1 class="">Aquellos que educan bien a los niños merecen recibir más honores que sus propios padres, porque aquellos sólo les dieron vida, éstos el arte de vivir bien.</h1>
                        <p class="">"Aristóteles"</p>
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
  </section>

  <!-- Sección Eventos -->
  <section class="row mx-4 container-event" id="noticias">
    <h2 class="text-center">Noticias y Comunicados</h2>
    <p class="text-muted pb-4 text-center">CERSURTEA</p>
    <div class="col-sm-4 mb-3">
      <div class="card card-own">
        <div class="card-body">
          <h5 class="card-title">Apertura de gran evento internacional</h5>
          <h6 class="card-subtitle mb-2 text-muted">Fecha: 22/02/2021</h6>
          <p class="card-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
          <button type="button" class="btn btn-inline-own"><a href="#">ver más...</a></button>          
          </div>
      </div>
    </div>
    <div class="col-sm-4 mb-3">
      <div class="card card-own">
        <div class="card-body">
          <h5 class="card-title">Ponentes de corte Internacional</h5>
          <h6 class="card-subtitle mb-2 text-muted">fecha: 22/02/2021</h6>
          <p class="card-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
          </p>
          <button type="button" class="btn btn-inline-own"><a href="#">ver más...</a></button>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mb-3">
      <div class="card card-own">
        <div class="card-body">
          <h5 class="card-title">Sindicato trabaja para los Docentes</h5>
          <h6 class="card-subtitle mb-2 text-muted">Fecha: 19/02/2021</h6>
          <p class="card-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
          </p>
          <button type="button" class="btn btn-inline-own"><a href="#">ver más...</a></button>
        </div>
      </div>
    </div>
    <!-- <div class="col-sm-4 mb-3">
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
    </div> -->
  </section>

  <section class="container">
    <iframe width="100%" height="550" src="https://www.youtube.com/embed/Qg0JnO5-OC4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </section>


  <!-- Sección videos -->
  <section class="bg-light container-event" id="capacitacion">
    <h2 class="text-center">VIDEOS</h2>
    <p class="text-muted pb-4 text-center"></p>
    <div class="container">
      <div id="carouselVideoIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner carousel-videos bg-img-cover">        
          <div class="carousel-item active">
            <video width="100%" height="550px" controls>
              <source src="movie.mp4" type="video/mp4">
              <!-- <source src="movie.ogg" type="video/ogg"> -->
              Your browser does not support the video tag.
            </video>
          </div>
          
          <div class="carousel-item">
            <div class="w-100">
              <div class="">
                <iframe class="" src="https://www.youtube.com/embed/h8F-YMdbCLs" allowfullscreen  width="100%" height="550vh"></iframe>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="w-100">
              <div class="">
              <iframe width="100%" height="550vh" src="https://www.youtube.com/embed/yEhk8PbWcHw" allowfullscreen>
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