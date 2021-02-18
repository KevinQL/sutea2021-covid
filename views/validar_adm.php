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

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <input type="number" id="txt_dni" name="txt_dni" 
                class="form-control"
                placeholder="INGRESE DNI" 
                autocomplete="off"
                onkeyup="execute_traerDocentesEvento();"
                >
            </div>
            <div class="col-md-4">
                <input type="text" id="txt_nombre" name="txt_nombre" 
                class="form-control"
                placeholder="INGRESE NOMBRE" 
                autocomplete="off"
                onkeyup="execute_traerDocentesEvento();"
                >
            </div>
            <div class="col-md-4">
                <input type="text" id="txt_apellido" name="txt_apellido" 
                class="form-control"
                placeholder="INGRESE APELLIDO" 
                autocomplete="off"
                onkeyup="execute_traerDocentesEvento();"
                >
            </div>
        </div>
    </div>
    <!-- Validar -->
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
        <tbody id="tableListDocente">
            <tr class="table-success">
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="ver('70598957');">
                    ver
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-success">Validar</button>
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
    <!-- fin Modal voucher-->


    <?php        
        include_once('views/modules/cdnsfooter.html');
    ?>
    <script src="./views/js/js_validarAdm.js"></script>

</body>
</html>