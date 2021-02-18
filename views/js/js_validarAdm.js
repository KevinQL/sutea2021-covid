console.log("load js_validarAdm.js");

function verVoucher(dni, ruta_voucher){
    //Marca el registro seleccionado
    let tablee_tr = document.querySelector("#tr"+dni);
    tablee_tr.style.background = 'rgba(204, 218, 209,.3)';

    // intercambia imagen dentro del modal
    let el = document.querySelector("#imagen");
    el.innerHTML = `
            <img src="./public/img_voucher/${ruta_voucher}" class="mx-auto img-fluid" alt="...">
        `;
}

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
                //console.log(element.dni)
                let btn_validar = `
                        <button type="button" class="btn btn-warning" onclick="validarRegistro('${element.iddecente}','${element.idregistro}','${element.estado}');">Validar</button>
                    `;
                if(element.estado === "1"){
                    btn_validar = `
                            <button type="button" class="btn btn-success" onclick="validarRegistro('${element.iddecente}','${element.idregistro}', '${element.estado}');">Validado</button>
                            `;
                }
                table_HTML += `
                        <tr class="" id="tr${element.dni}">
                            <th scope="row">${e_num++}</th>
                            <td>${element.dni}</td>
                            <td>${element.nombre}</td>
                            <td>${element.apellido}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="verVoucher('${element.dni}','${element.ruta_voucher}');">
                                ver
                                </button>
                            </td>
                            <td>
                                ${btn_validar}
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="eliminarRegistro('${element.iddecente}','${element.idregistro}', '${element.estado}');">Elimnar</button>
                                
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