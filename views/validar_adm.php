<!DOCTYPE html>
<html lang="es">

<head>

    <?php
    include_once('views/modules/cdnsheader.html');
    ?>
    <link rel="stylesheet" href="views/css/home.css">
    <link rel="stylesheet" href="views/css/table.css">
    <title>Validar</title>

    <style>
        .swal2-container{
            z-index: 100000000000 !important;

        }
    </style>
    
</head>

<body>

    <?php
    include_once("views/modules/navegacion__.php");
    ?>

    <div class="my-5"></div>

    <div class="container">
        <div class="card-own px-4 py-4">
            
            <div class="row">
                <div class="col-6 col-md-6 col-lg-4 mb-3">
                    <select name="sl-ugel" id="sl-ugel" class="form-select">
                        <option value="">Todo</option>
                        <option value="">Andahuaylas</option>
                        <option value="">Grau</option>
                        <option value="">Abancay</option>
                    </select>
                </div>
                <div class="col-6 col-md-6 col-lg-4 mb-3">
                    <input type="checkbox" name="chk-docente" id="chk-docente" class="form-checkbox">
                    <label for="chk-docente">Todos los docentes</label>
                </div>
            </div>

            <h5>Filtrar : </h5>
            <div class="row">
                <div class="col-6 col-md-6 col-lg-4 mb-3">
                    <!-- <label for="phone">Ingrese DNI</label> -->
                    <input type="number" id="txt_dni" name="txt_dni" class="form-control" placeholder=" DNI" autocomplete="off" onkeyup="execute_traerDocentesEvento();">
                </div>
                <div class="col-6 col-md-6 col-lg-4 mb-3">
                    <!-- <label for="phone">Ingrese el nombre</label> -->
                    <input type="text" id="txt_nombre" name="txt_nombre" class="form-control" placeholder="Nombre" autocomplete="off" onkeyup="execute_traerDocentesEvento();">
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <!-- <label for="phone">Ingrese el apellido</label> -->
                    <input type="text" id="txt_apellido" name="txt_apellido" class="form-control" placeholder="Apellido" autocomplete="off" onkeyup="execute_traerDocentesEvento();">
                </div>
            </div>
            
        </div>
    </div>
    <!-- Validar -->
    <div class="container">
        <table class="table card-own mt-4">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Celular</th>
            <th scope="col">Detalles</th>
            <th scope="col">Validar</th>
            <th scope="col">Actualizar</th>
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


    <!-- MODAL PARA LA EDITAR EL REGISTRO DEL DECENTE -->
    <section>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_upd_org">
        Launch demo modal
        </button> -->

        <!-- Modal -->
        <div class="modal fade" id="modal_upd_docente" tabindex="-1" aria-labelledby="modal_upd_docenteLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_upd_docenteLabel">
                    MODULO VALIDAR - ACTUALIZAR REGISTRO 
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <section class="container">

                    <h4 class="lead mt-3">DATOS REGISTRO</h4>
                    <article class="card p-3">
                        <div class="input-group">

                            <input type="text" class="form-control" 
                                id="txtupd_idregistro_registro" 
                                placeholder="Id ponente..." 
                            >
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Año</span>
                            <input type="number" class="form-control" 
                                id="txtupd_anio_registro" 
                                placeholder="1996..." 
                                readonly
                            >
                            <span class="input-group-text">Fecha Registro</span>
                            <input type="text" aria-label="Fecha registro" class="form-control"
                                id="txtupd_fecha_registro" 
                                placeholder="..."
                            >
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">UGEL</span>
                            <input type="text" aria-label="Ugel" class="form-control" 
                                id="txtupd_ugel_registro" 
                                placeholder="Andahuaylas..." 
                            >
                            <span class="input-group-text">ESPECIALIDAD</span>
                            <input type="text" aria-label="Especialidad" class="form-control"
                                id="txtupd_especialidad_registro" 
                                placeholder="Secundaria..."
                            >
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text">Numero Operación</span>
                            <input type="text" aria-label="Número de operación del voucher" class="form-control"
                                id="txtupd_numoperacion_registro" 
                                placeholder="..."
                            >
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="txtupd_tipoPersona_registro">Tipo Persona</label>
                            <select class="form-select" id="txtupd_tipoPersona_registro">
                                <option selected>Cambiar...</option>
                                <option value="1">Asistente</option>
                                <option value="2">Organizador</option>
                                <option value="3">Ponente</option>
                            </select>
                        </div>
                    </article>

                    <h5 class="lead">DATOS DOCENTE</h5>
                    <article class="card p-3">
                        <div class="input-group">

                            <input type="text" class="form-control" 
                                id="txtupd_iddecente_decente" 
                                placeholder="Id ponente..." 
                            >
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Documento de identidad (DNI)</span>
                            <input type="number" class="form-control" 
                                id="txtupd_dni_decente" 
                                placeholder="Documento de identidad..." 
                            >
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text">Nombres y Apellidos</span>
                            <input type="text" aria-label="First name" class="form-control"
                                id="txtupd_nombre_decente" 
                                placeholder="Nombres..."
                            >
                            <input type="text" aria-label="Last name" class="form-control" 
                                id="txtupd_apellido_decente" 
                                placeholder="Apellidos..."
                            >
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Celular</span>
                            <input type="text" aria-label="Numero celular / telefono" class="form-control"
                                id="txtupd_celular_decente" 
                                placeholder="916331..."
                            >
                            <span class="input-group-text">Correo</span>
                            <input type="text" aria-label="Correo electrónico" class="form-control" 
                                id="txtupd_correo_decente" 
                                placeholder="ejemplo@gmail.com..."
                            >
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">UGEL</span>
                            <input type="text" aria-label="Ugel" class="form-control"
                                id="txtupd_ugel_decente" 
                                placeholder="Andahuylas..."
                            >
                            <span class="input-group-text">ESPECIALIDAD</span>
                            <input type="text" aria-label="Especialidad del interesado" class="form-control" 
                                id="txtupd_especialidad_decente" 
                                placeholder="Secundaria..."
                            >
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="txt_tipoPersona">Tipo Persona</label>
                            <select class="form-select" id="txtupd_tipoPersona_decente">
                                <option selected>Cambiar...</option>
                                <option value="1">Asistente</option>
                                <option value="2">Organizador</option>
                                <option value="3">Ponente</option>
                            </select>
                        </div>

                    </article>

                </section>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                <button type="button" class="btn btn-primary" onclick="actualizarRegistro_modValidar()">Actualizar</button>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- FIN MODAL ACTUALIZAR REGISTRO MOD VALIDAR -->



    <?php
    include_once('views/modules/cdnsfooter.html');
    ?>
    <script src="./views/js/js_validarAdm.js"></script>

</body>

</html>