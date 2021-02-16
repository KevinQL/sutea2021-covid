console.log(pruebaArchivo("js_inscripcion"))

// document.getElementById('formInscription').addEventListener('submit',(event) => {
//     event.preventDefault();
//     const information = {
//         document: document.querySelector("#document").value,
//         name: document.querySelector("#name").value,
//         lastName: document.querySelector("#lastName").value,
//         phone: document.querySelector("#phone").value,
//         email: document.querySelector("#email").value,
//         specialty:  document.querySelector("#specialty").value,
//         image:  document.querySelector("#imageImport").files[0]
//     };
//     // console.log(event);
// });



/**
 * 
 */
function dataHTML_inscripcion(){
    let txt_document = document.querySelector("#document");
    let txt_name = document.querySelector("#name");
    let txt_lastName = document.querySelector("#lastName");
    let txt_phone = document.querySelector("#phone");
    let txt_email = document.querySelector("#email");
    let txt_specialty =  document.querySelector("#specialty");
    let txt_ugelName = document.querySelector("#ugelName");
    let img_voucher =  document.querySelector("#imageImport");

    let txt_operation =  document.querySelector("#operation");

    return {
        elements : {
            txt_document,
            txt_name,
            txt_lastName,
            txt_phone,
            txt_email,
            txt_specialty,
            txt_ugelName,
            img_voucher,
            txt_operation
        },
        values : {
            txt_documentv : txt_document.value ,
            txt_namev : txt_name.value ,
            txt_lastNamev : txt_lastName.value ,
            txt_phonev : txt_phone.value ,
            txt_emailv : txt_email.value ,
            txt_specialtyv : txt_specialty.value ,
            txt_ugelNamev : txt_ugelName.value,
            img_voucherv  : img_voucher.files,
            txt_operationv : txt_operation.value
        }
    }

}



/**
 * 
 */
function eval_inscripcion(){
    let res = true;

    let data = dataHTML_inscripcion();
    let { txt_documentv,
        txt_namev,
        txt_lastNamev,
        txt_phonev,
        txt_emailv,
        txt_specialtyv,
        txt_ugelNamev,
        img_voucherv,
        txt_operationv } = data.values;

    let arr_velem = [
        txt_documentv,
        txt_namev,
        txt_lastNamev,
        txt_phonev,
        txt_emailv,
        txt_specialtyv,
        txt_ugelNamev,
        txt_operationv];

    arr_velem.forEach(element => {
        if(element.trim() === "")
            res = false;
    });
    if(res){
        if(img_voucherv.length === 0){
            res = false;
        }
    }
    return res;
}



/**
 * Busca en la base de datos si el docente ya se encuentra registrado.
 * 
 * elemento de caudro de texto dni docente inscripcion
 * @param {*} elem 
 */
function execute_traerinfo(elem){
    let data = dataHTML_inscripcion();
    let {txt_name,
        txt_lastName,
        txt_phone,
        txt_email,
        txt_specialty,
        txt_ugelName,
        txt_operation } = data.elements;
    
    //clear form
    txt_name.value = "";
    txt_lastName.value = "";
    txt_phone.value = "";
    txt_email.value = "";
    txt_specialty.value = "";
    txt_ugelName.value = "";
    txt_operation.value = "";

    //the input number is dni?
    if (elem.value.length === 8) {

        //so then send data for procesing on the data server
        fetchKev("POST",
        {
            id:"exe-traerinfo",
            txt_documentv : elem.value
        }, 
        res => {
            
            //console.log(res);
            if (res.eval) {
                dataRes = res.data[0];
                //console.log(dataRes);
                txt_name.value = dataRes.nombre;
                txt_lastName.value = dataRes.apellido;
                txt_phone.value = dataRes.celular;
                txt_email.value = dataRes.correo;
                txt_specialty.value = dataRes.especialidad;
                txt_ugelName.value = dataRes.ugel;

                sweetModalMin("Docente encontrado!!","bottom-start",1500,"success");
            }else{
                
                sweetModalMin("Docente no encontrado!!","bottom-start",1500,"warning");
            }
            
        }, URL_AJAX_PROCESAR);
        
    }

}



/**
 * envia los datos docente para su registro o actualizacion de la foto voucher
 */
document.getElementById('formInscription').addEventListener('submit',(event) => {
    event.preventDefault();
    let data = dataHTML_inscripcion();
    let {txt_documentv,
        txt_namev,
        txt_lastNamev,
        txt_phonev,
        txt_emailv,
        txt_specialtyv,
        txt_ugelNamev,
        img_voucherv,
        txt_operationv } = data.values;

    if(eval_inscripcion()){

        fetchFileKev("POST",
        {
            id:"exe-inscripcion",
            txt_documentv,
            txt_namev,
            txt_lastNamev,
            txt_phonev,
            txt_emailv,
            txt_specialtyv,
            txt_ugelNamev,
            txt_operationv
        }, {
            img_voucher:img_voucherv[0]
        }, data => {
            
            console.log(data);
            if(data.eval){
                sweetModalMin("Registro exitoso!!","center",1500,"success");
            }else{
                if(data.cvoucher){
                    sweetModalMin("Voucher actualizado!!","center",1500,"success");
                }else{
                    sweetModalMin("Su registro ya está validado!!","center",1500,"info");
                }
            }
            
        }, URL_AJAX_PROCESAR);
    }else{
        console.log("Flata llenar el formulario")
    }
    
});



/**
 * Permite controlar que el inscrito no presione mas de dos veces el boton de COMPLETAR
 * 
 * Boton de COMPLETAR en el formulario
 * @param {*} elem 
 */
function execute_inscripcion(elem){
    console.log("hiii")
    elem.style.display = "none";
    setTimeout(()=>{
        elem.style.display = "block";
    },
    1000);
}

