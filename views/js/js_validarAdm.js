console.log("load js_validarAdm.js");

function ver(dni){
    console.log("ok ver ", dni);
    let el = document.querySelector("#imagen");
    el.innerHTML = '<img src="./public/img_voucher/2021'+dni+'.jpg" class="mx-auto img-fluid" alt="...">';
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
            //console.log(data);
            data.data.forEach(element => {
                console.log(element.dni)
                table_HTML += `
                        <tr class="table-success">
                            <th scope="row">${e_num++}</th>
                            <td>${element.dni}</td>
                            <td>${element.nombre}</td>
                            <td>${element.apellido}</td>
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
                `;
            });
            in_table.innerHTML = table_HTML;
        }else{
            in_table.innerHTML = '';
        }
    }, URL_AJAX_PROCESAR);
}

// cargar datos en la tabla
setTimeout(() => {
    execute_traerDocentesEvento();
}, 1500);