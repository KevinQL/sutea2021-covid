console.log("load js_validarAdm.js");


/**
 * 
 */
function dataHTML_validarAdm(){
    let txt_dni = document.querySelector("#txt_dni");
    let txt_nombre = document.querySelector("#txt_nombre");
    let txt_apellido = document.querySelector("#txt_apellido");

    return {
        elements : {
            txt_dni ,
            txt_nombre ,
            txt_apellido
        },
        values : {
            txt_dniv : txt_dni.value ,
            txt_nombrev : txt_nombre.value ,
            txt_apellidov : txt_apellido.value 
        }
    }
}

function execute_traerDocentesEvento(){

    let data = dataHTML_validarAdm();
    let {txt_dniv,
        txt_nombrev,
        txt_apellidov} = data.values;

    fetchKev("POST",{
        id:"exe-traerDocenteEvento",
        txt_dniv,
        txt_nombrev,
        txt_apellidov
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
                            onclick="validarRegistro('${element.iddecente}','${element.idregistro}','${element.estado}');">
                            <i class="fas fa-check"></i>
                        </button>
                    `;
                if(element.estado === "1"){
                    btn_validar = `
                            <button type="button" class="btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="Validado"
                                onclick="validarRegistro('${element.iddecente}','${element.idregistro}', '${element.estado}');">
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
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="verVoucher('${element.dni}','${element.ruta_voucher}','${element.num_operacion}');">
                                    <i class="fas fa-tags"></i>
                                </button>
                            </td>
                            <td>
                                ${btn_validar}
                            </td>
                            <td>
                            <button type="button" class="btn btn-outline-danger" onclick="eliminarRegistro('${element.iddecente}','${element.idregistro}', '${element.estado}', '${element.nombre} ${element.apellido}');">
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

// cargar datos en la tabla
setTimeout(() => {
    execute_traerDocentesEvento();
}, 500);

function validarRegistro(iddecente, idregistro, estado){
    console.log(iddecente, idregistro)

    fetchKev("POST",{
        id:"exe-validarRegistro",
        iddecente,
        idregistro,
        estado
    }, 
    data => {

        console.log(data);

        if(data.eval){
            sweetModalMin("Acción procesada",'center',1000,'success');
            setTimeout(() => {
                execute_traerDocentesEvento();
            }, 1200);
        }

    }, 
    URL_AJAX_PROCESAR );

}


function eliminarRegistro(iddecente, idregistro, estado, $nombreEliminar ){
    console.log(iddecente, idregistro, estado, $nombreEliminar)

    Swal.fire({
        title: 'Está seguro?',
        //text: `No podrá revertir esto para el docente ${$nombreEliminar}`,
        html: `No podrá revertir esto para el/la docente </br> <strong>${$nombreEliminar}</strong>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        //en el caso de que desee borrar
        if (result.isConfirmed) {

            fetchKev("POST",{
                id:"exe-eliminarRegistro",
                iddecente,
                idregistro,
                estado
            }, 
            data => {

                console.log(data);
                console.log(data.msj)
                if(data.eval){
                    sweetModalMin(data.msj,'center',1000,'success');
                    setTimeout(() => {
                        execute_traerDocentesEvento();
                    }, 1200);
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
