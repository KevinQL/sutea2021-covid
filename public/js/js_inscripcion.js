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
    let check_estado = document.querySelector("#check_estado");

    let txt_base64 = document.querySelector("#base64");

    let txt_operation =  document.querySelector("#operation");

    let txt_specialty_select =  document.querySelector("#specialty_select");

    let estado = 0; //false

    /**
     * Verifica que el elemento(Validar registro) Exista.
     */
    if(check_estado){
        estado = check_estado.checked ? 1 : 0; // true : false
    }

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
            txt_operation,
            txt_specialty_select
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
            txt_operationv : txt_operation.value,
            estadov : estado,
            txt_base64v : txt_base64.value,
            txt_specialty_selectv : txt_specialty_select.value
        }
    }

}


/**
 * - Retorna verdadero si el formulario está conforme se desea.
 * - Caso contrario devuelve false, para que no se pueda proceder con el envío de los datos al servidor.
 */
function eval_inscripcion(){

    let res = false; // indicador de respuesta de retorno. La evaluación es disconforme. 

    /**
     * Obtenemos la data del formulario. Valores de los elementos num_operacion y voucher
     */
    let data = dataHTML_inscripcion();
    let { img_voucherv,
        txt_operationv } = data.values;

    /**
     * Si se cargo archivo al formulario
     */
    if(img_voucherv.length >= 1){

        /**
         * Si el archivo es una imagen
         */
        if(input_es_imagen(img_voucherv[0].type)){
            res = true;
        }

        // Caso contrario el retorno seguirá siendo falso... 

    /**
     * No se cargo ningún archivo al formulario
     */
    }else{ 
        res = false;
    }

    /**
     * Retorna la respuesta de la operación de validación. (False or True)
     */
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
        txt_operation,
        txt_specialty_select } = data.elements;
    
    //clear form
    txt_name.value = "";
    txt_lastName.value = "";
    txt_phone.value = "";
    txt_email.value = "";
    txt_operation.value = "";
    txt_specialty.value = txt_specialty_select.value;
    txt_specialty.type = "hidden";
    // txt_specialty.value = "";
    // txt_ugelName.value = "";

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
                agregarOption(txt_specialty_select, dataRes.especialidad, dataRes.especialidad,true);
                agregarOption(txt_ugelName, dataRes.ugel, dataRes.ugel,true);

                sweetModalMin("Docente encontrado!!","bottom-start",1500,"success");
            }else{
                
                sweetModalMin("Docente no encontrado!!","bottom-start",1500,"warning");
            }
            
        }, URL_AJAX_PROCESAR);
        
    }

}



/**
 * - envia los datos docente para su registro.
 * - Actualiza el voucher del docente ya inscrito en el evento, y que todavía no se valido en el admin
 */
document.getElementById('formInscription').addEventListener('submit',(event) => {
   
    /**
     * Detenemos el evento submit
     */
    event.preventDefault();
   
    /**
     * Empleamos la colección de datos del formulario a traves de la función que lo empaqueta
     */
    let data = dataHTML_inscripcion();
    let {txt_documentv,
        txt_namev,
        txt_lastNamev,
        txt_phonev,
        txt_emailv,
        txt_specialtyv,
        txt_ugelNamev,
        img_voucherv,
        estadov,
        txt_operationv,
        txt_base64v } = data.values;

    /**
     * Si el formulario se corresponde satisfactoriamente
     */
    if(eval_inscripcion()){
        
        /**
         * Empleamos el modal cargando para sugerir la espera del usuario 
         */
        sweetModalCargando();

        /**
         * Enviamos los datos al servidor
         */
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
            estadov,
            txt_operationv,
            txt_base64v  // Enviamos la imagen como una cadena de string en base64
        }, {
            img_voucher:null //img_voucherv[0] - // ya que la imagen se está enviando en otro formato
        }, data => {

            /**
             * Test data response server
             */
            console.log({
                info: "Respuesta server data",
                response: data
            });

            /**
             * - Si los datos se procesaron satisfactoriamente
             * - Se insertó los datos del formulario
             */
            if(data.eval){

                /**
                 * Mostramos msj de la acción procesada
                 */
                sweetModalMin("Registro exitoso!!","center",1500,"success");

                /**
                 * - Recargamos la página para limpiar el formulario
                 * - (older comment) carga la página con la misma URL. de modo que es:: index.php?pg=login
                 */
                setTimeout(() => {                              
                    location.reload(); 
                },1600); 

            /**
             * - Si el registro ya existe en REGISTRO
             * - Si falta actualizar voucher 
             * - ? Se puede actualizar el voucher mientras el registr no esté validado por el administrador
             */
            }else{

                /**
                 * Si el voucher foto se actualizó correctamente.
                 */
                if(data.cvoucher){

                    sweetModalMin("Voucher actualizado!!","center",1500,"success");
                }
                
                /**
                 * si el codigo de operación ya está en los registros del sistema
                 */
                if (data.operacion) {

                    setTimeOut( ()=>{
                        sweetModalMin("El código de operacion ya existe!!","center",1500,"warning");
                    },700);
                }

                /**
                 * Si el voucher no se actualizó, entonces se asume que el regostro ya está validado
                 * (checkar-) Resolver una manera más precisa de determinar el objetivo de la condición 
                 */
                if(!data.cvoucher){
                    sweetModalMin("Su registro ya está validado!!","center",1500,"info");

                    /**
                     * Cargamos la vista del formulario
                     * (older comment) carga la página con la misma URL. de modo que es:: index.php?pg=login
                     */
                     setTimeout(() => {                            
                        location.reload(); 
                    },1600); 
                }
            }
            
        }, URL_AJAX_PROCESAR);

    }else{
        sweetModalMin("Los datos no son correctos!!","center",2000,"warning");
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
    
    console.log("btn click")
    elem.style.display = "none";
    setTimeout(()=>{
        elem.style.display = "block";
    },
    1000);


    //--------pr imprimir base64
    // let data = dataHTML_inscripcion();
    // let {txt_base64v} = data.values;
    // console.log("esot->", txt_base64v);
    //--------end pr imprimir base64
}


//funcion para habilitar text cuando el valor sea Otro, y pueda modificarlo.
function cambioSeleccionNivel($this){
    let data = dataHTML_inscripcion();
    let {txt_specialty} = data.elements;

    //console.log("slect: ", $this.value);

    txt_specialty.value = $this.value;
    txt_specialty.type = "hidden";

    if($this.value === "Otro"){
        txt_specialty.value = "";
        txt_specialty.type = "text";
    }
    //console.log("txt: ", txt_specialty.value);

}


/**
 * - Función que lee la imagen y lo convierte a base64. 
 * - Redimensiona la imagen a las longitudes especificadas programadas
 * - * (coment old) PROGRAMACIÓN TEMPORAL 
 */
function readImage (input) {
    /**
     * Muestra modal de cargando operación de lectura de imagen
     */
    sweetModalCargando();

    /**
     * Limpiamos el elemento input donde se almacenará el texto de la imagen en base64
     */
    document.querySelector("#base64").value = "";

    /**
     * Test value - input base64
     */
    console.log({
        info: "valor de input base 64 cuando corre función readImage",
        response: document.querySelector("#base64").value
    })

    /**
     * Si se carga, o existe el archivo (img voucher)
     */
    if (input.files && input.files[0]) {

        /**
         * Inicializamos K, variable que guardará la representación de la imagen como una
         * cadena de texto base64. El cual proporcionará una manera de poder modificarlo en sus dimensiones
         */
        let k = "";

        /**
         * Renderizamos la imagen para obtener la cadena de testo en base64 de la imagen
         */
        let reader = new FileReader();

        /**
         * Si la renderización de la imagen cargada está completado y listo
         * Si el reader está cargado completamente
         */
        reader.onload = function (e) {

            /**
             * Renderizamos la imagen, en una cadena de text base64 IMG
             * y lo almacenamos en la variable K
             */
            k = reader.result;

            /**
             * Muestra la imagen en la vista, esto lo hace en un elemento tipo IMG
             * reader.result, justamente obtiene la imagen como una lectura de cadena de texto (base64)
             */
            $('#preview_new').attr('src', reader.result); // Renderizamos la imagen con su tamanio normla

            //console.log("ok->", k);

            /**
             * - Ejecutamos bloque de codigo después de 1500 milisegundos
             * - Esperamos el tiempo para que la cadena de texto de la imagen se complete en el elemento html
             */
            setTimeout(() => {
                /**
                 * Capturamos la img renderizada, en su tamano original
                 */
                let img = document.querySelector("#preview_new");

                /**
                 * Test data - dimensiones de la imagen de entrada (img voucher)
                 */
                console.log({
                    info: "Dimensiones img entrada - principal.",
                    response: {w: img.width, h: img.height}
                });

                /**
                 * Si la imagen tiene más Alto que Ancho
                 */
                if(img.height >= img.width){
                    
                    /**
                     * Si la img tiene de Ancho más de 400px, o Altura más de 650px
                     */
                    if(img.width > 400 || img.height > 650){

                        /**
                         * - Redimensionamos la imagen proporcionalmente. 
                         * - Guardamos el resultado de la redimensión en K
                         * - Devuleve el texto de codifcación base64 de la imagen redimensionado
                         * - (comment older) me devuelve el base64 de la imagen renderizada, reescalado.
                         */
                        k = _resize(img, 400, 650);

                    }

                    /**
                     * - Data test - Valor de K
                     * - K guarda el texto de codificación base64 de la imagen.
                     */
                    console.log({
                        info: "Valor K después de la condicional para la redimensión.",
                        response: k
                    });

                    /**
                     * - Imprimimos K en la vista-input
                     * - Se imprime la cadena de texto en base64 de la img en un input con id #base64
                     * - (comment older) imprimimos el base 64 de la imgen redimensionada
                     */
                    document.querySelector("#base64").value = k;

                    /**
                     * - Mostramos la imagen redimensionada en la vista.
                     * - Se imprime la imagen redimensionada en un elemento IMG, con id #blah
                     * - (comment older) imprimimos la imagen en la imagen de previsualización
                     */
                    $('#blah').attr('src', k);
                    
                    /**
                     * Mostramos la imagen en su dimensión real, después de un tiempo determinado
                     */
                    setTimeout(() => {
                        /**
                         * imprimimos la imagen en la imagen de previsualización en su dimensión recortada real.
                         * Imagen resultado después de hacer recorte
                         */
                        $('#preview_new').attr('src', k);

                        /**
                         * Test data imagen resultado
                         */
                        console.log({
                            info: "img final después de recorte, solo si se cumplió las condiciones...",
                            response: {w: img.width, h: img.height}
                        });

                        /**
                         * Test value - input base64
                         */
                        console.log({
                            info: "valor de input base 64 cuando TERMINA función readImage (H)",
                            response: document.querySelector("#base64").value
                        })

                    }, 700 );

                    /**
                     * Mensaje vista del proceso de recorte.
                     */
                    sweetModalMin("Voucher Cargado con exito!!","center",2000,"success");

                /**
                 * Si la imagen tiene más Ancho que Alto 
                 */
                }else{                
                    
                    sweetModalMin("Voucher Cargado con exito!!","center",2500,"success");

                    /**
                     * Si la imagen que se carga tiene Un Ancho mayor que 650px, o una Altura mayor que 420px
                     */
                    if(img.width > 650 || img.height > 420){
                        /**
                         * - Recortamos la imagen a los valores máximos pasados por parametros. 
                         * - (suposición) Comprueba primero la dimensión del ancho y luego el Alto. En el caso que sea más ancho que el
                         * parametro establecido, entonces lo redimensiona al ancho especificado (650px) y soluciona una dimensión proporcional
                         * para la altura. De la manera contraría también sucede lo mismo.
                         */
                        k = _resize(img, 650, 420);
                    }

                    /**
                     * - Mostramos la imagen en su tamano original.
                     * - Probablemente este elemento IMG se oculte, más no se elimine. Este elemento sirve para obtener los valores de la imagen.
                     */
                    $('#preview_new').attr('src', k);

                    /**
                     * - Ejecutamos después de un determinado tiempo.
                     * - Esto se hace debido a que los valores de la img no se obtienen adecuadamente. Mustra los valores de la imagen principal
                     * antes de hacer los recortes, en cambio después de esperar un tiempo, recién toma los valores correctos.
                     */
                    setTimeout(() => {

                        /**
                         * Test data - dimensiones de la imagen de entrada (img voucher)
                         */
                        console.log({
                            info: "Dimensiones img resultado - principal.",
                            response: {w: img.width, h: img.height}
                        });

                        /**
                         * Test value - input base64
                         */
                        console.log({
                            info: "valor de input base 64 cuando TERMINA función readImage (W)",
                            response: document.querySelector("#base64").value
                        })
    
                    }, 500);

                    /**
                     * Ponemos el valor del imput-file en vacio. 
                     */
                    //input.value = "";

                    /**
                     * Mostramos la IMG recortada en la vista. 
                     * El recorte solo se hace si se cumple la condición de las dimensiones
                     */
                    $('#blah').attr('src', k);

                    
                    /**
                     * - Imprimimos K en la vista-input
                     * - Se imprime la cadena de texto en base64 de la img en un input con id #base64
                     * - (comment older) imprimimos el base 64 de la imgen redimensionada
                     */
                     document.querySelector("#base64").value = k;

                    /**
                     * Esto muestra una imagen por defecto en el caso de que no se llegue a cargar la img recortada.
                     * Img por defecto
                     */
                    // $('#blah').attr('src', "https://i.ibb.co/Br8tf3Y/Whats-App-Image-2020-09-26-at-12-50-00-PM.jpg");
                
                }
            }, 1500);
            //imprime valor base64 
            //renderiza la img en la img principal
        }

        /**
         * 
         */
        reader.readAsDataURL(input.files[0]);
      
    }

}


/**
 * - Ejecutar cuando se suba una imagen nueva - voucher de pago 
 * - Intenta modificar la orientación de la imagen a traves de la función readImage
 */
$("#imageImport").change(function () {

    /**
     * Ejecutar la función, y pasar por parametro el input IMG
     */
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
            alert("Aquí fue el problema - Porfavor tome otra foto, o suba otra foto");
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

