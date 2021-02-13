<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="views/assets/icomoon/style.css" /> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles me -->
    <link rel="stylesheet" href="public/css/estilos_sutep.css">
    <link rel="stylesheet" href="views/css/home.css">

    <title>Sutea</title>

  </head> 
  <body>
  <header>
    <div class="d-flex justify-content-between align-items-center mx-4 my-2">
      <img src="views/assets/image/mariategui.jpg" alt="Mariategui" sizes="50" srcset="" class="header-top">
      <div class="col-6 text-center">
        <h2>¡POR UNA LINEA SINDICAL CLASISTA!</h2>
        <h4>CER SURTEA</h4>
      </div>
      <img src="views/assets/image/mariategui.jpg" alt="Mariategui" sizes="50" srcset="" class="header-top">
    </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="#">SUTEA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Noticias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Eventos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#">Contactos</a>
            </li>
          </ul>
        </div>
      </nav>

</header>

<section>
  <!-- Seciton Noticias -->
  <div class="container-slide">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="views/assets/image/slide1.jpeg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <div class="d-flex align-items-stretch justify-content-center mx-4 h-100">
              <!-- Image o gif -->
              <div>
                <img src="views/assets/image/slide_image1.jpg" class="w-75 h-100" alt="...">
              </div>
              <!-- contenido -->
              <div class="column my-auto">
                <h2>Slide label</h2>
                <h4>Some representative placeholder content for</h4>
                <h4>Some representative placeholder content</h4>
                <h4>Some representative </h4>
              </div>              
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="views/assets/image/slide1.jpeg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          <div class="d-flex align-items-stretch justify-content-center mx-4 h-100">
              <!-- Image o gif -->
              <div>
                <img src="views/assets/image/slide_image1.jpg" class="w-75 h-100 rounded" alt="...">
              </div>
              <!-- contenido -->
              <div class="column my-auto">
                <h2>Slide label</h2>
                <h4>Some representative placeholder content for</h4>
                <h4>Some representative placeholder content</h4>
                <h4>Some representative </h4>
              </div>              
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="views/assets/image/slide1.jpeg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          <div class="d-flex align-items-stretch justify-content-center mx-4 h-100">
              <!-- Image o gif -->
              <div>
                <img src="views/assets/image/slide_image1.jpg" class="w-75 h-100" alt="...">
              </div>
              <!-- contenido -->
              <div class="column my-auto">
                <h2>Slide label</h2>
                <h4>Some representative placeholder content for</h4>
                <h4>Some representative placeholder content</h4>
                <h4>Some representative </h4>
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
  <div class="row mx-4 container-event">
    <div class="col-sm-4 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Notice title</h5>
          <h6 class="card-subtitle mb-2 text-muted">Date: 12/02/2019</h6>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
            Some quick example text to build on the card title and make up the bulk of the card's content.
            Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <button type="button" class="btn btn-secondary-own"><a href="#">See more</a></button>          
          </div>
      </div>
    </div>
    <div class="col-sm-4 mb-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Notice title</h5>
        <h6 class="card-subtitle mb-2 text-muted">Date: 12/02/2019</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <button type="button" class="btn btn-secondary-own"><a href="#">See more</a></button>
      </div>
    </div>
  </div>
  <div class="col-sm-4 mb-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Notice title</h5>
        <h6 class="card-subtitle mb-2 text-muted">Date: 12/02/2019</h6>
        <p class="card-text">Some quick example text to build on the card title a
        Some quick example text to build on the card title and make up the bulk of the card's content.
        nd make up the bulk of the card's content.</p>
        <button type="button" class="btn btn-secondary-own"><a href="#">See more</a></button>
      </div>
    </div>
  </div>
  </div>

  <!-- Sección videos -->
  <!-- Si son videos el fondo deberá estar oscuro -->
  <div class="container-event dark-content">
    <div class="mx-4">
      <!-- Título -->
      <h3 class="font-color-white mb-4">Hi, enjoy the video</h3>
    </div>
    <div>
      <div>
        <!-- Video -->
        <iframe width="100%" height="500vh" src="https://www.youtube.com/embed/tgbNymZ7vqY">
        </iframe>
      </div>
    </div>
  </div>

    <!-- Inscripción -->
    <div class="container container-event">
    <h3>Ficha de inscripción docente</h3>
    <form action="inscription.php" method="post">
    <div class="form-group mb-2">
      <label for="email">Documento de identidad</label>
      <input type="text" class="form-control" id="document" name="data[document]" placeholder="DNI">
    </div>
    <div class="form-group mb-2">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" id="name" name="data[name]" placeholder="Nombre">
    </div>
    <div class="form-group mb-2">
      <label for="lastName">Apellido</label>
      <input type="text" class="form-control" id="lastName" name="data[lastName]" placeholder="Apellido">
    </div>
    <div class="form-group mb-2">
      <label for="phone">Nro. Teléfono</label>
      <input type="text" class="form-control" id="phone" name="data[phone]" placeholder="Teléfono">
    </div>
    <div class="form-group mb-2">
      <label for="email">Correo electronico</label>
      <input type="email" class="form-control" id="email" name="data[email]" placeholder="email">
    </div>
    <div class="form-group mb-2">
      <label for="specialty">Especialidad</label>
      <input type="text" class="form-control" id="specialty" name="data[specialty]" placeholder="DNI">
    </div>
    <input type="button" name="" class="next btn btn-info" value="Completar" />
    </fieldset>
    </form>
  </div>
</section>

<!-- Pie de página -->
<footer>
  <div class="footer mb-4">
    <div class="w-100 ">
      <h3  class ="m-4" for="">Contáctanos</h3>
    </div>
    <div class="row mx-4">
      <div class="column col font-color-second">
        <div class="d-flex align-items-center"><span class="material-icons"> phone </span><span>999999999</span></div>
        <div class="d-flex align-items-center"><span class="material-icons">facebook</span><span>example</span></div>
        <div class="d-flex align-items-center"><span class="material-icons">local_post_office</span><span>example@gmail.com</span></div>
      </div>
      <div class="col col-lg-2">
        <!-- Logo blanco y negro -->
        <img src="views/assets/image/map_apurimac.jpg" alt="logo_white" sizes="400" srcset="" class="footer-img">
      </div>
    </div>

  </div>
</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- CSS only -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    
    <!--SCRIPT ME-->
    <script src="./public/js/script_sutep.js"></script>

  </body>
</html>