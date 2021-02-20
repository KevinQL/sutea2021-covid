//---------------
console.log(pruebaArchivo("Cargado js_test.js"));

//****************************************************************************************** */
//****************************************************************************************** */
//------------------ INSERTAR IMG ------------------------------
/**
 *  
 */
function dataHTML_test(){
    let txt_dni = document.querySelector("#txt_dni");
    let txt_nombre = document.querySelector("#txt_nombre");
    let img_test = document.querySelector("#img_test");

    return {
        element:{
            txt_dni,
            txt_nombre,
            img_test
        },
        value:{   
            txt_dniv : txt_dni.value.trim().toLowerCase(),
            txt_nombrev : txt_nombre.value.trim().toLowerCase(),
            img_testv : img_test.files          
        }
    }
}
/**
 * 
 */
function eval_test(){
    let dataHTML = dataHTML_test();
    let {txt_nombrev, txt_dniv, img_testv} = dataHTML.value; 
    let inputs_vacios = true;
    let arr_elementv = [txt_nombrev, txt_dniv];
    arr_elementv.forEach(element=>{
        if(element.length == 0){
            inputs_vacios = false;
        }
    })
    if( !inputs_vacios && img_testv.length != 0 ){         
        if(!es_imagen_sliderInsert(img_testv[0].type)){
            return false;
        }        
    }
    return inputs_vacios;
    
}
/**
 * 
 */
function execute_test(event){  
    event.preventDefault();    
    if(eval_test()){
        let dataHTML = dataHTML_test();
        let {txt_dniv, txt_nombrev, img_testv} = dataHTML.value; 
    
        fetchFileKev('POST',{
            id:'save-img',
            txt_dniv,
            txt_nombrev,
            nameIMG : nameImg_replace_curso(img_testv[0].name)
        },{
            img_file: img_testv[0]
        },data=>{
            // console.log(data);
            if(data.eval){
                console.log(data)
                sweetModal('Datos procesados!','center','success',1500);
                //recargar tabla
                //execute_curso_select('');
            }else{
                
                sweetModal('Algo no salió bien!!','center','error',1500);
                
            }

        },URL_prueba); //URL_AJAX_PROCESAR  /  URL_prueba

    }else{
        sweetModal('Verificar datos!','center','warning',1500);
    }
}





//-------------------- imagen 

function readImage (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#blah').attr('src', e.target.result); // Renderizamos la imagen
          console.log("ok->", e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    //   console.log(reader.readAsDataURL(input.files[0]));  
    }
  }

  $("#img_test").change(function () {
    // C贸digo a ejecutar cuando se detecta un cambio de archivO
    readImage(this);
  });
  




