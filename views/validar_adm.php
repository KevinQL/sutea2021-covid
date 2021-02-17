<!DOCTYPE html>
<html lang="es">
<head>
    
    <?php
        include_once('views/modules/cdnsheader.html');
    ?>
    
    <title>Validar</title>
</head>
<body>

    <?php
        include_once("views/modules/navegacion__.php");        
    ?>

    <div class="my-5"></div>
    <!-- Inscripción -->
    <div class="container">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Detalles</th>
            <th scope="col">Validar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="ver('70598957');">
                    ver
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-dark">Validar</button>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>Thornton</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="ver('31551695');">
                    ver
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-dark">Validar</button>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>Thornton</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="ver('12345678');">
                    ver
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-dark">Validar</button>
                </td>
            </tr>
        </tbody>
        </table>

    </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="imagen" style="width: 100%;" class="text-center">
            <img src="./public/img_voucher/2021112345678.jpg" class="mx-auto img-fluid" alt="..." >
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


    <?php        
        include_once('views/modules/cdnsfooter.html');
    ?>


<script>

    function ver(dni){
        console.log("ok ver ", dni);
        let el = document.querySelector("#imagen");
        el.innerHTML = '<img src="./public/img_voucher/2021'+dni+'.jpg" class="mx-auto img-fluid" alt="...">';
    }

</script>

</body>
</html>