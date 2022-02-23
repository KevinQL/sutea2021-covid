<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once('views/modules/cdnsheader.html');
  ?>
  
  <!-- custom css file link  (new 2022)-->
  <link rel="stylesheet" href="./public/css/style.css">

  <link rel="stylesheet" href="views/css/home.css">
  <title>Certificado</title>

  <!-- (Estilos new 2022) -->
  <style>
    .form-control, .form-select{
      padding: 1.1rem 1.4rem;
      font-size: 1.7rem;
    }
  </style>
  
</head>

<body>
  <?php
  include_once('views/modules/navegacion_inicio.html');
  ?>
  <section class="container-event container">
    <div class="card card-own p-sm-4 p-md-4">
      <div class="card-body d-flex justify-content-around align-items-center">
        <img _ngcontent-serverapp-c111="" src="views/assets/animation/certifications.jpg" 
        class="d-none d-md-block col-5" style="max-width: 400px;">
        <form action="" method="POST" class="d-flex flex-column align-items-start col-7">
          <h2 >Certificado docente</h2>
          <p class="lead">Descripción u observación adicional </p>
          <div class="col-12 mb-2">
            <label for="year">Año del evento</label>
            <select class="form-select" aria-label="Default select example" id="year">
              <option selected>Seleccionar</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <!-- <option value="2022">2022</option> -->
            </select>
          </div>
          <div class="col-12 mb-4">
            <!-- Definir estandar de tipos de documentos  -->
            <label for="email">Documento de identidad</label>
            <input type="text" class="form-control" id="document" name="certification_document" placeholder="DNI" autocomplete="off" required pattern="^[0-9\\s]+$" minLength="6" maxlength="14">
          </div>
          <input type="submit" id="certificationSave" class="next btn btn-primary-own mx-2" value="Obtener" onclick="verificarAsistente(event);"/>
          
          <!-- Resultado de consulta de emisión de certificado. -->
          <div class="mt-2 res_cert">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <strong>Esperando...</strong>
            </div>
          </div>

        </form>
      </div>
    </div>
  </section>
  <?php
  include_once('views/modules/footer.html');
  include_once('views/modules/cdnsfooter.html');
  ?>

  <script src="views/js/js_certificado_dig.js"></script>

</body>

</html>