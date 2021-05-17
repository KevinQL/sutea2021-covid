console.log("CARGADO => main.js");

// VARIABLES GLOBALES
const URL_AJAX_PROCESAR = "./ajax/procesarAjax.php";
const URL_prueba = "./ajax/pruebaAjax.php"
const URL_AJAX_PDF = "./ajax/procesarPDF.php";
const URL_AJAX_EVENTO = "./ajax/procesarEvento.php";
const URL_AJAX_ORGANIZADOR = "./ajax/procesarOrganizador.php";
const URL_AJAX_PONENTE = "./ajax/procesarPonente.php";
const URL_AJAX_CERTIFICADO = "./ajax/procesarCertificado.php";


// //****************************************************************************************** */
// //****************************************************************************************** */
// //------------------ REGISTRO DE USUARIO ------------------------------
// /**
//  *  
//  */
// function dataHTML_registroUsuario(){
//     let txt_user = document.querySelector("#txt_user");
//     let txt_password = document.querySelector("#txt_password");

//     return {
//         element:{
//             txt_user,
//             txt_password
//         },
//         value:{      
//             txt_userv: txt_user.value.trim().toLowerCase(), 
//             txt_passwordv: txt_password.value.trim().toLowerCase()
//         }
//     }
// }
// /**
//  * 
//  */
// function eval_registroUsuario(){
//     let dataHTML = dataHTML_registroUsuario();
//     let {txt_userv, txt_passwordv} = dataHTML.value;

//     if(txt_userv != "" && txt_passwordv != ""){                
//         return true;
//     }else{
//         return false;
//     }
// }
// /**
//  * 
//  */
// function execute_registroUsuario(){
//     if(eval_registroUsuario()){
//         let dataHTML = dataHTML_registroUsuario();
//         let {txt_userv, txt_passwordv} = dataHTML.value;
//         let {txt_user, txt_password} = dataHTML.element;

//         fetchKev('POST',{
//             id:'REGISTRO-USER',
//             txt_userv,
//             txt_passwordv           
//         },data=>{                     
//             if(data.eval){
//                 sweetModalMin('operación exitosa!','top-start',1200,'success')
//                 cleanInputs([txt_user, txt_password])
//             }else{
//                 sweetModalMin('error en operacion!','top-start',1200,'warning')
//             }
//         },URL_AJAX_PROCESAR)

//     }else{
        
//     }
// }

// //-- FUNCIONES DE OPERACION
// /**
//  * 
//  */


// //****************************************************************************************** */
// //****************************************************************************************** */
// //------------------ LOGUIN DE USUARIO ------------------------------
// /**
//  *  
//  */
// function dataHTML_loginUser(){
//     let txt_user = document.querySelector("#txt_user");
//     let txt_password = document.querySelector("#txt_password");

//     return {
//         element:{
//             txt_user,
//             txt_password
//         },
//         value:{      
//             txt_userv: txt_user.value.trim().toLowerCase(), 
//             txt_passwordv: txt_password.value.trim().toLowerCase()
//         }
//     }
// }
// /**
//  * 
//  */
// function eval_loginUser(){
//     let dataHTML = dataHTML_loginUser();
//     let {txt_userv, txt_passwordv} = dataHTML.value;

//     if(txt_userv != "" && txt_passwordv != ""){                
//         return true;
//     }else{
//         return false;
//     }
// }
// /**
//  * 
//  */
// function execute_loginUser(){   
//     if(eval_loginUser()){
//         let dataHTML = dataHTML_loginUser();
//         let {txt_userv, txt_passwordv} = dataHTML.value;
//         //let {txt_user, txt_password} = dataHTML.element;
//         console.log(txt_userv, txt_passwordv);
//         fetchKev('POST',{
//             id:'SESSION-USER',
//             txt_userv,
//             txt_passwordv           
//         },data=>{    
//             console.log(data)                 
//             if(data.eval){
//                 sweetModalMin('INICIANDO...!','bottom-start',900,'success')     
//                 let cargando = document.querySelector('.cargando')
//                 intercambiaClases(cargando,'d-none','d-block',true);
//                 setTimeout(() => {
//                     location.reload(); // carga la página con la misma URL. de modo que es:: index.php?pg=login /                                  
//                 },1000);   
//             }else{
//                 sweetModalMin('No registrado!','center',1200,'warning')
//             }
//         },URL_AJAX_PROCESAR)

//     }else{
//         sweetModalMin('Datos invalidos!','center',1200,'warning')
//     }
// }

//-- FUNCIONES DE OPERACION
/**
 * 
 */