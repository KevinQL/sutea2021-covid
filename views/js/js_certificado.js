console.log("load file js_certificado.js")

function data_certificado(){

    //Listas tema
    let lc_tema = document.querySelectorAll("#lc_tema");
    let txt_tema = document.querySelector("#txt_tema");
    let lista_temas = document.querySelector("#lista_temas");
    let lista_x_defecto = document.querySelector("#lista_x_defecto");
    //contenido
    let txt_contenido = document.querySelector("#txt_contenido");
    let contenido_x_defecto = document.querySelector("#contenido_x_defecto");
    //certificado img
    let input_certificado = document.querySelector("#input_certificado");
    let estado_certi = document.querySelector("#estado_certi");
    let img_certificado = document.querySelector("#img_certificado");
    //seleccion tipo persona
    let s_tp_persona = document.querySelector("#s_tp_persona");

    return {
        elements : {
            txt_tema,
            lc_tema,

            lista_x_defecto,
            input_certificado,
            lista_temas,
            txt_contenido,
            img_certificado,
            estado_certi,
            s_tp_persona
        },
        values : {
            txt_temav : txt_tema.value.trim().toLowerCase(),

            lista_x_defectov : lista_x_defecto.checked,

            contenido_x_defectov : contenido_x_defecto.checked,
            txt_contenidov : txt_contenido.value.trim().toLowerCase(),

            input_certificadov : input_certificado.files[0],
            estado_certiv : estado_certi.checked,
            s_tp_personav : s_tp_persona.value.trim().toLowerCase()
        }
    };

}


/**
 * 
 */
function editarTema(){
    let data = data_certificado();
    let {txt_temav} = data.values;
    let {txt_tema} = data.elements;

    let temas_arr = obtenerTemasSeleccionados();

    // volviendo a colocar el tema que se elimina missterrriosaamente...
    txt_tema.value = txt_temav;

    if(temas_arr.length == 1 && temas_arr[0].id != "vacio" && txt_temav.length != 0){

        let id_temav = temas_arr[0].id;

        fetchKev("POST",{
                id : "editar-tema",
                txt_temav,
                id_temav
            },
            res => {
                console.log(res);

                if(res.operacion){
                    sweetModal("Editado!","center","success",1200);
                    //actualizar la lista de temas.

                    setTimeout(() => {
                        actualizarListaTemas();
                    }, 1200);
                }
            },
            URL_AJAX_CERTIFICADO
        );
    }else{
        sweetModal("No se selecciono tema!","center","warning",1200);
    }

}


/**
 * 
 */
function guardarTema(){
    let data = data_certificado();
    let { txt_temav,
        s_tp_personav,
        lista_x_defectov } = data.values;

    s_tp_personav = lista_x_defectov? 1 : s_tp_personav;
        
    if(txt_temav != ""){
        fetchKev("POST",{
                id : "guardar-tema",
                s_tp_personav,
                txt_temav
            },
            res => {
                console.log(res);
                //actualizar la lista de temas.
                sweetModal("guardando!","center","success",1200);
                setTimeout(() => {
                    actualizarListaTemas();
                }, 1200);
    
            },
            URL_AJAX_CERTIFICADO
        );
    }else{
        sweetModal("Tiene que ingresar contenido!","center","warning",1200);
    }
}


/**
 * 
 */
function eliminarTema(){
    let data = data_certificado();
    let { s_tp_personav, 
        lista_x_defectov } = data.values
    let temas_arr = obtenerTemasSeleccionados();

    s_tp_personav = lista_x_defectov? 1 : s_tp_personav;
    // console.log(temas_arr);

    fetchKev("POST",{
            id : "eliminar-temas",
            s_tp_personav,
            temas_arr
        },
        res => {
            console.log(res);
            //actualizar la lista de temas.
            actualizarListaTemas();

        },
        URL_AJAX_CERTIFICADO
    );
    
}


/**
 * Obtiene los temas que se seleccionan en la lista
 */
function obtenerTemasSeleccionados(){
    let data = data_certificado();
    let {lc_tema, txt_tema} = data.elements

    // console.log(lc_tema);
    let temas_selec = [];
    let cont = 0; // cuenta cuantos temas se seleccionarn
    lc_tema.forEach(element => {
        if(element.checked){
            cont++;
            temas_selec.push({ 
                    id : element.value,
                    tema : element.getAttribute("contenido")
                }
            );
        }
    });

    // coloca el tema seleccionado para ser editado 
    if(cont === 1){
        txt_tema.value = temas_selec[0].tema
    }else{
        txt_tema.value = "";
    }

    // console.log("result: ", temas_selec)

    return temas_selec;
}


/**
 * 
 */
function actualizarListaTemas(){
    let data = data_certificado();
    let {lista_temas} = data.elements
    let {s_tp_personav, 
        lista_x_defectov} = data.values

    // Precisa cual contido debería traer.
    s_tp_personav = lista_x_defectov? 1 : s_tp_personav;

    fetchKev("POST",{
            id : "obtener-lista-temas",
            s_tp_personav
        },
        res => {
            console.log(res);
            let temas_html= ``;
            if(res.operacion){
                sweetModalMin("Obteniendo Temas!","bottom-end",1200,"success");
                // this code update in an apart function
                let temas = res.data_certificado_temario
                temas.forEach(elem_tema => {
                    temas_html += `
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" aria-label="..." 
                                contenido="${elem_tema.tema}"
                                value="${elem_tema.idtemario_certificado}"
                                id="lc_tema"
                                onchange="obtenerTemasSeleccionados()"
                            >
                            <span id="${elem_tema.idtemario_certificado}">
                            ${elem_tema.tema}
                            </span>
                        </li>
                    `;
                });
                lista_temas.innerHTML = temas_html;
            }else{
                temas_html += `
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" aria-label="..."
                                contenido=""
                                value="vacio"
                                id="lc_tema"
                            >
                            No hay temas
                        </li>
                    `;
                lista_temas.innerHTML = temas_html;
            }
        },
        URL_AJAX_CERTIFICADO
    );

}


/**
 * 
 */
function actualizarContenido(){
    let data = data_certificado();
    let {s_tp_personav, contenido_x_defectov} = data.values
    let {txt_contenido} = data.elements

    // Precisa cual contido debería traer.
    s_tp_personav = contenido_x_defectov? 1 : s_tp_personav;

    fetchKev("POST",{
            id : "obtener-contenido",
            s_tp_personav
        },
        res => {
            console.log(res);
            if(res.operacion){
                let contenido = res.data_res;
                sweetModalMin("Obteniendo contenido!","bottom-end",1200,"success");
                txt_contenido.value = `${contenido.contenido_principal}`;
            }
        },
        URL_AJAX_CERTIFICADO
    );
}


/**
 *
 */
function guardarContenido(){
    let data = data_certificado();
    let {s_tp_personav,
        contenido_x_defectov,
        txt_contenidov
        } = data.values

    s_tp_personav = contenido_x_defectov? 1 : s_tp_personav;

    fetchKev("POST",{
            id : "guardar-contenido",
            s_tp_personav,
            contenido_x_defectov,
            txt_contenidov
        },
        res => {
            // console.log(res);
            if(res.operacion){
                sweetModalMin("Guardando contenido!","bottom-end",1200,"success");
            }
        },
        URL_AJAX_CERTIFICADO
    );
}


/**
 *
 */
function subirCertificado(){
    //evitaer el submit
    event.preventDefault();

    let data = data_certificado();
    let {img_certificado} = data.elements
    let {input_certificadov, s_tp_personav} = data.values

    // console.log(input_certificadov)
    // console.log(img_certificado)

    fetchFileKev("POST",{
            id : "subir-certificado",
            s_tp_personav
        },{
            input_certificadov
        },
        res=>{
            console.log(res)
            if(res.operacion){
                sweetModal("Subido!","center","success",1200);
                //actualizando imagencertificado en la interfaz
                const f = new Date();
                img_certificado.src = `.${res.ruta}?nocache=${f.getSeconds()}`;
            }
        },
        URL_AJAX_CERTIFICADO
    );

}

/**
 * Función para cambiar el estado del certificado
 */
function cambiarEstadoTPersona(){
    let data = data_certificado();
    let {estado_certiv,
        s_tp_personav} = data.values

    fetchKev("POST",{
            id:"cambiar-estado",
            estado_certiv,
            s_tp_personav
        },
        res=>{
            // console.log(res)
            if(res.operacion){
                sweetModalMin("actualizado!","bottom-end",1200,"success");
            }
        },
        URL_AJAX_CERTIFICADO
    );
}


//Obtenre datos por defecto (Asistente)
window.onload = function(){
    cambiarTPersona();

    setTimeout(() => {
        actualizarContenido();
        actualizarListaTemas()
    }, 2000);
}

// Evento cuando se carga la pagina y cuando el usuario cambia de persona.
// Trae los datos que se corresponden al tipo de persona seleccionado
function cambiarTPersona(){
    let data = data_certificado();
    let {s_tp_personav} = data.values

    console.log("selected ",s_tp_personav)

    fetchKev('POST',{
            id : 'obtener-data-certificado',
            s_tp_personav
        },
        res => {

            console.log(res);

            if(res.operacion){
                let certificado = res.data_certificado;

                let {
                    lista_temas,
                    txt_contenido,
                    img_certificado,
                    estado_certi
                } = data.elements;

                // this code show in the page 
                estado_certi.checked = certificado.estado=="1"? true:false;
                let f = new Date();
                img_certificado.src = "."+certificado.ruta + `?nocache=${f.getSeconds()}`;

                txt_contenido.value = certificado.contenido_principal //esto se actualiza en un función separada.
                
                // this code update in an apart function
                let temas = res.data_temas
                let temas_html= ``;
                temas.forEach(elem_tema => {
                    temas_html += `
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" aria-label="..."
                                value="${elem_tema.idtemario_certificado}"
                                id="lc_tema"
                            >
                            ${elem_tema.tema}
                        </li>
                    `;
                });
                lista_temas.innerHTML = temas_html;

                //obtener contenido del certificado
                actualizarContenido();

                //obtener Lista de los temas delcertificado
                actualizarListaTemas();
            }

        },
        URL_AJAX_CERTIFICADO
    );

}