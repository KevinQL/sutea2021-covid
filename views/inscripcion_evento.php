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
  <?php
        include_once('views/modules/footer.html');
        include_once('views/modules/cdnsfooter.html');
    ?>
    <script src="./public/js/js_inscripcion.js"></script>
</body>
</html>