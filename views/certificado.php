<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        include_once('views/modules/cdnsheader.html');
        ?>
        <link rel="stylesheet" href="views/css/home.css">
        <title>Certificado</title>

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

            // Obteniedo datos del evento actual activo
            $res_eventoActual = $objEvento->eventoActivo_Controller();
            $eventoActual = $res_eventoActual['data'][0];



            // var_dump($eventoActual);
            

        ?>


        <div class="my-1"></div>
        <!-- Inscripción -->
        <div class="container container-event ">

            <!-- Cabecera del módulo: Seleccion TP Y ESTADO -->
            <div class="card">
                <!-- Evento Detalle -->
                <h5 class="card-header">
                    ADMINISTRAR CERTIFICADO: <label id="txtEvento_actual"> #<?php echo "{$eventoActual['idevento']} - {$eventoActual['anio']} - {$eventoActual['nombre']}"; ?> </label>
                </h5>
                <!-- Lista de Tipo de personas -->
                <div class="card-body row">
                    <div class="col-md-7">
                        <!-- Seleccion de tipo de persona -->
                        <div class="form-floating">
                            <select class="form-select" 
                                id="s_tp_persona" aria-label="Floating label select example"
                                onchange="cambiarTPersona();"
                                >
                                <!-- <option selected>Seleccionar</option> -->
                                <option value="1">Asistente</option>
                                <option value="2">Organizadore</option>
                                <option value="3">Ponente</option>
                            </select>
                            <label for="s_tp_persona">Cuál es la persona?</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <!-- checkbox del estado del certificado del tipo de persona -->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" 
                                id="estado_certi"
                                onchange="cambiarEstadoTPersona();"
                            >
                            <label class="form-check-label" for="estado_certi">Estado del certificado</label>
                        </div>
                    </div>
                    
                </div>
            </div>

            <!-- Subir certificado -->
            <div class="card mt-2">
                <div class="row">
                    <!-- Subir imagen del certificado -->
                    <div class="col-md-6  d-flex justify-content-center align-items-center">
                        <div class="card-body text-center">
                            <form class="">
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="input_certificado" class="form-label">Subir Certificado de evento.</label>
                                        <input class="form-control" type="file" id="input_certificado">
                                    </div>
                                </div>

                                <!-- Boton para SUBIR CERTIFICADO -->
                                <button type="submit" 
                                    class="btn btn-warning mt-1"
                                    id="btn_subir_certificado"
                                    onclick="subirCertificado();"
                                >
                                    SUBIR CERTIFICADO
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">                    
                        <img src="./public/images_certi/sinfondo.jpg" 
                            class="img-fluid p-3" alt="..."
                            id="img_certificado"
                            >
                    </div>
                </div>
            </div>

            <!-- Contenido Pricipal Del Certificado -->
            <div class="card mt-2">
                <!-- Checkbox Para Contenido por defecto -->
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" 
                            id="contenido_x_defecto" checked
                            onchange="actualizarContenido();"
                        >
                        <label class="form-check-label" for="contenido_x_defecto">
                            Contenido Por Defecto (Asistentes)
                        </label>
                    </div>
                </div>
                <div class="card-body">
                    <div class="py-2">
                        <button class="btn btn-sm btn-outline-success">GUARDAR</button>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Cotenido Principal..." 
                            id="txt_contenido" style="height: 100px"
                            onblur="guardarContenido()"
                        ></textarea>
                        <label for="txt_contenido">Ingresar Contenido Principal...</label>
                    </div>
                
                </div>
            </div>

            <!-- Lista Temas -->
            <div class="card mt-2">
                <!-- Checkbox Para lista por defecto -->
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" 
                            id="lista_x_defecto" checked
                            onchange="actualizarListaTemas();"
                        >
                        <label class="form-check-label" for="lista_x_defecto">
                            Lista Por Defecto (Asistentes)
                        </label>
                    </div>
                </div>
                <!-- Lista de temas de certificado -->
                <div class="card-body">

                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <button class="btn btn-sm btn-outline-danger"
                                onclick="eliminarTema()"
                            >ELIMINAR</button>
                        </div>
                        <div class="p-2 bd-highlight">
                            <button class="btn btn-sm btn-outline-warning">EDITAR</button>
                        </div>
                        <div class="p-2 bd-highlight">
                            <button class="btn btn-sm btn-outline-success">GUARDAR</button>
                        </div>
                    </div>

                    <form class="form-floating">
                        <input type="text" class="form-control" 
                            id="txt_tema" placeholder="tema 1"
                        >
                        <label for="txt_tema">Ingresar Tema Certificado...</label>
                    </form>

                    <ul class="list-group mt-2"
                        id="lista_temas"
                    >
                        <li class="list-group-item">
                            Lista Vacia!!
                        </li>
                        <!-- <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis vero perferendis odit alias laborum similique quaerat eos eligendi saepe doloremque.
                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            Third checkbox
                        </li> -->
                    </ul>

                </div>
            </div>


        </div>






        <?php
        include_once('views/modules/cdnsfooter.html');
        ?>
        <script src="./views/js/js_certificado.js"></script>

    </body>

</html>