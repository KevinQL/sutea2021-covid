<!DOCTYPE html>
<html lang="es">
<head>
    
    <?php
        include_once('views/modules/cdnsheader.html');
    ?>
    
    <title>INICIO</title>
</head>
<body>

    <?php
        include_once("views/modules/navegacion__.php");        
    ?>



    <!-- CUADR DE VIENDENIDA AL USUARIO-->
    <div class="jumbotron container mt-5">
        <h1 class="display-3">Bienvenido, <?= $_SESSION['data']['usuario'] ?>!</h1>    
        <p class="lead">Página de presentación de CERSUTEA 2021</p>
        <hr class="my-4">
        <p>...</p>
        <p class="lead">
            <a class="btn btn-danger btn-lg" target="_blank" href="?pg=page_sutep" role="button">WEB CERSUTEA 2021</a>
        </p>

    </div>



    <?php        
        include_once('views/modules/cdnsfooter.html');
    ?>

</body>
</html>