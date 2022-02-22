
/**
 * CREAR EVENTO
 */
function data_crearEventoNuevo(){
    // Elementos del formulario para crear evento
    let anio_evento = document.querySelector("#txt_anio_crear");
    let nombre_evento = document.querySelector("#txt_evento_crear");
    let estado_evento = document.querySelector("#check_estado_crear");
    //----
    let idevento_activo = document.querySelector("#txtEvento_actual");
    let idevento_select = document.querySelector("#select_idevento");
    // Elementos del formulario para actualizar.
    let anio_evento_a = document.querySelector("#txt_anio");
    let nombre_evento_a = document.querySelector("#txt_evento");
    let estado_evento_a = document.querySelector("#check_estado");

    return {
        elements : {
            anio_evento,
            nombre_evento,
            estado_evento,
            idevento_activo,
            idevento_select,

            anio_evento_a,
            nombre_evento_a,
            estado_evento_a
        },
        values : {
            anio_eventov : anio_evento.value.trim().toLowerCase(),
            nombre_eventov : nombre_evento.value.trim().toLowerCase(),
            estado_eventov : estado_evento.checked,
            idevento_activov : idevento_activo.innerText.trim().toLowerCase(),
            idevento_selectv : idevento_select.value.trim().toLowerCase(),

            anio_evento_av : anio_evento_a.value.trim().toLowerCase(),
            nombre_evento_av : nombre_evento_a.value.trim().toLowerCase(),
            estado_evento_av : estado_evento_a.checked
        }
    }
}

function eval_crearEventoNuevo(){
    let data = data_crearEventoNuevo();
    let {anio_eventov, nombre_eventov} = data.values;
    let res = false;

    if(anio_eventov.length != 0 && nombre_eventov.length != 0){
        res = true;
    }else{
        res = false;
    }

    return res;

}

function crearEventoNuevo(){
    
    if(eval_crearEventoNuevo()){
        let data = data_crearEventoNuevo();
        let {anio_eventov, nombre_eventov, estado_eventov, idevento_activov} = data.values; 

        fetchKev('POST', {
            id: "crear-evento",
            anio_eventov, 
            nombre_eventov, 
            estado_eventov, 
            idevento_activov
        }, 
        resultado => {
            console.log("respuesta servidor mira blanca: ", resultado);

            if(resultado){
                alert("Se inserto");
                document.location.reload();
                // window.location.reload(); 
            }else{
                alert("no se inserto")
            }

        }, 
        URL_AJAX_EVENTO)


    }else{
        alert("Por favor corregir datos")
    }
}


/**
 * SELECCIONAR EVENTO EN EL ELEMENTO SELECT
 */
 function cambiarEvento(){

    let data = data_crearEventoNuevo();
    let {idevento_selectv} = data.values;
    let {anio_evento_a, nombre_evento_a, estado_evento_a} = data.elements;

    fetchKev('POST', {
        id: "option-evento",
        idevento_selectv
    }, 
    res => {

        if(res.eval){
            // alert("Se cargo evento");
            $evento = res.data[0];
            //cargando datos en el formulario
            anio_evento_a.value = $evento.anio
            nombre_evento_a.value = $evento.nombre
            estado_evento_a.checked = $evento.estado == "1"? true : false;
            
        }else{
            alert("no se cargo evento ")
        }

    }, 
    URL_AJAX_EVENTO)

}


/**
 * ACTUALIZAR EVENTO
 */
 function actualizarEvento(event){
    event.preventDefault();
    // alert("actualizar dato evento")

    let data = data_crearEventoNuevo();
    let {   idevento_activov,
            idevento_selectv,
            anio_evento_av,
            nombre_evento_av,
            estado_evento_av } = data.values;
    let {estado_evento_a, idevento_select} = data.elements;

    if(idevento_activov == idevento_selectv){
        if(!estado_evento_av){
            alert("No puede desactivar el evento activo")
            estado_evento_a.checked = true;
            return null;
        }
    }

    //Cambiamos de true a numeros, ya que al servidor el valor de falsellega como vacio.
    $estado_check = estado_evento_a.checked? 1 : 0;

    fetchKev('POST', {
        id: "actualizar-evento",
        idevento_selectv,
        idevento_activov,
        anio_evento_av,
        nombre_evento_av,
        estado_evento_av : $estado_check
    }, 
    res => {
        console.log(res);

        if(res.eval){
            evento = res.data
            if(evento.estado == "1"){
                document.location.reload();
            }else{
                // idevento_select.innerText = evento.nombre;
                idevento_select.options[idevento_select.selectedIndex].innerText = `${evento.idevento_select} - ${evento.anio} - ${evento.nombre}`;
            }
            alert("Se atualizo evento");
            
        }else{
            alert("no se actualizo evento ")
            document.location.reload();
        }

    }, 
    URL_AJAX_EVENTO)


}