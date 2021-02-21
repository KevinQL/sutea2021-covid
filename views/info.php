<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php
        include_once('views/modules/cdnsheader.html');
    ?>

    <title>INFOs</title>
</head>
<body>
    
    <?php
        include_once("views/modules/navegacion__.php");        
    ?>

    <div class="container my-4">
        <h1>PÁGINA DE INFORMACIÓN</h1>
    </div>

    <section class="container">   
        <form enctype="multipart/form-data" action="./views/test.php" method="POST">
            <div class="mb-3">
                <label for="txt_dni" class="form-label" id="lb_dni">DNI</label>
                <input type="text" class="form-control" id="txt_dni" name="txt_dni" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="txt_nombre" class="form-label">NOMBRE</label>
                <input type="text" class="form-control" id="txt_nombre" name="txt_nombre">
            </div>
            <div class="mb-3">
                <label for="img_test" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="img_test" name="img_test">

                <img id="blah" src="https://i.ibb.co/Br8tf3Y/Whats-App-Image-2020-09-26-at-12-50-00-PM.jpg" alt="Tu imagen" width="150" height="150px" />
            </div>
            <button type="submit" class="btn btn-primary">Submit 1</button>
            <!-- <button type="submit" class="btn btn-primary" onclick="execute_test(event);">Submit</button> -->
        </form>
    </section>
    



<script>
    
</script>


    <?php
        include_once('views/modules/cdnsfooter.html');
    ?>
    <script src="./views/js/js_test.js"></script>
</body>
</html>




<?php
        // echo $_SESSION["data"]["usuario"];
        // var_dump(date_default_timezone_get());
        // echo date("H:i:s"); 


        // echo "<br>";

        // $ok = isset($_FILES["img_voucher"])? "ok" : null;
        // var_dump($ok["type"]);



    // $arr = [['nombre'=>'apple'],['nombre'=>'orange'],['nombre'=>'home']];

    // //var_dump($arr);
    // foreach ($arr as $value) {
    //     # code...
    //     //var_dump($value);
    //     echo "-> {$value['nombre']}";

    //     echo "<br>";
    // }

    ?>
