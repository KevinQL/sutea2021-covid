console.log("load js_asistencia.js");


/**
 * 
 */
function dataHTML_asistencia(){
    let txt_document = document.querySelector("#document");
    let txt_name = document.querySelector("#name");
    let txt_lastName = document.querySelector("#lastName");
    let txt_idregistro = document.querySelector("#txt_idregistro");
    let txt_iddocente = document.querySelector("#txt_iddocente");

    return {
        elements : {
            txt_document ,
            txt_name ,
            txt_lastName,
            txt_idregistro,
            txt_iddocente
        },
        values : {
            txt_documentv : txt_document.value.trim() ,
            txt_namev : txt_name.value.trim() ,
            txt_lastNamev : txt_lastName.value.trim(),
            txt_idregistrov : txt_idregistro.value.trim(),
            txt_iddocentev : txt_iddocente.value.trim()
        }
    }

}

/**
 * 
 */
function eval_asistencia(){
    $res = true;
    let data = dataHTML_asistencia();
    let { txt_documentv ,
        txt_namev ,
        txt_lastNamev } = data.values;
    let arr_data = [txt_documentv ,
        txt_namev ,
        txt_lastNamev ];
        //debugger; // No funciona el return dentro de un foreach/if reutrn :O!!!! 
    arr_data.forEach(elem => {
        if(elem.trim() === ""){
            $res = false;
        }
    });

    return $res;
}


/**
 * Se ejecuta cada vez que se presiona en el cuadro de texto DNI 
 * 
 * @param {*} elem 
 */
function execute_traerDocente(elem){

    let data = dataHTML_asistencia();
    let { txt_document ,
        txt_name ,
        txt_lastName,
        txt_idregistro,
        txt_iddocente } = data.elements; 

    txt_name.value = "";
    txt_lastName.value = "";
    txt_idregistro.value = "";
    txt_iddocente.value = "";

    if(elem.value.length === 8){
        //so then send data for procesing on the data server
        fetchKev("POST",
        {
            id:"exe-traerDocenteAsis",
            txt_documentv : elem.value
        }, 
        res => {
            
            console.log(res);
            if (res.eval) {
                dataRes = res.data[0];
                //console.log(dataRes);
                txt_name.value = dataRes.nombre;
                txt_lastName.value = dataRes.apellido;
                txt_idregistro.value = dataRes.idregistro;
                txt_iddocente.value = dataRes.iddecente;

                sweetModalMin("Docente encontrado!!","center",1500,"success");
            }else{
                
                sweetModalMin("Docente no encontrado!!","center",1500,"warning");
            }
            
        }, URL_AJAX_PROCESAR);


    }
}

/**
 * Controlar asistencia de acuerdo a la hora de registro de asistencia. solo registrar una sola vez por horario(manana, tarde)
 */
document.querySelector("#formInscription").addEventListener("submit", event => {
    event.preventDefault();

    if(eval_asistencia()){
        //sweetModal("Todavia no se habilita la asistencia!!","center","info",2000);
        let data = dataHTML_asistencia();
        let { txt_documentv, 
            txt_idregistrov,
            txt_iddocentev } = data.values; 

        // console.log(data.values);
        // return null;

        fetchKev("POST",
        {
            id:"exe-docenteAsistencia",
            txt_documentv,
            txt_idregistrov,
            txt_iddocentev
        }, 
        res => {
            
            console.log(res);
            if (res.eval) {
                sweetModal("Asistencia registrado!","center","success",2000);
            }else{
                sweetModal("Asistencia ya registradad!!","center","info",2000);                
            }
            
        }, URL_AJAX_PROCESAR);

    }else{
        //si no hay registro, es porque no está registrado en el eveno actual
        sweetModal("Docente no encontrado!!","center","warning",2000);
    }


})