<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once('views/modules/cdnsheader.html');
    ?>
    <link rel="stylesheet" href="views/css/home.css">
    <title>Inscripción</title>
</head>
<body>
    <?php
        include_once('views/modules/navegacion_inicio.html');
    ?>
    <!-- Inscripción -->
  <div class="container container-event">
    <div class="card card-own p-sm-4 p-md-4">
      <div class="card-body">
        <h2 class="text-center">Ficha de inscripción docente</h2>
        <p class="text-muted pb-4 text-center"></p>
        <form action="" method="POST" class="row" id="formInscription">
          <div class="col-12 col-md-6 col-lg-4 mb-3">
            <label for="document">Documento de identidad</label>
            <input type="text" class="form-control" id="document" name="inscription_document" placeholder="DNI" autocomplete="off"
              required 
              pattern="^[0-9\\s]+$"
              minLength="8"
              maxlength = "8"
              onkeyup="execute_traerinfo(this)" >
          </div>
          <div class="col-12 col-md-6 col-lg-4 mb-3">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="inscription_name" placeholder="Nombre" autocomplete="off"
              required 
              pattern="^[A-Za-z\\s]+${1,30}"
              maxlength = "30">
          </div>
          <div class="col-12 col-md-6 col-lg-4 mb-3">
            <label for="lastName">Apellido</label>
            <input type="text" class="form-control" id="lastName" name="inscription_lastName" placeholder="Apellido" autocomplete="off"
              required 
              pattern="^[A-Za-z0-9\\s]+${1,50}" 
              maxlength = "50">
          </div>
          <div class="col-6 col-md-6 col-lg-4 mb-3">
            <label for="phone">Nro. Teléfono</label>
            <input type="text" class="form-control" id="phone" name="inscription_phone" placeholder="Teléfono" autocomplete="off"
              required 
              pattern="^[0-9\\s]+$" 
              minLength="6"
              maxLength="9"
              >
          </div>
          <div class="col-6 col-md-6 col-lg-4 mb-3">
            <label for="email">Correo electronico</label>
            <input type="email" class="form-control" id="email" name="inscription_email" placeholder="email" autocomplete="off"
              required 
              pattern="/^\s@\"
              maxLength="20">
          </div>
          <div class="col-12 col-md-6 col-lg-4 mb-3">
            <label for="specialty">Especialidad</label>
            <select class="form-select" aria-label="Default select example" id="specialty" name="inscription_specialty">
              <option selected>Inicial</option>
              <option value="Primaria">Primaria</option>
              <option value="Secundaria">Secundaria</option>
              <option value="Auxiliares">Auxiliares</option>
              <option value="Estudiante">Estudiante</option>
              <option value="Padre de familia">Padre de familia</option>
              <option value="Otro">Otro</option>
            </select>  
          </div>

          <!-- Arreglar -->
          <div class="col-12 col-md-6 col-lg-4 mb-3">
            <label for="ugelName">Ugel</label>
            <select class="form-select" aria-label="Default select example" id="ugelName" name="inscription_ugelName" >
              <option selected>Andahuaylas</option>
              <option value="Abancay">Abancay</option>
              <option value="Antabanba">Antabanba</option>
              <option value="Aymaraes">Aymaraes</option>
              <option value="Cotabanba">Cotabanba</option>
              <option value="Chincheros">Chincheros</option>
              <option value="Grau">Grau</option>
              <option value="Huancarama">Huancarama</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
          <!-- fin -->

          <div class="col-12 col-md-6 col-lg-4 mb-3">
            <label for="operation">Número de operación</label>
            <input type="text" class="form-control" id="operation" name="inscription_operation" required placeholder="Número de operación" autocomplete="off">
          </div>
          <div class="col-12 col-md-6 col-lg-4 mb-4">            
            <label for="imageImport">Voucher</label>
            <input
              id="imageImport"
              type="file"
              multiple="false"
              accept=".jpg, .jpeg, .png"
              class="form-control"
              required
            >
            <img id="blah" src="https://i.ibb.co/Br8tf3Y/Whats-App-Image-2020-09-26-at-12-50-00-PM.jpg" alt="Tu imagen" width="150" height="150px" />

          </div>
          <div class="d-flex justify-content-end">
            <input type="button" id="inscription_clear" class="next btn btn-secondary-own mx-2" value="Cancelar"/>
            <input type="submit" id="inscriptionSave" class="next btn btn-primary-own mx-2" value="Completar" onclick="execute_inscripcion(this);" />
          </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>

<div class="container">
  <small>BASE DE CODIFICACION DE VERIFICANDO DE VOUCHER</small> <br>
  <textarea name="base64" id="base64" rows='8' cols='40' disabled required></textarea>
  <div id="img_otro">
      <img src="" alt="Image preview" id="preview_new" style="display:none">
  </div>
</div>


  <?php
        include_once('views/modules/footer.html');
        include_once('views/modules/cdnsfooter.html');
    ?>
    <script src="./public/js/js_inscripcion.js"></script>


    <script>
      // PROGRAMACION TEMPORAL 

function readImage (input) {
    document.querySelector("#base64").value = "";
    if (input.files && input.files[0]) {
      let k = "";
      let reader = new FileReader();
      reader.onload = function (e) {
          $('#preview_new').attr('src', reader.result); // Renderizamos la imagen con su tamanio normla
          k = reader.result;
          console.log("ok->", k);
          setTimeout(() => {
              let img = document.querySelector("#preview_new"); // capturamos la imagen renderiada en su tamanio normal
              console.log("img principal: ",img.width, img.height);
              if(img.height >= img.width){
                if(img.width > 400 || img.height > 650);
                  k = _resize(img, 400, 650); // me devuelve el base64 de la imagen renderizada, reescalado.
                console.log("ok2->",k);
                document.querySelector("#base64").value = k; // imprimimos el base 64 de la imgen redimensionada
                $('#blah').attr('src', k); // imprimimos la imagen en la imagen de previsualización
                
                setTimeout(() => {
                  $('#preview_new').attr('src', k); // imprimimos la imagen en la imagen de previsualización
                  console.log("img final: ",img.width, img.height);
                }, 700);
              }else{                
                alert("IMAGEN INVALIDO");
                input.value = "";
                $('#preview_new').attr('src', "");
                $('#blah').attr('src', "https://i.ibb.co/Br8tf3Y/Whats-App-Image-2020-09-26-at-12-50-00-PM.jpg");
              }
          }, 1500);
        //imprime valor base64 
          //renderiza la img en la img principal
      }
      reader.readAsDataURL(input.files[0]);
    
    }
}

  $("#imageImport").change(function () {
    // Codigo a ejecutar cuando se detecta un cambio de archivO
    readImage(this);
  });
  
  
  //----------------------------------------------------------
  //----------------- CODIGO DE IMAGEN -----------------------
  //----------------------------------------------------------
  //----------------------------------------------------------

  function _resize(img, maxWidth, maxHeight) 
  {
        let ratio = 1;
        let canvas = document.createElement("canvas");
        canvas.style.display="block";
        document.body.appendChild(canvas);

        let canvasCopy = document.createElement("canvas");
        canvasCopy.style.display="block";
        document.body.appendChild(canvasCopy);

        let ctx = canvas.getContext("2d");
        let copyContext = canvasCopy.getContext("2d");

        if(img.width > maxWidth)
            ratio = maxWidth / img.width;
        else if(img.height > maxHeight)
            ratio = maxHeight / img.height;

        canvasCopy.width = img.width;
        canvasCopy.height = img.height;
        try {
            copyContext.drawImage(img, 0, 0);
        } catch (e) { 
            //document.getElementById('loader').style.display="none";
            alert("Aquí fue el problema - Porfavor tome otra foto, o suba otra foto");
            return false;
        }
        canvas.width = img.width * ratio;
        canvas.height = img.height * ratio;
        // the line to change
        //ctx.drawImage(canvasCopy, 0, 0, canvasCopy.width, canvasCopy.height, 0, 0, canvas.width, canvas.height);
        // the method signature you are using is for slicing
        ctx.drawImage(canvasCopy, 0, 0, canvas.width, canvas.height);
        let dataURL = canvas.toDataURL("image/jpg");
        document.body.removeChild(canvas);
        document.body.removeChild(canvasCopy);

        //return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
        return dataURL;
  };

    
    </script>
</body>
</html>