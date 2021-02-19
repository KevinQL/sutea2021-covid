<!DOCTYPE html>
<html lang="es">

<head>

    <?php
    include_once('views/modules/cdnsheader.html');
    ?>
    <link rel="stylesheet" href="views/css/home.css">
    <link rel="stylesheet" href="views/css/table.css">
    <title>Validar</title>
</head>

<body>

    <?php
    include_once("views/modules/navegacion__.php");
    ?>

    <div class="my-5"></div>

    <div class="container">
        <div class="card-own px-4 py-4">
            <h5>Filtrar por:</h5>
            <div class="row">
                <div class="col-6 col-md-6 col-lg-4 mb-3">
                    <label for="phone">Ingrese DNI</label>
                    <input type="number" id="txt_dni" name="txt_dni" class="form-control" placeholder=" DNI" autocomplete="off" onkeyup="execute_traerDocentesEvento();">
                </div>
                <div class="col-6 col-md-6 col-lg-4 mb-3">
                    <label for="phone">Ingrese el nombre</label>
                    <input type="text" id="txt_nombre" name="txt_nombre" class="form-control" placeholder="Nombre" autocomplete="off" onkeyup="execute_traerDocentesEvento();">
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <label for="phone">Ingrese el apellido</label>
                    <input type="text" id="txt_apellido" name="txt_apellido" class="form-control" placeholder="Apellido" autocomplete="off" onkeyup="execute_traerDocentesEvento();">
                </div>
            </div>
        </div>
    </div>
    <!-- Validar -->
    <div class="container">
        <table class="table card-own">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Detalles</th>
            <th scope="col">Validar</th>
            <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody id="tableListDocente">
            <tr class="table-success">
               <td colspan="7">
                Cargando . . . .
               </td> 
            </tr>
        </tbody>
        </table>
    </div>


    <!-- Modal voucher-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Operación: <span id="res_operacion">...</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="imagen" style="width: 100%;" class="text-center">
                        <!-- <img src="./public/img_voucher/2021112345678.jpg" class="mx-auto img-fluid" alt="..."> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin Modal voucher-->


    <?php
    include_once('views/modules/cdnsfooter.html');
    ?>
    <script src="./views/js/js_validarAdm.js"></script>

</body>

</html>