console.log("load js_ponente.js");

function data_ponente(){
    // Elementos para imprmir la lista de los ponentes
    let tbl_lista = document.querySelector("#tbl_ponente");
    // Elementos crear ponente
    let txt_dni_crear = document.querySelector("#txt_dni_crear");
    let txt_nombre_crear = document.querySelector("#txt_nombre_crear");
    let txt_apellido_crear = document.querySelector("#txt_apellido_crear");
    let txt_obs_crear = document.querySelector("#txt_obs_crear");
    let check_estado_crear = document.querySelector("#check_estado_crear");
    let msj_user = document.querySelector("#msj_user");


    return {
        elements : {
            tbl_lista,
            txt_dni_crear,
            txt_nombre_crear,
            txt_apellido_crear,
            txt_obs_crear,
            check_estado_crear,
            msj_user
        },
        values : {
            txt_dni_crearv : txt_dni_crear.value.trim().toLowerCase(),
            txt_nombre_crearv : txt_nombre_crear.value.trim().toLowerCase(),
            txt_apellido_crearv : txt_apellido_crear.value.trim().toLowerCase(),
            txt_obs_crearv : txt_obs_crear.value.trim().toLowerCase(),
            check_estado_crearv : check_estado_crear.checked
        }
    };
}


/**
 * Obtener Lista de Ponentes
 */
function exe_obtenerListaPonentes(){
    let data = data_ponente();
    let {tbl_lista} = data.elements;

    dni = "";
    nombre = "";
    apellido = "";

    fetchKev('POST',{
            id : 'obtener-ponente-tbl',
            dni,
            nombre,
            apellido
        },
        res => {
            
            // console.log(res);

            if(res.operacion){
                sweetModalMin("Lista de Ponentes cargado","bottom-end",1500,"success")
                
                let data_html = ``;
                organizador = res.data_res;
                let cont = 0;
                organizador.forEach(element => {
                    data_html += `
                        <tr>
                            <th scope="row">${++cont}</th>
                            <td>${element.dni}</td>
                            <td>${element.nombre}</td>
                            <td>${element.apellido}</td>
                            <td>${element.estado}</td>
                            <td>
                                <button 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modal_upd_org"
                                    onclick="cargarParaActualizar('${element.idponente}');"
                                >
                                    Modif
                                </button>
                                <button onclick="eliminarRegistroOrganizador('${element.idponente}');">
                                    Elim
                                </button>
                            </td>
                        </tr>
                    `;
                });

                tbl_lista.innerHTML = data_html;

            }

        },
        URL_AJAX_PONENTE
    );


}

// ejeuta la funcion despues de que todos los elementos de la pagia se carguen .
window.onload = function (){
    exe_obtenerListaPonentes();
};

/**
 * 
 */
function obtenerPonente(){
    let data = data_ponente();
    let { txt_dni_crearv } = data.values;
    let { txt_nombre_crear,
        txt_apellido_crear,
        check_estado_crear, msj_user } = data.elements;

    fetchKev('POST',{
            id : 'obtener-ponente',
            txt_dni_crearv
        },
        res => {
            
            // console.log(res);
            
            if(res.informe_sys[2] != undefined){
                msj_user.style.color = "red";
                msj_user.innerHTML = res.informe_sys[2];
            }else{
                msj_user.innerHTML = "No registrado para el evento actual";
                msj_user.style.color = "";
            }

            if(res.operacion){
                
                ponente = res.data_res;

                txt_nombre_crear.value = ponente.nombre 
                txt_apellido_crear.value = ponente.apellido 
                check_estado_crear.checked = ponente.estado == "1"?true:false;  

            }else{
                txt_nombre_crear.value = ""
                txt_apellido_crear.value = ""
                check_estado_crear.checked = true;  
            }
        },
        URL_AJAX_PONENTE
    );

}


/**
 * 
 */
function agregarPonenteNuevo(){
    let data = data_ponente();
    let {
        txt_dni_crearv,
    txt_nombre_crearv,
    txt_apellido_crearv,
    txt_obs_crearv,
    check_estado_crearv
    } = data.values;

    fetchKev("POST",
        {
            id : "add-ponente",
            txt_dni_crearv,
            txt_nombre_crearv,
            txt_apellido_crearv,
            txt_obs_crearv,
            check_estado_crearv
        },
        res => {
            console.log(res);
        }
        ,
        URL_AJAX_PONENTE
    );

}