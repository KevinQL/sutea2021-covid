<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        include_once('views/modules/cdnsheader.html');
        ?>
        <link rel="stylesheet" href="views/css/home.css">
        <title>Evento</title>
    </head>

    <body>

        <?php
        include_once("views/modules/navegacion__.php");
        ?>

        <?php
            
            /**
             * Configurar los archivos para la elaboracion de este modulo. (x)
             * 
             * Traer los eventos creados para listarlos (x)
             * Crear evento de acción para la selección del evento de la lista. y actualizar en el formuario para su actualizacion ()
             * Implementar un modal para crear elevento, el cual por defecto será el evento activo, desactivando todos los demas eventos creados ()
             * Traer los datos del evento activo para rellenarlo en el dormulario ()
             */

            $objEvento = new eventoController();


            // var_dump($objEvento->obtenerEventos_Controller(""));
            $eventos_arr = $objEvento->obtenerEventos_Controller(""); 


            /**
             * Variables para crear el evento
             */
            $anio_evento_crear = date("Y");


            /**
             * Variales para el formualrio del evento actual o seleccionado
             */
            $idevento = "";
            $nombre_evento = "";
            $anio_evento = "";
            $estado_evento = "";


            /**
             * Generando lista de eventos y evento actua 
             */ 
            $evento_actual = "<option>No existe evento actual - Seleccionar Evento</option>";
            $evento_lista = "";
            foreach ($eventos_arr["data"] as $element) {
                # code...
                if($element["estado"] == 1){
                    $evento_actual = "<option value='{$element['idevento']}'> {$element['idevento']} - {$element['anio']} - {$element['nombre']} </option>";
                    // capturando valores del evento activo
                    $idevento = $element['idevento'];
                    $nombre_evento = $element['nombre'];
                    $anio_evento = $element['anio'];
                    $estado_evento = $element['estado'];

                }else{
                    $evento_lista .= "<option value='{$element['idevento']}'> {$element['idevento']} - {$element['anio']} - {$element['nombre']} </option>";
                }
            }

        ?>

        <div class="my-1"></div>
        <!-- Inscripción -->
        <div class="container container-event ">
            <div class="card">
                <h5 class="card-header">
                    ADMINISTRAR EVENTO - CODIGO EVENTO ACTIVO 
                    <label name="txtEvento_actual" 
                        id="txtEvento_actual">
                            <?php echo $idevento; ?>
                    </label>
                </h5>
                <div class="card-body">
                    <select class="form-control" id="select_idevento" onchange="cambiarEvento();">
                        <?php echo $evento_actual . $evento_lista;  ?>
                        <option>Evento 1999</option>
                    </select>
                    
                    <a href="#" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">CREAR EVENTO</a>
                </div>
            </div>
            <!-- 
                Mostrar evento actual, Editar evento
                crear nuevo evento
            -->

            <div class="card mt-2">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="txt_anio">Año Evento</label>
                            <input type="number" 
                                class="form-control" 
                                id="txt_anio" 
                                aria-describedby="anioHelp" 
                                placeholder="2000" 
                                value="<?php echo $anio_evento; ?>" 
                            >
                            <small id="emailHelp" class="form-text text-muted">Ingresar el numero del año.</small>
                        </div>
                        <div class="form-group">
                            <label for="txt_evento">Nombre Evento</label>
                            <input type="text" 
                                class="form-control" 
                                id="txt_evento" 
                                placeholder="GRAN EVENTO 2000 . . ." 
                                value="<?php echo $nombre_evento; ?>"
                            >
                        </div>
                        <div class="form-group form-check mt-2">
                            <input type="checkbox" 
                                class="form-check-input" 
                                id="check_estado"
                                <?php echo ($estado_evento == 1)?"checked":""; ?>
                            >
                            <label class="form-check-label" for="check_estado">Estado Evento</label>
                        </div>

                        <!-- Boton para actualizar datos -->
                        <button type="submit" 
                            class="btn btn-warning mt-2"
                            id="btn_actualizarEvento"
                            onclick="actualizarEvento(event);"
                        >
                                ACTUALIZAR
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <!-- MODA PARA LA CREACIÓN DEL UN NUEVO EVENTO -->
        <section>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CREAR EVENTO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <form>
                        <div class="form-group">
                            <label for="txt_anio_crear">Año Evento</label>
                            <input type="number"
                                class="form-control" 
                                id="txt_anio_crear" 
                                placeholder="2000"
                                value="<?php echo $anio_evento_crear; ?>" 
                            >
                            <small id="emailHelp" class="form-text text-muted">Ingresar el numero del año.</small>
                        </div>
                        <div class="form-group">
                            <label for="txt_evento_crear">Nombre Evento</label>
                            <input type="text" 
                                class="form-control" 
                                id="txt_evento_crear" 
                                placeholder="GRAN EVENTO 2000 . . ."
                            >
                        </div>
                        <div class="form-group form-check mt-2">
                            <input type="checkbox" 
                                class="form-check-input" 
                                id="check_estado_crear"
                                checked
                            >
                            <label class="form-check-label" for="check_estado_crear">Estado Evento</label>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="crearEventoNuevo();">Crear Evento</button>
                </div>
                </div>
            </div>
            </div>
        </section>


        <?php
        include_once('views/modules/cdnsfooter.html');
        ?>
        <script src="./views/js/js_evento.js"></script>

    </body>

</html>