<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPCION EVENTO</title>
</head>
<body>
    <!-- Inscripción -->
  <div class="container container-event">
    <h3>Ficha de inscripción docente</h3>
    <form action="inscription.php" method="post">
    <div class="form-group mb-2">
      <label for="email">Documento de identidad</label>
      <input type="text" class="form-control" id="document" name="data[document]" placeholder="DNI">
    </div>
    <div class="form-group mb-2">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" id="name" name="data[name]" placeholder="Nombre">
    </div>
    <div class="form-group mb-2">
      <label for="lastName">Apellido</label>
      <input type="text" class="form-control" id="lastName" name="data[lastName]" placeholder="Apellido">
    </div>
    <div class="form-group mb-2">
      <label for="phone">Nro. Teléfono</label>
      <input type="text" class="form-control" id="phone" name="data[phone]" placeholder="Teléfono">
    </div>
    <div class="form-group mb-2">
      <label for="email">Correo electronico</label>
      <input type="email" class="form-control" id="email" name="data[email]" placeholder="email">
    </div>
    <div class="form-group mb-2">
      <label for="specialty">Especialidad</label>
      <input type="text" class="form-control" id="specialty" name="data[specialty]" placeholder="DNI">
    </div>
    <div class="form-group mb-2">
      <label for="specialty">Voucher</label>
      <input
      id="imageImport"
      type="file"
      multiple="false"
      accept=".jpg, .jpeg, .png"
      class="mb-3 mt-3 file-import"
      >
    </div>
    <input type="button" name="" class="next btn btn-info" value="Completar" />
    </fieldset>
    </form>
  </div>
</body>
</html>