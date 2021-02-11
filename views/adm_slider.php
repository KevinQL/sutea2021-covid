<!DOCTYPE html>
<html lang="es">
<head>
    
    <?php
        include_once('views/modules/cdnsheader.html');
    ?>
    <script src="./views/js/script_share.js"></script>

    <title>ADM_SLIDER</title>
</head>
<body>
    
    <?php
        include_once("views/modules/navegacion__.php");        
    ?>

    <!-- CUADR DE VIENDENIDA AL USUARIO-->
    <div class="container mt-5">
        <h1 class="display-5 text-muted text-center">SLIDER</h1> 
        <hr class="my-4">        
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="form-group">
                    <label for="txt_fecha">FECHA DE INICIO</label>
                    <input type="text" class="form-control txt_fecha" id="txt_fecha" aria-describedby="fechaHelp" placeholder="11 DE MAYO">
                    <small id="fechaHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="img_slider">File input</label>
                    <input type="file" class="form-control-file img_slider" id="img_slider" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                </div>
                <div class="lead form-group">
                    <button class="btn btn-primary btn-lg d-block w-100" onclick="execute_sliderInsert()">Guardar Slider</button>                    
                </div>
            </div>
        </div>

    </div>



    <?php        
        include_once('views/modules/cdnsfooter.html');
        include_once('views/modules/file_session_footer.html');
    ?>

</body>
</html>