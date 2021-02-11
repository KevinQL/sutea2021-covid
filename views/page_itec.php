<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/1c90e8b317.js" crossorigin="anonymous"></script>

    <!-- Styles me -->
    <link rel="stylesheet" href="public/css/estilos_itec.css">

    <title>Hello, world!</title>

  </head>
  <body>
    <?php
        $obj = new webItecController();
    ?>


    <header class="pt-5 contenido-header">
        <!--
        -->
        <img src="public/img/waves-shape.svg" alt="jaja" class="img-fluid w-100 img-svg-header">
        
        <section class="container">
            <div class="row">
                <div class="col-md-6 position-absolute">
                    <img src="public/img/logo-instituto.jpeg" alt="logo" class="img-fluid w-50 img-logo">                    
                </div>
                <div class="col-md-12 text-right">
                    <nav class="nav-head">
                        <ul class="nav-head__ul">
                            <li class="nav-head__li">
                                <a href="#" class="nav-head__a nav-head__a-sinmenu">Intranet</a>
                            </li>
                            <li class="nav-head__li"><a href="#" class="nav-head__a nav-head__a-sinmenu">E-Learning</a></li>
                            <li class="nav-head__li"><a href="#" class="nav-head__a nav-head__a-sinmenu">Correo</a></li>
                            <li class="nav-head__li"><a href="#" class="nav-head__a nav-head__a-sinmenu">Biblioteca</a></li>
                        </ul>
                    </nav>
                    <nav class="nav-head  ">
                        <ul class="nav-head__ul mb-0 pb-0">
                            <li class="nav-head__li"><a href="#" class="nav-head__a">El instituto</a>                               
                                <div class="submenu-head text-left">
                                    <img src="public/img/nf.jpg" alt="" class="img-fluid float-left">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h3>title menus</h3>
                                                <p><a href="#">link1</a></p>
                                                <p><a href="#">link1</a></p>
                                                <p><a href="#">link1</a></p>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>title menus</h3>
                                                <p><a href="#">link1</a></p>
                                                <p><a href="#">link1</a></p>
                                                <p><a href="#">link1</a></p>
                                            </div>
                                            <div class="col-md-4">lorem</div>
                                        </div>
                                    </div>
                                </div>                                
                            </li>

                            <li class="nav-head__li"><a href="#" class="nav-head__a">Carreras</a>
                                <div class="submenu-head text-left bg-success">
                                    <img src="public/img/nf.jpg" alt="" class="img-fluid float-left">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h3>title menus</h3>
                                                <p><a href="#">link1</a></p>
                                                <p><a href="#">link1</a></p>
                                                <p><a href="#">link1</a></p>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>title menus</h3>
                                                <p><a href="#">link1</a></p>
                                                <p><a href="#">link1</a></p>
                                                <p><a href="#">link1</a></p>
                                            </div>
                                            <div class="col-md-4">lorem</div>
                                        </div>
                                    </div>
                                </div>   
                            </li>
                            <li class="nav-head__li"><a href="#" class="nav-head__a">Adminsión</a></li>
                            <li class="nav-head__li">
                                <a href="#" class="nav-head__a nav-head__a-sinmenu">Blog</a>
                            </li>
                            <li class="nav-head__li">
                                <a href="#" class="nav-head__a nav-head__a-badge">Contacto</a>
                            </li>  
                        </ul>
                    </nav>
                </div>        
            </div>
        </section>

        <section class=" p-md-4 mt-d-5 mt-slider"> 
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                        <div class="row pt-5">
                            <div class="col-md-1"></div>
                            <div class="col-md-5 pr-0">
                                <div class="text-center txt-presentacion">
                                    <h1 class="txt-presentacion__titulo">
                                        Inicio de Clase <br>
                                        <span class="txt-presentacion__titulo-decorado  d-inline-block">
                                            <?php                                                                                        
                                                echo $obj->obtener_fecha_slider_Controller();
                                            ?>
                                            <!--11 de Marzo-->
                                        </span>
                                    </h1>
                                </div>
                                <div class="txt-licencia">
                                    <p class="txt-licencia__titulo">
                                        INSTITUTO <br>
                                        <b>LICENCIADO</b> POR MINEDU
                                    </p>                            
                                    <!--        
                                    <img src="#" alt="img1">
                                    <img src="#" alt="img2">
                                    -->
                                    <i class="far fa-hand-spock fa-5x"></i>
                                    <i class="ml-5 fab fa-suse fa-5x"></i>
                                </div>
                            </div>
            
                            <div class="col-md-5 text-center pr-5">
                                <img src="./public/slider_files/iduser-slider.png" alt="imagen estudiantes" class="d-block w-100">
                                <!--
                                <img src="public/img/img-slider.png" alt="imagen estudiantes" class="d-block w-100">
                                -->
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                  </div>

                  <div class="carousel-item">
                        <div class="row pt-5">
                            <div class="col-md-1"></div>
                            <div class="col-md-5 pr-0">
                                <div class="text-center txt-presentacion">
                                    <h1 class="txt-presentacion__titulo">
                                        Proximo año <br>
                                        <span class="txt-presentacion__titulo-decorado  d-inline-block">1100 de Mayo    </span>
                                    </h1>
                                </div>
                                <div class="txt-licencia">
                                    <p class="txt-licencia__titulo">
                                        INSTITUTO <br>
                                        <b>LICENCIADO</b> POR MINEDU
                                    </p>                            
                                    <!--        
                                    <img src="#" alt="img1">
                                    <img src="#" alt="img2">
                                    -->
                                    <i class="far fa-hand-spock fa-5x"></i>
                                    <i class="ml-5 fab fa-suse fa-5x"></i>
                                </div>
                            </div>
            
                            <div class="col-md-5 text-center pr-5">
                                <img src="public/img/img-slider.png" alt="imagen estudiantes" class="d-block w-100">
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                  </div>
                
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>            
        </section>
        <!--
            vacio adicional
            <div class="vacio-header">            
            </div>
        -->
            
    </header>

    <section class="container">
        <h4 class="text-center p-5">
            >> Nuestras carreras
        </h4>
        <div class="row">
            <?php
                $cursos_data = $obj->obtener_dataCurso_Controller();
                if($cursos_data['eval']){
                    foreach ($cursos_data['data'] as $key => $value) {
                        # code...
                        //echo "$key => {$value['nombre_curso']} <br>";
                        echo "
                            <div class='col-md-3 text-center'>
                                <img src='./public/curso_files/iduser-{$value[url_img]}' alt='imgen estudinarte' class='img-fluid  img-carreras'>
                                <p class='text-center text-capitalize lead txt-detalles-curso'>
                                    {$value[nombre_curso]} <br>
                                    {$value[fecha_txt]} <br>
                                    $/. {$value[costo]} Soles<br>
                                </p>
                            </div>                        
                        ";
                    }

                }else{
                    echo 'No hay cursos aún...';
                }
            ?>
            <!--
            <div class="col-md-3 text-center">
                <img src="./public/curso_files/iduser-estadisc1.png" alt="imgen estudinarte" class="img-fluid  img-carreras">
                <p class="text-center text-capitalize text-muted"> Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="col-md-3 text-center">
                <img src="public/curso_files/imagen.png" alt="imgen estudinarte" class="img-fluid  img-carreras">
                <p class="text-center text-capitalize text-muted"> Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="col-md-3 text-center">
                <img src="public/img/estudent-1.png" alt="imgen estudinarte" class="img-fluid  img-carreras">
                <p class="text-center text-capitalize text-muted"> Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="col-md-3 text-center">
                <img src="public/img/estudent-1.png" alt="imgen estudinarte" class="img-fluid  img-carreras">
                <p class="text-center text-capitalize text-muted"> Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            -->
        </div>
        <!--
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="public/img/estudent-1.png" alt="imgen estudinarte" class="img-fluid">
                <p class="text-center"> Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="col-md-3 text-center">
                <img src="public/img/estudent-1.png" alt="imgen estudinarte" class="img-fluid">
                <p class="text-center"> Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="col-md-3 text-center">
                <img src="public/img/estudent-1.png" alt="imgen estudinarte" class="img-fluid">
                <p class="text-center"> Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="col-md-3 text-center">
                <img src="public/img/estudent-1.png" alt="imgen estudinarte" class="img-fluid">
                <p class="text-center"> Lorem ipsum dolor sit amet consectetur.</p>
            </div>
        </div>
        -->
    </section>

    <section class="mt-5 section-cambias">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="texto-cambias">
                        <h2 class="text-white">
                            <span class="text-warning">Cambias Tú</span>
                            <br>
                            CAMBIA EL MUNDO
                        </h2>
                    </div>
                </div>
                <div class="col-md-6 text-center bg-primary div-img-student">
                    
                </div>
            </div>
        </div>
    </section>

    <section class="m-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="p-4 contenedor-blog">
                        <h3 class="text-white"> >> Lorem, ipsum.</h3>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="seccion-blog">
                                    <img src="public/img/nf.jpg" alt="imagen" class="seccion-blog__img">
                                    <div class="bg-warning seccion-blog__texto">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.                                        
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">

                                <div class="seccion-blog">
                                    <img src="public/img/nf.jpg" alt="imagen" class="seccion-blog__img">
                                    <div class="bg-warning seccion-blog__texto">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.                                        
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-md-12">

                                <div class="seccion-blog">
                                    <img src="public/img/nf.jpg" alt="imagen" class="seccion-blog__img">
                                    <div class="bg-warning seccion-blog__texto">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.                                        
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>                    
                </div>

                <div class="col-md-8">
                    <div class="novedades">
                        <h3 class="novedades__titulo">>> Lorem, ipsum.</h3>
                        <div class="novedades__contenido">
                            <a class="novedades__btn novedades__btn-f" href="#">
                                <i class="fab fa-facebook-f fa-3x"></i>
                            </a>
                            <a class="novedades__btn novedades__btn-i" href="#">
                                <i class="fab fa-instagram fa-3x"></i>
                            </a>
                            <a class="novedades__btn novedades__btn-y" href="#">
                                <i class="fab fa-youtube fa-3x"></i>
                            </a>
                        </div>
                    </div>
                    <div class="novedades">
                        <h3 class="novedades__titulo">>> Lorem, ipsum.</h3>
                        <div class="novedades__contenido">
                            <p>Lorem ipsum dolor sit.</p>
                        </div>
                    </div>
                    <div class="novedades">
                        <h3 class="novedades__titulo">>> Lorem, ipsum.</h3>
                        <div class="novedades__contenido">
                            <p>Lorem ipsum dolor sit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-content">
        <img src="public/img/waves-shape.svg" alt="footer img" class="img-fluid w-100 footer-content__fondo-svg">  
        <div class="footer-content__info">
            
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-4">
                        <p>(084) 111 111</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>Lorem, ipsum dolor.</p>
                        <p>
                            <i>ICON</i>
                            <i>ICON</i>
                            <i>ICON</i>
                            <i>ICON</i>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="public/img/logo-instituto.png" alt="" class="img-fluid w-75">
                        <a href="#" class="btn btn-outline-light btn-lg mt-5"> Secured By positive</a>
                    </div>
                    <div class="col-md-4">
                        <div class="row ml-md-5 footer-nav">
                            <div class="col-md-6 footer-nav__conten">                                
                                <a href="#" class="footer-nav__a">Lorem.</a>
                                <a href="#" class="footer-nav__a">Lorem.</a>
                                <a href="#" class="footer-nav__a">Lorem.</a>
                                <a href="#" class="footer-nav__a">Lorem.</a>
                            </div>
                            <div class="col-md-6 footer-nav__conten">
                                <a href="#" class="footer-nav__a">Lorem.</a>
                                <a href="#" class="footer-nav__a">Lorem.</a>
                                <a href="#" class="footer-nav__a">Lorem.</a>
                                <a href="#" class="footer-nav__a">Lorem.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </footer>


    
    <div class="whatsapp">
        <a href="#" class="redes-link" data-numero="51916331094" data-mensaje="Hola, me podria enviar información?" onclick="whatsapp_exe()">
            <i class="fab fa-whatsapp fa-3x"></i>
        </a>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
    <!--SCRIPT ME-->
    <script src="./public/js/script_itec.js"></script>

  </body>
</html>