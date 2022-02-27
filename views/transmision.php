<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <?php
        include_once('views/modules/cdnsheader.html');
    ?>
    
    <!-- custom css file link  (new 2022)-->
    <link rel="stylesheet" href="./public/css/style.css">

    <link rel="stylesheet" href="views/css/home.css">
  
    <title>Surtea</title>
  
  </head> 
  <body>
  <?php
        include_once('views/modules/navegacion_inicio.html');
    ?>
  <section class="container-slide my-4">
        <section class="container">
            <iframe width="100%" height="550" src="https://www.youtube.com/embed/o9uaG-7ISfU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </section>
        
        <section clas="container">
        <iframe allowfullscreen="" frameborder="0" height="370" src="https://www.youtube.com/live_chat?v=o9uaG-7ISfU&embed_domain=cersutea.com" width="100%"></iframe><br />
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