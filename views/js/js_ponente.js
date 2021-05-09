console.log("load js_ponente.js");

function data_ponente(){

    // mostrar archivos: img ponente y lista de archivos ponente
    let list_doc = document.querySelector(".list_doc");
    let foto_ponente_upd = document.querySelector("#foto_ponente_upd");
    //para actuaizar archivos 
    let file_foto_upd = document.querySelector("#file_foto_upd");
    let file_doc_upd = document.querySelector("#file_doc_upd");
    // Elementos para actualizar
    let txt_idponente_upd = document.querySelector("#txt_idponente_upd");
    let txt_dni_upd = document.querySelector("#txt_dni_upd");
    let txt_nombre_upd = document.querySelector("#txt_nombre_upd");
    let txt_apellido_upd = document.querySelector("#txt_apellido_upd");
    let txt_obs_upd = document.querySelector("#txt_obs_upd");
    let check_estado_upd = document.querySelector("#check_estado_upd");
    // Elementos crear ponente
    let txt_dni_crear = document.querySelector("#txt_dni_crear");
    let txt_nombre_crear = document.querySelector("#txt_nombre_crear");
    let txt_apellido_crear = document.querySelector("#txt_apellido_crear");
    let txt_obs_crear = document.querySelector("#txt_obs_crear");
    let check_estado_crear = document.querySelector("#check_estado_crear");
    let msj_user = document.querySelector("#msj_user");
    // Elementos para imprmir la lista de los ponentes
    let tbl_lista = document.querySelector("#tbl_ponente");


    return {
        elements : {
            foto_ponente_upd,
            list_doc,

            file_foto_upd,
            file_doc_upd,

            txt_idponente_upd,
            txt_dni_upd,
            txt_nombre_upd,
            txt_apellido_upd,
            txt_obs_upd,
            check_estado_upd,

            tbl_lista,
            txt_dni_crear,
            txt_nombre_crear,
            txt_apellido_crear,
            txt_obs_crear,
            check_estado_crear,
            msj_user
        },
        values : {
            txt_idponente_updv : txt_idponente_upd.value.trim().toLowerCase(),
            txt_dni_updv : txt_dni_upd.value.trim().toLowerCase(),
            txt_nombre_updv : txt_nombre_upd.value.trim().toLowerCase(),
            txt_apellido_updv : txt_apellido_upd.value.trim().toLowerCase(),
            txt_obs_updv : txt_obs_upd.value.trim().toLowerCase(),
            check_estado_updv : check_estado_upd.checked,

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
                                <button onclick="eliminarRegistroPonente('${element.idponente}');">
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
            if(res.operacion){
                sweetModal("Insertado", "center","success",1300);
                setTimeout(() => {
                    exe_obtenerListaPonentes();
                    window.location.reload();
                }, 1300);
            }
        }
        ,
        URL_AJAX_PONENTE
    );

}

/**
 * 
 */
function eliminarRegistroPonente(idponente){
    fetchKev("POST",
        {
            id:"eliminar-ponente",
            idponente
        },
        res => {
            console.log(res);
            if(res.operacion){
                sweetModal("Eliminado", "center","success",1300);
                setTimeout(() => {
                    exe_obtenerListaPonentes();
                    // window.location.reload();
                }, 1300);
            }
        },
        URL_AJAX_PONENTE
    )
}

/**
 * 
 */
function cargarParaActualizar(idponente){
    fetchKev("POST",
        {
            id:"obtener-ponente-upd",
            idponente
        },
        res => {
            console.log(res);
            if(res.operacion){
                let element = res.data_res;
                sweetModal("cargando!", "center","success",1300);
                let data = data_ponente();
                let {
                    txt_idponente_upd,
                    txt_dni_upd,
                    txt_nombre_upd,
                    txt_apellido_upd,
                    txt_obs_upd,
                    check_estado_upd,
                    list_doc,
                    foto_ponente_upd
                    } = data.elements;

                txt_idponente_upd.value = element.idponente
                txt_dni_upd.value = element.dni
                txt_nombre_upd.value = element.nombre
                txt_apellido_upd.value = element.apellido
                txt_obs_upd.value = element.observacion
                check_estado_upd.checked = element.estado == "1" ? true:false

                //lista documentos 
                let documentos = res.data_res_doc;
                let doc_html = ``;
                documentos.forEach(documento => {

                    doc_html += `
                        <li>${documento}</li>
                    `;
                });
                if(doc_html.trim().length == 0){
                    doc_html = "Carpeta vacia!"
                }
                list_doc.innerHTML = doc_html;

                // Foto ponente
                foto_ponente_upd.src = ``;
                setTimeout(() => {
                    const f = new Date();
                    foto_ponente_upd.src = `./public/ponentes/${element.dni}/ponente.jpg?nocache=${f.getSeconds()}`;
                }, 1500);

            }
        },
        URL_AJAX_PONENTE
    )
}



/**
 * 
 */
function actualizarPonente(){
    let data = data_ponente();
    let {
        txt_idponente_updv,
        txt_dni_updv,
        txt_nombre_updv,
        txt_apellido_updv,
        txt_obs_updv,
        check_estado_updv
    } = data.values;

    fetchKev("POST",{
            id:"upd-ponente",
            txt_idponente_updv,
            txt_dni_updv,
            txt_nombre_updv,
            txt_apellido_updv,
            txt_obs_updv,
            check_estado_updv
        },
        res => {
            console.log(res)
            if(res.operacion){
                sweetModal("Actualizado!", "center","success",1300);
                setTimeout(() => {
                    exe_obtenerListaPonentes();
                    // window.location.reload();
                }, 1300);
            }
        },
        URL_AJAX_PONENTE
    );

}


/**
 * Subir foto ponente
 */
function subirFotoPonente(){

    let data = data_ponente();

    let {file_foto_upd, foto_ponente_upd} = data.elements;
    let {txt_dni_updv} = data.values;
    let file_foto_updv = file_foto_upd.files[0];
    
    console.log(file_foto_upd.files)

    fetchFileKev("POST",{
            id : "subir_foto_ponente",
            txt_dni_updv
        },{
            file_foto_updv
        },
        res=>{
            console.log(res)
            if(res.operacion){
                sweetModal("Listo!", "center","success",1300);
                // Foto ponente
                foto_ponente_upd.src = ``;
                setTimeout(() => {
                    const f = new Date();
                    foto_ponente_upd.src = `./public/ponentes/${txt_dni_updv}/ponente.jpg?nocache=${f.getSeconds()}`;
                }, 500);
            }
        },
        URL_AJAX_PONENTE
    )

}


/**
 * 
 */
function subirDocumentosPonente(){
    let data = data_ponente();
    let {file_doc_upd, list_doc} = data.elements
    let {txt_dni_updv} = data.values
    let file_doc_updv = file_doc_upd.files[0];

    console.log(file_doc_upd.files)

    fetchFileKev("POST",{
            id : "subir_doc_ponente",
            txt_dni_updv
        },{
            file_doc_updv
        },
        res=>{
            console.log(res)
            if(res.operacion){
                sweetModal("Listo documento!", "center","success",1300);

                //lista documentos 
                let documentos = res.data_res_doc;
                let doc_html = ``;
                documentos.forEach(documento => {

                    doc_html += `
                        <li>${documento}</li>
                    `;
                });
                if(doc_html.trim().length == 0){
                    doc_html = "Carpeta vacia!"
                }
                list_doc.innerHTML = doc_html;
            }
        },
        URL_AJAX_PONENTE
    )    
}