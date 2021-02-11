//script para usuario en session

//****************************************************************************************** */
//****************************************************************************************** */
//------------------ INSERTAR SLIDER ------------------------------
/**
 *  
 */
function dataHTML_sliderInsert(){
    let txt_fecha = document.querySelector("#txt_fecha");
    let img_slider = document.querySelector("#img_slider");

    return {
        element:{
            txt_fecha,
            img_slider
        },
        value:{      
            txt_fechav : txt_fecha.value.trim().toLowerCase(),
            img_sliderv : img_slider.files         
        }
    }
}
/**
 * 
 */
function eval_sliderInsert(){
    let dataHTML = dataHTML_sliderInsert();
    let {txt_fechav, img_sliderv} = dataHTML.value; 
    if(txt_fechav != "" && img_sliderv.length != 0 ){ 
        console.log(es_imagen_sliderInsert(img_sliderv[0].type),"<-ver")
        if(es_imagen_sliderInsert(img_sliderv[0].type)){
            return true;
        }        
    }
    return false;
    
}
/**
 * 
 */
function execute_sliderInsert(){    
    if(eval_sliderInsert()){
        let dataHTML = dataHTML_sliderInsert();
        let {txt_fechav, img_sliderv} = dataHTML.value;        

        fetchFileKev('POST',{
            id:'INSERT-SLIDER',
            txt_fechav
        },{
            img_file: img_sliderv[0]
        },data=>{
            
            if(data.eval){
                console.log(data)
                sweetModal('Datos procesados!','center','success',1500);
            }else{
                if(data.eval_img){
                    sweetModal('Imagen actualizado!','center','success',1500);
                }else{
                    sweetModal('Algo no salió bien!!','center','error',1500);
                }
            }

        },URL_AJAX_PROCESAR); //URL_AJAX_PROCESAR  /  URL_prueba

    }else{
        sweetModal('Verificar datos!','center','warning',1500);
    }
}

//-- FUNCIONES DE OPERACION 
/**
 * @param {string} type_img formato de imagagen. EJM 'img/jpeg'. Este dato es proporcionado por la propiedad 'type' del elemento FILE html
 * @function eval_sliderInsert Se está usando en está funcion
 * @function eval_curso_insert 
 *  
 */
function es_imagen_sliderInsert(type_img){
    if(type_img == "image/png" || type_img == "image/jpeg" || type_img == "image/jpg"){
        return true;
    }else{
        return false;
    }
}


//****************************************************************************************** */
//****************************************************************************************** */
//------------------ INSERTAR CURSO ------------------------------
/**
 *  
 */
function dataHTML_curso(){
    let txt_carrera = document.querySelector("#txt_carrera");
    let txt_fecha = document.querySelector("#txt_fecha");
    let txt_costo = document.querySelector("#txt_costo");
    let img_curso = document.querySelector("#img_curso");
    let ordenSelect = document.querySelector("#ordenSelect");
    let tabla = document.querySelector(".tbl_list_curso");

    return {
        element:{
            txt_carrera,
            txt_fecha,
            txt_costo,
            img_curso,
            ordenSelect,
            tabla
        },
        value:{   
            txt_carrerav : txt_carrera.value.trim().toLowerCase(),
            txt_fechav : txt_fecha.value.trim().toLowerCase(),
            txt_costov : txt_costo.value.trim().toLowerCase(),
            img_cursov : img_curso.files,
            ordenSelectv : ordenSelect.value.trim().toLowerCase()              
        }
    }
}
/**
 * 
 */
function eval_curso_insert(){
    let dataHTML = dataHTML_curso();
    let {txt_carrerav, txt_fechav, txt_costov, img_cursov, ordenSelectv} = dataHTML.value; 
    let inputs_vacios = false;
    let arr_elementv = [txt_carrerav, txt_fechav, txt_costov, ordenSelectv];
    arr_elementv.forEach(element=>{
        if(element.length == 0){
            inputs_vacios = true;
        }
    })
    if( !inputs_vacios && img_cursov.length != 0 ){         
        if(es_imagen_sliderInsert(img_cursov[0].type)){
            return true;
        }        
    }
    return false;
    
}
/**
 * 
 */
function execute_curso_insert(){    
    if(eval_curso_insert()){
        let dataHTML = dataHTML_curso();
        let {txt_carrerav, txt_fechav, txt_costov, img_cursov, ordenSelectv} = dataHTML.value; 
    
        fetchFileKev('POST',{
            id:'INSERT-CURSO',
            txt_carrerav,
            txt_fechav,
            txt_costov,
            ordenSelectv,
            nameIMG : nameImg_replace_curso(img_cursov[0].name)
        },{
            img_file: img_cursov[0]
        },data=>{
            
            if(data.eval){
                console.log(data)
                sweetModal('Datos procesados!','center','success',1500);
                //recargar tabla
                execute_curso_select('');
            }else{
                
                sweetModal('Algo no salió bien!!','center','error',1500);
                
            }

        },URL_AJAX_PROCESAR); //URL_AJAX_PROCESAR  /  URL_prueba

    }else{
        sweetModal('Verificar datos!','center','warning',1500);
    }
}
/**
 * 
 * @param {string} txt_search filtro para hacer la busqueda en la bd curso. WHERE 'LIKE' 
 */
function execute_curso_select(txt_search){    
    
    //alert("holaaa");
    let dataHTML = dataHTML_curso();
    let {tabla} = dataHTML.element; 
    
    fetchKev('POST',{
        id:'SELECT-CURSO',
        txt_search
    },data=>{
        let RES_HTML = ``;
        if(data.eval){
            let cont = 0;
            data.data.forEach(element=>{
                cont++;
                RES_HTML += `
                <tr class="table-dark">
                    <th scope="row">${cont}</th>
                    <td>${element.nombre_curso}</td>
                    <td>${element.fecha_txt}</td>
                    <td>${element.costo}</td>
                    <td>${element.orden}</td>
                    <td>${element.url_img}</td>
                    <td class="text-center">
                        <button class="btn btn-danger" onclick="execute_curso_delete('${element.id_curso}')"><i class="far fa-trash-alt"></i></button> 
                        </td>
                        </tr>                     
                        `;
                //<button class="btn btn-success" onclick=""><i class="fas fa-edit"></i></button> 
            })
        }
        tabla.innerHTML=RES_HTML;
    },URL_AJAX_PROCESAR);
}
/**
 * 
 * @param {int} id_curso id del curso
 */
function execute_curso_delete(id_curso){
     //SE DEBERÍA PREGUNTAR LA ACCION... IMPLEMENTAR
     fetchKev('POST',{
         id:'DELETE-CURSO',
         id_curso
     },data=>{
         console.log(data)
         if(data.eval){
            sweetModal('Curso Eliminado!!!','center','success',1500);
            //recargar tabla
            execute_curso_select('');
         }

     },URL_AJAX_PROCESAR);
}

//-- FUNCIONES DE OPERACION
/**
 * 
 * @param {string} $nameimg nombre de la imagen: proporcionado por la porpiedad 'NAME' de FILE
 */
function nameImg_replace_curso($nameimg){
    let name = $nameimg.trim().replace(' ','-')
    return name;
}