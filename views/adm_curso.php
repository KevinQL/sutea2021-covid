<!DOCTYPE html>
<html lang="es">
<head>
    
    <?php
        include_once('views/modules/cdnsheader.html');
    ?>

    <title>ADM_CARRERA</title>
</head>
<body onload="execute_curso_select('')">

    <?php
        include_once("views/modules/navegacion__.php");        
    ?>


    <!-- adm_carrera-->
    <div class="container mt-5">
        <h1 class="display-5 text-muted text-center">CURSO</h1>    
        <hr class="my-4">        
        <div class="">
            <div class="col-md-6 mx-auto">
                <div class="form-group">
                    <label for="txt_carrera">NOMBRE CURSO</label>
                    <input type="text" class="form-control" id="txt_carrera" aria-describedby="carreraHelp" placeholder="CONTABILIDAD Y FINANZAS...">
                    <small id="carreraHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="txt_fecha">FECHA DE INICIO</label>
                    <input type="text" class="form-control" id="txt_fecha" aria-describedby="fechaHelp" placeholder="11 DE MAYO">
                    <small id="fechaHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label class="control-label">COSTO</label>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$/</span>
                            </div>
                            <input type="text" class="form-control" id="txt_costo" aria-label="Amount (to the nearest soles)" placeholder="190.90" aria-describedby="costoHelp">
                            <div class="input-group-append">
                                <span class="input-group-text">SOLES</span>
                            </div>
                            <small id="costoHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="img_curso">Imagen Carrera</label>
                    <input type="file" class="form-control-file" id="img_curso" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                </div>
                <div class="form-group">
                    <label for="ordenSelect">ORDEN</label>
                    <select class="form-control" id="ordenSelect">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="lead form-group">
                    <button class="btn btn-primary btn-lg d-block w-100" onclick="execute_curso_insert()">Guardar Curso</button>                    
                </div>
            </div>
        </div>
    </div>


    <section class="container">
        <div class="row">
            <div class="col-md-12 py-3 text-center">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, nobis!
            </div>

            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr class="bg-secondary">
                            <th scope="col">#</th>
                            <th scope="col">Nombre Curso</th>
                            <th scope="col">Inicio de Clase</th>
                            <th scope="col">Costo</th>
                            <th scope="col">Orden</th>
                            <th scope="col">URL Imagen</th>
                            <th scope="col" class="text-center">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="tbl_list_curso">
                        <tr class="table-dark">
                            <th scope="row">Active</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                    </tbody>
                </table>             
            </div>
        </div>
    </section>

    <section class="p-5 mt-3">

    </section>


    <?php        
        include_once('views/modules/cdnsfooter.html');
        include_once('views/modules/file_session_footer.html');
    ?>

</body>
</html>