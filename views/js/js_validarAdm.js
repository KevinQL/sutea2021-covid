console.log("load js_validarAdm.js");


/**
 * Data element an value, of the form Module Validar
 */
function dataHTML_validarAdm(){
    let txt_dni = document.querySelector("#txt_dni");
    let txt_nombre = document.querySelector("#txt_nombre");
    let txt_apellido = document.querySelector("#txt_apellido");
    let sl_ugelr = document.querySelector("#sl_ugelr");

    return {
        elements : {
            txt_dni ,
            txt_nombre ,
            txt_apellido,
            sl_ugelr
        },
        values : {
            txt_dniv : txt_dni.value.trim().toLowerCase() ,
            txt_nombrev : txt_nombre.value.trim().toLowerCase() ,
            txt_apellidov : txt_apellido.value.trim().toLowerCase(),
            sl_ugelrv: sl_ugelr.value.trim().toLowerCase()
        }
    }
}

/**
 * 
 */
function setSelectUgel($this){

    /**
     * - Almacenamos el valor de ugel en el localStorage del cliente.
     * - Crea un clave-valor para el elemento select-ugel
     */
    localStorage.setItem('ugel', $this.value.trim().toLowerCase());
    
    /**
     * Obtenemos el valor de ugel desde el localstorage, para mostrarlo en el testdata
     */
    let value = localStorage.getItem('ugel');

    /**
     * Data test - localStorage
     */
    console.log({
        info: "data value ugel selecting saved",
        response: value
    });
}



/**
 * Esta función se ejecuta cuando se completa la carga de la página, y antes que se cargue la tabla de
 * registros de los docentes inscritos
 */
 function getSelectUgel(){

    /**
     * Obtiene el valor de la ugel desde el localStorage. 
     * En el caso de que no exista el localStorage devuelve null, entoces develve 'todo'
     */
    let value = localStorage.getItem('ugel') ? localStorage.getItem('ugel').toLocaleLowerCase():'todo';

    /**
     * Data test - localStorage
     */
    console.log({
        info: "Obteniendo datavalue ugel con localStorage",
        response: {v: value}
    });

    return value;
}



/**
 * - Obtiene todos los registros de la tabla de los docente inscritos en el evento activo.
 * - Carga los datos con los filtros configurados previamente en la vista
 */
function execute_traerDocentesEvento(){

    let data = dataHTML_validarAdm();
    let {txt_dniv,
        txt_nombrev,
        txt_apellidov,
        sl_ugelrv
        } = data.values;

    /**
     * Test Data - form validar admin
     */
    console.log({
        info: "Data value - form validar",
        response: data
    })

    /**
     * Enviamos los datos al servidor con los filtros de la vista
     */
    fetchKev("POST",{
        id:"exe-traerDocenteEvento",
        txt_dniv,
        txt_nombrev,
        txt_apellidov,
        sl_ugelrv
    }, 
    data => {
        const in_table = document.querySelector("#tableListDocente");
        let table_HTML = ``;
        let e_num = 1;
        if (data.eval) {
            console.log(data);
            data.data.forEach(element => {
                let btn_validar = `
                        <button type="button" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="bottom" title="Validar"
                            onclick="validarRegistro('${element.iddecente}','${element.idregistro}','${element.estado}','${element.nombre}','${element.dni}');">
                            <i class="fas fa-check"></i>
                        </button>
                    `;
                if(element.estado === "1"){
                    btn_validar = `
                            <button type="button" class="btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="Validado"
                                onclick="validarRegistro('${element.iddecente}','${element.idregistro}', '${element.estado}','${element.nombre}','${element.dni}');">
                                <i class="fas fa-check-double"></i>
                            </button>
                            `;
                }
                table_HTML += `
                        <tr class="" id="tr${element.dni}">
                            <th scope="row">${e_num++}</th>
                            <td>${element.dni}</td>
                            <td>${element.nombre}</td>
                            <td>${element.apellido}</td>
                            <td>${element.celular}</td>
                            <td>${element.ugelr}</td>

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal" 
                                    class="btn btn-outline-primary" 
                                    onclick="verVoucher('${element.dni}','${element.ruta_voucher}','${element.num_operacion}');"
                                >
                                    <i class="fas fa-tags"></i>
                                </button>
                            </td>

                            <td>
                                ${btn_validar}
                            </td>

                            <td>
                                <button 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modal_upd_docente"
                                    type="button" class="btn btn-outline-success"
                                    onclick="actualizarRegistro_data('${element.iddecente}','${element.idregistro}');"
                                >
                                    <i class="fas fa-edit"></i>
                                </button>                     
                            </td>

                            <td>
                                <button type="button" 
                                    class="btn btn-outline-danger" 
                                    onclick="eliminarRegistro('${element.iddecente}','${element.idregistro}', '${element.estado}', '${element.nombre} ${element.apellido}');"
                                >
                                    <i class="fas fa-trash-alt"></i>
                                </button>                        
                            </td>
                        </tr>
                `;
            });
            in_table.innerHTML = table_HTML;
        }else{
            in_table.innerHTML = '';
        }
    }, 
    URL_AJAX_PROCESAR );
}


/**
 * Se cargan los datos en la tabla de la vista, después de un determinado tiempo
 * Después de que la ventana se carga completamente ejecutar el bloque de codigo con las funciones
 */
window.onload = (event) => {

    /**
     * - Definimos los indices para el elemento select - ugel
     * - Los indices vienen dados por el orden que se encuentran en la estructura html
     * - Es preciso utilizar indices numericos, por que los literales no se aceptan con js
     */
    let data_sl_ugel = {
        todo : 0,
        abancay : 1,
        andahuaylas : 2,
        antabamba : 3,
        aymaraes : 4,
        cotabambas : 5,
        chincheros : 6,
        grau : 7,
        huancarama : 8
    };

    /**
     * - Obtenemos la ugel que se guardo en el localStorage
     * - Previamente el usuario habrá, o no escogido una ugel
     */
    let value = getSelectUgel();    

    /**
     * Se cambia la ugel en el elemento html Select
     */
    document.querySelector("#sl_ugelr").selectedIndex = data_sl_ugel[value];

    /**
     * - Se obtiene la tabla de registros de a cuerdo a los filtros establecidos
     * - Establecemos que el codigo se ejecutará después de 100mls para no tener problemas con la
     * obtenesión de los valores de los filtros. * Se ha probado sin el settime, y funciona igual
     */
    setTimeout(() => {
        execute_traerDocentesEvento();
    }, 100);

}


/**
 * Funcion para validar el registro de una inscripción
 * 
 */
function validarRegistro(iddecente, idregistro, estado, nombre, dni){

    /**
     * Test data accion validar inscripcion 
     */
    console.log({
        info: "data para validar registro",
        response: {iddecente, idregistro, estado}
    })

    /**
     * Preguntar si quiere realizar la acción 
     */
     Swal.fire({
        title: 'Está seguro?',        
        html: `Validar acción para </br> <strong>${nombre} - ${dni}</strong>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Ejecutar!'
    }).then((result) => {
        //en el caso de que desee borrar
        if (result.isConfirmed) {
            /**
             * Enviando datos al servidor para procesar la validación del registro
             */
            fetchKev("POST",
                {
                    id:"exe-validarRegistro",
                    iddecente,
                    idregistro,
                    estado
                }, 
                data => {
                    /**
                     * test data respuesta servidor
                     */
                    console.log({
                        info: "response server data. Mod validar",
                        response: data
                    });
        
                    /**
                     * Si los datos se procesaron satisfactoriamente
                     */
                    if(data.eval){
        
                        sweetModalMin("Acción procesada",'center',1000,'success');
        
                        /**
                         * actualizar tabla de registros después de un tiempo determinado
                         */
                        setTimeout(() => {
                            execute_traerDocentesEvento();
                        }, 1200);
                    }
        
                }, 
                URL_AJAX_PROCESAR 
            );
        
        }
        else{
            sweetModalMin("Sin acciones.",'center',1000,'info');
        }
    });


}


/**
 * Empaquetando las variables para actualizar los registros DECENTE y REGISTRO
 */
function data_updModValidar(){
    /**
     * data view para REGISTRO
     */
    let txtupd_idregistro_registro = document.querySelector("#txtupd_idregistro_registro");
    let txtupd_anio_registro = document.querySelector("#txtupd_anio_registro");
    let txtupd_fecha_registro = document.querySelector("#txtupd_fecha_registro");
    let txtupd_numoperacion_registro = document.querySelector("#txtupd_numoperacion_registro");
    let txtupd_ugel_registro = document.querySelector("#txtupd_ugel_registro");
    let txtupd_especialidad_registro = document.querySelector("#txtupd_especialidad_registro");
    let txtupd_tipoPersona_registro = document.querySelector("#txtupd_tipoPersona_registro");
    /**
     * Data view para DECENTE
     */
    let txtupd_iddecente_decente = document.querySelector("#txtupd_iddecente_decente");
    let txtupd_dni_decente = document.querySelector("#txtupd_dni_decente");
    let txtupd_nombre_decente = document.querySelector("#txtupd_nombre_decente");
    let txtupd_apellido_decente = document.querySelector("#txtupd_apellido_decente");
    let txtupd_celular_decente = document.querySelector("#txtupd_celular_decente");
    let txtupd_correo_decente = document.querySelector("#txtupd_correo_decente");
    let txtupd_ugel_decente = document.querySelector("#txtupd_ugel_decente");
    let txtupd_especialidad_decente = document.querySelector("#txtupd_especialidad_decente");
    let txtupd_tipoPersona_decente = document.querySelector("#txtupd_tipoPersona_decente");

    /**
     * Empaquetamos la data de la vista, y devolvemos.
     */
    return {
        elements: {
            txtupd_idregistro_registro,
            txtupd_anio_registro,
            txtupd_fecha_registro,
            txtupd_numoperacion_registro,
            txtupd_ugel_registro,
            txtupd_especialidad_registro,
            txtupd_tipoPersona_registro,

            txtupd_iddecente_decente,
            txtupd_dni_decente,
            txtupd_nombre_decente,
            txtupd_apellido_decente,
            txtupd_celular_decente,
            txtupd_correo_decente,
            txtupd_ugel_decente,
            txtupd_especialidad_decente,
            txtupd_tipoPersona_decente
        },
        values: {
            txtupd_idregistro_registrov : txtupd_idregistro_registro.value.trim().toLowerCase() ,
            txtupd_anio_registrov : txtupd_anio_registro.value.trim().toLowerCase() ,
            txtupd_fecha_registrov : txtupd_fecha_registro.value.trim().toLowerCase() ,
            txtupd_numoperacion_registrov : txtupd_numoperacion_registro.value.trim().toLowerCase() ,
            txtupd_ugel_registrov : txtupd_ugel_registro.value.trim().toLowerCase() ,
            txtupd_especialidad_registrov : txtupd_especialidad_registro.value.trim().toLowerCase() ,
            txtupd_tipoPersona_registrov : txtupd_tipoPersona_registro.selectedIndex ,

            txtupd_iddecente_decentev : txtupd_iddecente_decente.value.trim().toLowerCase() ,
            txtupd_dni_decentev : txtupd_dni_decente.value.trim().toLowerCase() ,
            txtupd_nombre_decentev : txtupd_nombre_decente.value.trim().toLowerCase() ,
            txtupd_apellido_decentev : txtupd_apellido_decente.value.trim().toLowerCase() ,
            txtupd_celular_decentev : txtupd_celular_decente.value.trim().toLowerCase() ,
            txtupd_correo_decentev : txtupd_correo_decente.value.trim().toLowerCase() ,
            txtupd_ugel_decentev : txtupd_ugel_decente.value.trim().toLowerCase() ,
            txtupd_especialidad_decentev : txtupd_especialidad_decente.value.trim().toLowerCase() ,
            txtupd_tipoPersona_decentev : txtupd_tipoPersona_decente.selectedIndex 
        }
    }
}


/**
 * Obtener Data para actualizar en modulo Validar
 * Los datos se mostrarán en el modal que se habre y cubre toda la pantalla de la página
 * @param {*} iddecente 
 * @param {*} idregistro 
 */
function actualizarRegistro_data(iddecente, idregistro){
    
    /**
     * Obtenemos los elementos de la vista - formulario actualizar registro
     */
    let {
        txtupd_idregistro_registro,
        txtupd_anio_registro,
        txtupd_fecha_registro,
        txtupd_numoperacion_registro,
        txtupd_ugel_registro,
        txtupd_especialidad_registro,
        txtupd_tipoPersona_registro,

        txtupd_iddecente_decente,
        txtupd_dni_decente,
        txtupd_nombre_decente,
        txtupd_apellido_decente,
        txtupd_celular_decente,
        txtupd_correo_decente,
        txtupd_ugel_decente,
        txtupd_especialidad_decente,
        txtupd_tipoPersona_decente
    } = data_updModValidar().elements;


    fetchKev("POST",{
        id:"exe-getdataUpdate_ModValid",
        iddecente,
        idregistro
    }, 
    data => {

        console.log(data);
        if(data.eval){
            sweetModalMin("Acción procesada",'center',1000,'success');
            
            $dataupd = data.data[0];

            /**
             * Show data on the modal to update 
             */
            txtupd_idregistro_registro.value = $dataupd.idregistro;
            txtupd_anio_registro.value = $dataupd.anio;
            txtupd_fecha_registro.value = $dataupd.fecha_registro;
            txtupd_numoperacion_registro.value = $dataupd.num_operacion;
            txtupd_ugel_registro.value = $dataupd.ugelr;
            txtupd_especialidad_registro.value = $dataupd.especialidadr;
            txtupd_tipoPersona_registro.selectedIndex = $dataupd.tipo_personar;

            txtupd_iddecente_decente.value = $dataupd.iddecente
            txtupd_dni_decente.value = $dataupd.dni
            txtupd_nombre_decente.value = $dataupd.nombre
            txtupd_apellido_decente.value = $dataupd.apellido
            txtupd_celular_decente.value = $dataupd.celular
            txtupd_correo_decente.value = $dataupd.correo
            txtupd_ugel_decente.value = $dataupd.ugel
            txtupd_especialidad_decente.value = $dataupd.especialidad
            txtupd_tipoPersona_decente.selectedIndex = $dataupd.tipo_persona

        }

    }, 
    URL_AJAX_PROCESAR );
}

function actualizarRegistro_modValidar(){

    /**
     * Test impresion data
     */
    console.log(
        {
            info: "valores del formulario de actualización",
            response: data_updModValidar().values // Se obtienen los valores de los datos del viewform
        }
    );

    /**
     * Modal de espera - cargando proceso
     */
    sweetModalCargando();

    /**
     * Enviamos los datos al servidor 
     */
    fetchKev("POST",{
        id:"exe-setdataUpdate_ModValid",
        env_dta: data_updModValidar().values
    }, 
    data => {
        /**
         * Test impresión data
         */
        console.log({
            info: 'response servidor actualización registro',
            response: data}
        );
                
        /**
         * Si los datos se procesan satisfactoriamente
         */
        if(data.eval){
            /**
             * Mensaje modal de la acción
             */
            sweetModalMin("La actualizació se completo!",'center',1000,'success');

            /**
             * Actualizar la tabla de registros
             */
             execute_traerDocentesEvento();

        /**
         * En el caso de que no se actualice, o no haya algo para actaulizar
         */
        }else{
            sweetModalMin("No actualizado!",'center',1000,'info');
        }

    }, 
    URL_AJAX_PROCESAR );

}



/**
 * Eliminar registro de la tabla
 */
function eliminarRegistro(iddecente, idregistro, estado, $nombreEliminar ){

    /**
     * Test data eliminar registro 
     */
    console.log({
        info: "Data función eliminar registro",
        response: {iddecente, idregistro, estado, $nombreEliminar}
    });

    /**
     * Mensaje de confirmación de acción 
     */
    Swal.fire({
        title: 'Está seguro?',        
        html: `No podrá revertir esto para el/la docente </br> <strong>${$nombreEliminar}</strong>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        
        /**
         * Si se confirma la acción del mensje
         */
        if (result.isConfirmed) {
            /**
             * Modal de cargando proceso
             */
            sweetModalCargando();

            /**
             * Enviar datos al servidor para eliminar registro
             */
            fetchKev("POST",{
                id:"exe-eliminarRegistro",
                iddecente,
                idregistro,
                estado
            }, 
            data => {

                /**
                 * Data respuesta del servidor
                 */
                console.log({
                    info: "respuesta data del servidor",
                    response: data
                });

                /**
                 * Si el datos se procesaron satisfactoriamente
                 */
                if(data.eval){
                    /**
                     * Mostrar msj al usuario - registro eliminado
                     */
                    sweetModalMin('Eliminado!!','center',1000,'success');

                    /**
                     * Refrescar la tabla de registros de la vista
                     */
                    setTimeout(() => {
                        //alert('hola mundo')
                        execute_traerDocentesEvento();
                    }, 500);

                }else{
                    sweetModalMin("Accion invalidado!",'center',1500,'warning');
                }

            }, 
            URL_AJAX_PROCESAR );
        
        }
        else{
            sweetModalMin("Sin acciones.",'center',1000,'info');
        }
    });

}




//Click para generar el modal 
/**
 * 
 * @param {*} dni 
 * @param {*} ruta_voucher 
 * @param {*} num_operacion 
 */
function verVoucher(dni, ruta_voucher, num_operacion){
    //Marca el registro seleccionado
    let tablee_tr = document.querySelector("#tr"+dni);
    tablee_tr.style.background = 'rgba(204, 218, 209,.3)';

    // intercambia imagen dentro del modal
    let el = document.querySelector("#imagen");
    el.innerHTML = `
            <img src="./public/img_voucher/${ruta_voucher}" class="mx-auto img-fluid" alt="...">
        `;

    // imprime el numero de operacion
    let operacion = document.querySelector("#res_operacion");
    num_operacion = num_operacion.trim() === "" ? "Sin numero.":num_operacion;
    operacion.innerHTML = `${num_operacion}`;
}
