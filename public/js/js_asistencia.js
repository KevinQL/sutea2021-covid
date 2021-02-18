console.log("load js_asistencia.js");


/**
 * 
 */
function dataHTML_asistencia(){
    let txt_document = document.querySelector("#document");
    let txt_name = document.querySelector("#name");
    let txt_lastName = document.querySelector("#lastName");

    return {
        elements : {
            txt_document ,
            txt_name ,
            txt_lastName
        },
        values : {
            txt_documentv : txt_document.value.trim() ,
            txt_namev : txt_name.value.trim() ,
            txt_lastNamev : txt_lastName.value.trim()
        }
    }

}

/**
 * 
 */
function eval_asistencia(){
    let data = dataHTML_asistencia();
    let { txt_documentv ,
        txt_namev ,
        txt_lastNamev } = data.values;
    let arr_data = [txt_documentv ,
        txt_namev ,
        txt_lastNamev ];

    arr_data.forEach(elem => {
        if(elem.trim() === "")
            return false;
    });

    return true;
}


/**
 * 
 * @param {*} elem 
 */
function execute_traerDocente(elem){

    let data = dataHTML_asistencia();
    let { txt_document ,
        txt_name ,
        txt_lastName } = data.elements; 

    txt_name.value = "";
    txt_lastName.value = "";

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

    sweetModal("El evento aún no inicia!!","center","success",2000);
})