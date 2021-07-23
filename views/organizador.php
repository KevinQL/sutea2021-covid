<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        include_once('views/modules/cdnsheader.html');
        ?>
        <link rel="stylesheet" href="views/css/home.css">
        <title>Organizador</title>

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

        <?php
            
            /**
             * ACTIVIDADES EN ESTE MODULO
             * 
             * Configurar los archivos para la elaboracion de este modulo. (x)
             * 
             */


            /**
             * Instanciando los objetos necesario
             */
            $objEvento = new eventoController();
            $objOrganizador = new organizadorController();


            // Obteniedo datos del evento actual activo
            $res_eventoActual = $objEvento->eventoActivo_Controller();
            $eventoActual = $res_eventoActual['data'][0];



            // var_dump($eventoActual);
            

        ?>


        <div class="my-1"></div>
        <!-- Inscripción -->
        <div class="container container-event ">
            <div class="card">
                <h5 class="card-header">
                    ADMINISTRAR ORGANIZADOR: <label id="txtEvento_actual"> #<?php echo "{$eventoActual['idevento']} - {$eventoActual['anio']} - {$eventoActual['nombre']}"; ?> </label>
                </h5>
                <div class="card-body">
                    <a href="#" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        AGREGAR ORGANIZADOR
                    </a>
                </div>
            </div>
            <!-- 
                Mostrar evento actual, Editar evento
                crear nuevo evento
            -->

            <div class="card mt-2">
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dni</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_organizador">
                        <tr>
                            <th>cargando...</th>
                        </tr>
                        <!-- <tr>
                            <th scope="row">1</th>
                            <td>70598957</td>
                            <td>kevin</td>
                            <td>Quispe lima</td>
                            <td>916331094</td>
                            <td>unajmakev@gmail.com</td>
                            <td>activo</td>
                            <td>
                                <button>Modif</button>
                                <button>Elim</button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>

                </div>
            </div>
        </div>


        <!-- MODAL PARA LA EDITAR EL REGISTRO DEL ORGANIZADOR -->
        <section>
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_upd_org">
            Launch demo modal
            </button> -->

            <!-- Modal -->
            <div class="modal fade" id="modal_upd_org" tabindex="-1" aria-labelledby="modal_upd_orgLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_upd_orgLabel">
                        ACTUALIZAR ORGANIZADOR
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <section class="container">

                        <h5 class="lead">ACTUALIZAR DATOS DOCENTE</h5>
                        <article class="card p-3">
                            <div class="input-group">
                                <input type="hidden" class="form-control" 
                                    id="txt_idregistro_upd" 
                                    placeholder="Documento de identidad..." 
                                >

                                <input type="hidden" class="form-control" 
                                    id="txt_iddecente_upd" 
                                    placeholder="Documento de identidad..." 
                                >
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Documento de identidad (DNI)</span>
                                <input type="number" class="form-control" 
                                    id="txt_dni_upd" 
                                    placeholder="Documento de identidad..." 
                                >
                            </div>
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nombres y Apellidos</span>
                                <input type="text" aria-label="First name" class="form-control"
                                    id="txt_nombre_upd" placeholder="Nombres..."
                                >
                                <input type="text" aria-label="Last name" class="form-control" 
                                    id="txt_apellido_upd" placeholder="Apellidos..."
                                >
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Número Celular</span>
                                <input type="number" aria-label="Numero celular" class="form-control" 
                                    id="txt_celular_upd" placeholder="Numero de Celular..."
                                >
                                <input type="email" class="form-control" 
                                    id="txt_correo_upd" placeholder="Correo electrónico"
                                >
                                <span class="input-group-text" id="basic-addon2">@example.com</span>
                            </div>

                            <div class="input-group ">
                                <span class="input-group-text">Especialidad</span>
                                <input type="text" class="form-control" 
                                    id="txt_especialidad_upd"  placeholder="Especialidad..."
                                >
                                <label class="input-group-text" for="txt_ugel_upd">Ugel</label>
                                <select class="form-select" id="txt_ugel_upd">
                                    <option selected>Cambiar...</option>
                                    <option >Abancay</option>
                                    <option >Andahuaylas</option>
                                    <option >grau</option>
                                </select>
                            </div>
                        </article>

                        <h4 class="lead mt-3">DATOS REGISTRO</h4>
                        <article class="card p-3">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="txt_tipoPersona">Tipo Persona</label>
                                <select class="form-select" id="txt_tipoPersona_upd">
                                    <option selected>Cambiar...</option>
                                    <option value="1">Asistente</option>
                                    <option value="2">Organizador</option>
                                    <option value="3">Ponente</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="check_estado">Estado</label>
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" value="" 
                                        id="check_estado_upd"
                                        aria-label="Checkbox for following text input">
                                </div>
                            </div>
                        </article>

                    </section>


                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                    <button type="button" class="btn btn-primary" onclick="actualizarOrganizador()">Actualizar</button>
                </div>
                </div>
            </div>
            </div>
        </section>

        

        <!-- MODA PARA LA CREACIÓN DEL UN NUEVO EVENTO -->
        <section>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AGREGAR ORGANIZADOR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <form>
                        <div class="form-group">
                            <label for="txt_dni_crear">NRO. DNI</label>
                            <input type="number"
                                class="form-control" 
                                id="txt_dni_crear" 
                                onblur="obtenerDecente();"
                                placeholder="7059891..."
                            >
                            <small id="emailHelp" class="form-text text-muted">Ingresar el numero del año.</small>
                        </div>
                        <div class="form-group">
                            <label for="txt_nombre_crear">NOMBRE</label>
                            <input type="text" 
                                class="form-control" 
                                id="txt_nombre_crear" 
                                placeholder="Ingresar Nombres."
                            >
                        </div>
                        <div class="form-group">
                            <label for="txt_apellido_crear">APELLIDOS</label>
                            <input type="text" 
                                class="form-control" 
                                id="txt_apellido_crear" 
                                placeholder="Ingresar Apellidos"
                            >
                        </div>
                        <div class="form-group">
                            <label for="txt_celular_crear">NRO. CELULAR</label>
                            <input type="number" 
                                class="form-control" 
                                id="txt_celular_crear" 
                                placeholder="9163310..."
                            >
                        </div>
                        <div class="form-group">
                            <label for="txt_correo_crear">CORREO ELECTRÓNICO</label>
                            <input type="email" 
                                class="form-control" 
                                id="txt_correo_crear" 
                                placeholder="correo@gmail.com"
                            >
                        </div>
                        <div class="form-group">
                            <label for="txt_nivel_crear">NIVEL</label>
                            <input type="text" 
                                class="form-control" 
                                id="txt_nivel_crear" 
                                placeholder="Inicial"
                            >
                        </div>
                        <div class="form-group">
                            <label for="txt_ugel_crear">UGEL</label>
                            <input type="text" 
                                class="form-control" 
                                id="txt_ugel_crear" 
                                placeholder="Abancay"
                            >
                        </div>
                        <div class="form-group form-check mt-2">
                            <input type="checkbox" 
                                class="form-check-input" 
                                id="check_estado_crear"
                                checked
                            >
                            <label class="form-check-label" for="check_estado_crear">Estado</label>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" onclick="agregarOrganizadorNuevo();">Agregar</button>
                </div>
                </div>
            </div>
            </div>
        </section>


        <?php
        include_once('views/modules/cdnsfooter.html');
        ?>
        <script src="./views/js/js_organizador.js"></script>

    </body>

</html>