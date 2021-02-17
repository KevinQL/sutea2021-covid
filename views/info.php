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
        <form action="">
            <div class="mb-3">
                <label for="txt_dni" class="form-label" id="dnii">DNI</label>
                <input type="text" class="form-control" id="txt_dni" aria-describedby="emailHelp" validate>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="txt_nombre" class="form-label">NOMBRE</label>
                <input type="text" class="form-control" id="txt_nombre" validate>
            </div>
            <div class="mb-3">
                <label for="img_test" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="img_test">
            </div>
            <button type="submit" class="btn btn-primary" onclick="execute_test(event);">Submit</button>
        </form>
    </section>
    



    <?php
        echo $_SESSION["data"]["usuario"];
        var_dump(date_default_timezone_get());
        echo date("H:i:s"); 
    // $arr = [['nombre'=>'apple'],['nombre'=>'orange'],['nombre'=>'home']];

    // //var_dump($arr);
    // foreach ($arr as $value) {
    //     # code...
    //     //var_dump($value);
    //     echo "-> {$value['nombre']}";

    //     echo "<br>";
    // }

    ?>

<script>
        
    document.querySelector("#dnii").style.color = "red";

    
</script>



    <?php
        include_once('views/modules/cdnsfooter.html');
    ?>

</body>
</html>