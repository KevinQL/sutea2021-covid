console.log("load js_loginUser.js");

function dataHTML_loginUser(){
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

function eval_loginUser(){
    //null
    return true;
}

function execute_loginUser(elem){
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
    let data = dataHTML_loginUser();
    let {txt_userv,
        txt_passwordv } = data.values;

    if(eval_loginUser()){

        fetchKev("POST",
        {
            id:"exe-loginUser",
            txt_userv,
            txt_passwordv
        }, 
        data => {
            console.log(data);
            if(data.eval){
                sweetModal("autorizado!!","center","success",1000);
                setTimeout(() => {
                    //carga la página con la misma URL. de modo que es:: index.php?pg=login                                   
                    location.reload(); 
                },1100); 
            }else{
                sweetModalMin("No autorizado!!","center",1500,"warning");
            }
            
        }, URL_AJAX_PROCESAR);
    }else{
        sweetModalMin("Contactese con el administrador!!","center",1500,"error");        
    }
    
});