console.log("js_organizador load!!");

function data_organizador(){
    let dni_c = document.querySelector("#txt_dni_crear");
    let nombre_c = document.querySelector("#txt_nombre_crear");
    let apellido_c = document.querySelector("#txt_apellido_crear");
    let celular_c = document.querySelector("#txt_celular_crear");
    let correo_c = document.querySelector("#txt_correo_crear");
    let nivel_c = document.querySelector("#txt_nivel_crear");
    let ugel_c = document.querySelector("#txt_ugel_crear");
    let estado_c = document.querySelector("#check_estado_crear");

    let tbl_organizador = document.querySelector("#tbl_organizador");

    let idregistro_upd = document.querySelector("#txt_idregistro_upd")
    let iddecente_upd = document.querySelector("#txt_iddecente_upd")
    let dni_upd = document.querySelector("#txt_dni_upd");
    let nombre_upd = document.querySelector("#txt_nombre_upd");
    let apellido_upd = document.querySelector("#txt_apellido_upd");
    let celular_upd = document.querySelector("#txt_celular_upd");
    let correo_upd = document.querySelector("#txt_correo_upd");
    let nivel_upd = document.querySelector("#txt_especialidad_upd");
    let ugel_upd = document.querySelector("#txt_ugel_upd");
    let tipo_persona_upd = document.querySelector("#txt_tipoPersona_upd");
    let estado_upd = document.querySelector("#check_estado_upd");

    return {
        elements : {
            dni_c,
            nombre_c,
            apellido_c,
            celular_c,
            correo_c,
            nivel_c,
            ugel_c,
            estado_c,

            tbl_organizador,

            idregistro_upd,
            iddecente_upd,
            dni_upd ,
            nombre_upd ,
            apellido_upd ,
            celular_upd ,
            correo_upd ,
            nivel_upd ,
            ugel_upd ,
            tipo_persona_upd ,
            estado_upd

        },
        values : {
            dni_cv : dni_c.value.trim().toLowerCase() ,
            nombre_cv : nombre_c.value.trim().toLowerCase() ,
            apellido_cv : apellido_c.value.trim().toLowerCase() ,
            celular_cv : celular_c.value.trim().toLowerCase() ,
            correo_cv : correo_c.value.trim().toLowerCase() ,
            nivel_cv : nivel_c.value.trim().toLowerCase() ,
            ugel_cv : ugel_c.value.trim().toLowerCase() ,
            estado_cv : estado_c.checked ,

            idregistro_updv : idregistro_upd.value.trim().toLowerCase(),
            iddecente_updv : iddecente_upd.value.trim().toLowerCase(),
            dni_updv : dni_upd.value.trim().toLowerCase() ,
            nombre_updv : nombre_upd.value.trim().toLowerCase() ,
            apellido_updv : apellido_upd.value.trim().toLowerCase() ,
            celular_updv : celular_upd.value.trim().toLowerCase() ,
            correo_updv : correo_upd.value.trim().toLowerCase() ,
            nivel_updv : nivel_upd.value.trim().toLowerCase() ,
            ugel_updv : ugel_upd.value.trim().toLowerCase() ,
            tipo_persona_updv : tipo_persona_upd.value.trim().toLowerCase() ,
            estado_updv : estado_upd.checked 

        }
    }
}


function eval_agregarOrganizadorNuevo(){
    let data = data_organizador();
    let {dni_cv,
        nombre_cv,
        apellido_cv,
        celular_cv,
        correo_cv,
        nivel_cv,
        ugel_cv,
        estado_cv} = data.values;

    let data_v = {dni_cv,
        nombre_cv,
        apellido_cv,
        celular_cv,
        correo_cv,
        nivel_cv,
        ugel_cv,
        estado_cv};

    let res = true;
    for (const key in data_v) {
        if (Object.hasOwnProperty.call(data_v, key)) {
            const element = data_v[key];
            // console.log("2. ", data_v, typeof(data_v))

            //Comprobado correo electronico
            if(key == "correo_cv"){ 
                let exp = new RegExp('@(gmail|hotmail).com', 'g');
                let rep = exp.test(element);
                if(!rep){
                    alert("Corregi correo");
                    res = false;
                }
            }
            
            //verificando que no estén vacios los inputs
            if(typeof(element) != "boolean"){
                if(element.length == 0){
                    res = false;
                }
            }
        }
    }

    return res;
}


/**
 * Funcion para insertar organizador
 */
function agregarOrganizadorNuevo(){

    
    if(eval_agregarOrganizadorNuevo()){
        
        let data = data_organizador();
        
        let data_env = data.values;

        data_env.id = 'agregar-organizador';

        fetchKev('POST',
            data_env,
            res => {
                console.log(res);
                alert(res.accion);
            },
            URL_AJAX_ORGANIZADOR
        );

    }else{
        sweetModal("Error en los datos!", "center","warning",1300);
    }

}


/**
 * +++++++++++++
 */

function obtenerDecente(){
    // alert("BUSCANDO DOCENTE!!")
    let data = data_organizador();
    let {dni_cv} = data.values
    let { nombre_c,
        apellido_c,
        celular_c,
        correo_c,
        nivel_c,
        ugel_c,
        estado_c } = data.elements

    if(dni_cv.length >= 5){
        
        fetchKev('POST',{
                id : 'obtener-docente',
                dni_cv
            },
            res => {
                console.log(res);
                if(res.eval){
                    sweetModalMin("Docente encontrado","bottom-end",1500,"success")
                    // sweetModal("Docente encontrado.","center","success",1500);

                    decente = res.data;

                    nombre_c.value = decente.nombre
                    apellido_c.value = decente.apellido
                    celular_c.value = decente.celular
                    correo_c.value = decente.correo
                    nivel_c.value = decente.especialidad
                    ugel_c.value = decente.ugel
                    estado_c.checked = (decente.estado=="1")? true : false;
                }
                // alert(res.accion);
            },
            URL_AJAX_ORGANIZADOR
        );

    }else{
        alert("Codigo con pocos valores")
    }

}


/**
 * Imprime en la tabla de registro los organizadores de la tabla decente
 */
function obtenerTodosLosOrganizadores(){
    let data = data_organizador();
    let {tbl_organizador} = data.elements;
    let dni, nombre, apellido;
    dni="";
    nombre="";
    apellido="";
    fetchKev('POST',{
        id : 'obtener-docentes_tbl',
        dni,
        nombre,
        apellido
    },
    res => {
        // console.log(res);
        if(res.operacion){
            sweetModalMin("Lista de docentes cargado","bottom-end",1500,"success")
            // sweetModal("Docente encontrado.","center","success",1500);
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
                        <td>${element.celular}</td>
                        <td>${element.correo}</td>
                        <td>${element.estado}</td>
                        <td>
                            <button 
                                data-bs-toggle="modal" 
                                data-bs-target="#modal_upd_org"
                                onclick="cargarParaActualizar('${element.idregistro}');"
                            >
                                Modif
                            </button>
                            <button onclick="eliminarRegistroOrganizador('${element.idregistro}');">
                                Elim
                            </button>
                        </td>
                    </tr>
                `;
            });

            tbl_organizador.innerHTML = data_html;

        }
        // alert(res.accion);
    },
    URL_AJAX_ORGANIZADOR
);
}

// ejeuta la funcion despues de que todos los elementos de la pagia se carguen .
window.onload = function (){
    obtenerTodosLosOrganizadores();
};



/**
 * 
 */
function cargarParaActualizar(idregistro){
    
    let data = data_organizador();
    let {
        idregistro_upd ,
        iddecente_upd ,
        dni_upd ,
        nombre_upd ,
        apellido_upd ,
        celular_upd ,
        correo_upd ,
        nivel_upd ,
        ugel_upd ,
        tipo_persona_upd ,
        estado_upd
    } = data.elements;

    fetchKev('POST', {
            id : "cargar-organizador",
            idregistro
        },
        res =>{
            // console.log(res);
            sweetModalCargando();
            sweetModalMin("datos cargados","bottom-end",1200,"success");
            if(res.operacion){
                organizador = res.data_res[0]

                idregistro_upd.value = organizador.idregistro;
                iddecente_upd.value = organizador.iddecente;
                dni_upd.value = organizador.dni;
                nombre_upd.value = organizador.nombre;
                apellido_upd.value = organizador.apellido
                celular_upd.value = organizador.celular
                correo_upd.value = organizador.correo
                nivel_upd.value = organizador.especialidad

                ugel_upd.options[0].innerText = organizador.ugel; 
                // agregarOption(ugel_upd, organizador.ugel, organizador.ugel, true);
                
                tipo_persona_upd.selectedIndex =  organizador.tipo_persona_idtipo_persona;

                estado_upd.checked = ( organizador.estado == "1" )? true:false;
            }
        },
        URL_AJAX_ORGANIZADOR
    );

}

//
function actualizarOrganizador(){

    let data = data_organizador();
    let {
        idregistro_updv ,
        iddecente_updv ,
        dni_updv ,
        nombre_updv ,
        apellido_updv ,
        celular_updv ,
        correo_updv ,
        nivel_updv ,
        ugel_updv ,
        tipo_persona_updv ,
        estado_updv
    } = data.values;

    let data_env = {
        idregistro_updv ,
        iddecente_updv ,
        dni_updv ,
        nombre_updv ,
        apellido_updv ,
        celular_updv ,
        correo_updv ,
        nivel_updv ,
        ugel_updv ,
        tipo_persona_updv ,
        estado_updv
    };

    data_env.id = "actualizar-organizacion";

    // console.log("local: ", data_env)

    fetchKev('POST',
            data_env
        ,
        res => {
            console.log(res);
            if(res.operacion){
                sweetModal("Actualizado registro", "center", "success", 1500);
                setTimeout(() => {
                    obtenerTodosLosOrganizadores();
                }, 1500);
            }else{
                sweetModal("No actualizado. El dni del usuario ya existe", "center", "error", 1500);
            }
        },
        URL_AJAX_ORGANIZADOR
    );

}