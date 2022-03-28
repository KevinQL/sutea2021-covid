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
  
          
  <script>
    let current = new Date();
    let f2 = new Date(2022, 2, 14, 15, 40); //fech
    console.log({current, f2})
    if(current > f2 && false){
      Swal.fire(
        'Comunicado',
        'Por motivos de apertura de año escolar y petición de muchos de nuestros docentes, la capacitación de hoy se suspende, pero los esperamos mañana con la ponencia del ING Lenyn Eli Flores Balandra con el tema: herramientas digitales para el proceso de enseñanza.',
        'info'
      )
    }
  </script>
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