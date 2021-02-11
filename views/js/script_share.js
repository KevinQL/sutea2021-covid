//SCRIPTS COMPARTIDOS / SCRIPTS PROPIOS
//****************************************************************************************** */
//****************************************************************************************** */
//****************************************************************************************** */
//****************************************************************************************** */
//****************************************************************************************** */

/**
 * Elementos inputs para ser limpiados.
 * @param {Array} arrElement 
 */
//funcion para limpiar
function cleanInputs(arrElement){
    arrElement.forEach( element => {
        element.value = "";
    })
}



/**
 * 
 * @param {*} mensaje 
 * @param {*} position 
 * @param {*} icon 
 * @param {*} timer 
 */
function sweetModal(mensaje,position,icon,timer){
    Swal.fire({
        position,
        icon,
        title: `<small class='text-modal'>${mensaje}</small>`,
        showConfirmButton: false,
        backdrop: `
            rgba(0,0,0,.4)
        `,
        timer
    })
}



/**
 * 
 * @param {*} mensaje 
 * @param {*} position 
 * @param {*} timer 
 * @param {*} icon 
 */
function sweetModalMin(mensaje,position,timer,icon,){
    const Toast = Swal.mixin({
        toast: true,
        position,
        showConfirmButton: false,
        timer,
        timerProgressBar: true,
        onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon,
        title: `<span class='my-3'>${mensaje}</span>`
    })
}



/**
 * 
 * @param {Object} element Etiqueta HTML. Podría  ser un 'input', o cualquier etiqueta, pero como objeto, osea un (documen.querySelector(id);)
 * @param {String} removeClass Nombre de la clase que se quiere eliminar, quitar de la Etiqueta.
 * @param {String} addClass Nombre de la clase que se quiere agregar, o concatenar al conjunto de clases existentes en la Etiqueta.
 * 
 * Intercambia una clase una por otra
 * en el intento de que no exista las calses que se quiere eliminar y agregar, se intará agregar una clase
 */
function intercambiaClases(element, removeClass, addClass, existe){
    if(element.classList.contains(removeClass) && !element.classList.contains(addClass) && existe){
        if(removeClass.trim() != "")element.classList.remove(removeClass);
        if(addClass.trim() != "")element.classList.add(addClass);        
    }else{
        if(!existe){
            if(element.classList.contains(removeClass) && !element.classList.contains(addClass)){
                intercambiaClases(element, removeClass, addClass, true);
            }else{
                if(element.classList.contains(removeClass)){
                    element.classList.remove(removeClass);
                }
                if(!element.classList.contains(addClass)){
                    if(addClass.trim() != "")element.classList.add(addClass);
                }
            }
        }
    }    
}



/**
 * 
 * @param {String} metodo Que puede ser GET o POST / o también se puede dejar vacio, valor por defaul POST
 * @param {Object} datajson Los datos que se enviarán al servidor
 * @param {Function} bloqueCode Función que procesará los datos que retornan del servidor
 * 
 * Función ajax modificado 
 */
function ajaxKev(metodo, datajson, bloqueCode){

    let method = metodo.toUpperCase().trim();
    let envget,envpost; 
    if(method === "POST"){
        envpost = "data=" + JSON.stringify(datajson);
        envget = "";
    }else if (method === "GET"){
        envpost = "";
        envget = "?"+"data=" + JSON.stringify(datajson);
    }else{
        method = "POST";
        envpost = "data=" + JSON.stringify(datajson);
        envget = "";
    }
    
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){            
            let data = JSON.parse(this.responseText);            
            bloqueCode(data);
        }
    }
    xhr.open(method, "./ajax/procesarAjax.php"+envget, true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send(envpost);
}



//FETCH MODIFICADOS
//-----------------------------

/**
 * 
 * @param {String} meth Que puede ser 'POST' o 'GET'
 * @param {Object} jsonData Datos que se enviarán al servidor para que sena procesados
 * @param {Function} fnRquest Aquí se tratarán los datos devueltos del servidor
 */
function fetchKev(meth, jsonData, fnRquest, urlProcess){
    let formData = new FormData();

    formData.append("data", JSON.stringify(jsonData));

    fetch(urlProcess,{
        method: meth,
        body: formData
    }).then( data => data.json())
    .then(data => {
        fnRquest(data);
    })
}



/**
 * 
 * @param {String} meth Que puede ser 'POST' o 'GET'
 * @param {Object} jsonData Datos que se enviarán al servidor para que sena procesados
 * @param {Object} jsonFile Datos de los archivos de cualquier tipo: png, .sql, .pdf... Etc
 * @param {Function} fnRquest Aquí se tratarán los datos devueltos del servidor
 */
function fetchFileKev(meth, jsonData, jsonFile, fnRquest, url){
    let formData = new FormData();

    for(nameIN in jsonFile){
        formData.append(nameIN, jsonFile[nameIN]);
    }    
    
    formData.append("data", JSON.stringify(jsonData));

    fetch(url,{
        method: meth,
        body: formData
    }).then( data => data.json())
    .then(data => {
        fnRquest(data);
    })
}



//funcion pruebaa en otros archivos 
function pruebaArchivo($msj){
    return "na memes-> "+$msj;
}