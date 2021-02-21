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
          $('#preview_new').attr('src', reader.result); // Renderizamos la imagen con su tamanio normla
          console.log("ok->", reader.result);
          setTimeout(() => {
              let img = document.querySelector("#preview_new"); // capturamos la imagen renderiada en su tamanio normal
              console.log(img.width, img.height);
              let k = _resize(img, 500, 450); // me devuelve el base64 de la imagen renderizada, reescalado.
              console.log("ok2->",k);
              document.querySelector("#base64").value = k; // imprimimos el base 64 de la imgen redimensionada
              $('#blah').attr('src', k); // imprimimos la imagen en la imagen de previsualización
          }, 1500);
        //imprime valor base64 
          //renderiza la img en la img principal
      }
      reader.readAsDataURL(input.files[0]);
    //   console.log(reader.readAsDataURL(input.files[0]));  
    }
  }

  $("#img_test").change(function () {
    // Codigo a ejecutar cuando se detecta un cambio de archivO
    readImage(this);
  });
  



  //----------------------------------------------------------
  //----------------- CODIGO DE IMAGEN -----------------------
  //----------------------------------------------------------
  //----------------------------------------------------------

  function _resize(img, maxWidth, maxHeight) 
  {
        let ratio = 1;
        let canvas = document.createElement("canvas");
        canvas.style.display="block";
        document.body.appendChild(canvas);

        let canvasCopy = document.createElement("canvas");
        canvasCopy.style.display="block";
        document.body.appendChild(canvasCopy);

        let ctx = canvas.getContext("2d");
        let copyContext = canvasCopy.getContext("2d");

        if(img.width > maxWidth)
            ratio = maxWidth / img.width;
        else if(img.height > maxHeight)
            ratio = maxHeight / img.height;

        canvasCopy.width = img.width;
        canvasCopy.height = img.height;
        try {
            copyContext.drawImage(img, 0, 0);
        } catch (e) { 
            //document.getElementById('loader').style.display="none";
            alert("There was a problem - please reupload your image");
            return false;
        }
        canvas.width = img.width * ratio;
        canvas.height = img.height * ratio;
        // the line to change
        //ctx.drawImage(canvasCopy, 0, 0, canvasCopy.width, canvasCopy.height, 0, 0, canvas.width, canvas.height);
        // the method signature you are using is for slicing
        ctx.drawImage(canvasCopy, 0, 0, canvas.width, canvas.height);
        let dataURL = canvas.toDataURL("image/jpg");
        document.body.removeChild(canvas);
        document.body.removeChild(canvasCopy);

        //return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
        return dataURL;
  };



