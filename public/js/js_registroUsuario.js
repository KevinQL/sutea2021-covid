console.log("load js_registroUsuario.js");

function dataHTML_regisUser(){
    let txt_user = document.querySelector("#txt_user");
    let txt_password = document.querySelector("#txt_password");

    return {
        elements :{
            txt_user, 
            txt_password 
        },
        values : {
            txt_userv : txt_user.value.trim(), 
            txt_passwordv : txt_password.value.trim()
        }
    }
}

function eval_regisUser(){
    //null
    return true;
}

function execute_regisUser(elem){
    console.log("btn click")
    elem.style.display = "none";
    setTimeout(()=>{
        elem.style.display = "block";
    },
    1000);
}



/**
 * envia los datos docente para su registro o actualizacion de la foto voucher
 */
document.getElementById('formInscription').addEventListener('submit',(event) => {
    event.preventDefault();
    let data = dataHTML_regisUser();
    let {txt_userv,
        txt_passwordv } = data.values;

    if(eval_regisUser()){

        fetchKev("POST",
        {
            id:"exe-registroUser",
            txt_userv,
            txt_passwordv
        }, 
        data => {
            
            console.log(data);
            
        }, URL_AJAX_PROCESAR);
    }else{
        console.log("Flata llenar el formulario")
    }
    
});