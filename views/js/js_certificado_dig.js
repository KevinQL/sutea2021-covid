console.log("js_certificado cargado!!");

function verificarAsistente(event){
    event.preventDefault()
    let anio = document.querySelector("#year").value;
    let dni = document.querySelector("#document").value;
    // console.log({anio, dni})

    if(anio != "Seleccionar"  && dni.length != 0){
            
        sweetModalCargando();

        fetchKev('POST',{
            id:'consultar-certificado',
            anio,
            dni
        }, res => {
            sweetModalMin("Certificado Cargado!","bottom-end",1200,"success")

            console.log(res);
            let res_cert = document.querySelector(".res_cert");
            let res_html = ``;

            if(res.eval){

                let $resgistro = res.data;
                
                window.open(`index.php?pg=certificado_digital&code=${$resgistro.dni}&anio=${$resgistro.anio}` , "CERSUTEA CERTIFICADO" , "width=900,height=600,scrollbars=1");

                res_html =  ` 
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Certificado Válido!</strong> Descarga tu certificado ${$resgistro.nombre} ${$resgistro.apellido}. 
                        <a href="index.php?pg=certificado_digital&code=${$resgistro.dni}&anio=${$resgistro.anio}" target="_blank" rel="noopener noreferrer">CLICK AQUÍ</a>
                    </div>
                `;

            }else{
                res_html =  ` 
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Certificado No Válido!</strong> Comuniquese con el responsable.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `;
                sweetModal("No se encontró el registro.","center","info",2500);
            }

            res_cert.innerHTML = res_html;

        },URL_AJAX_PDF)

    }else{

        sweetModal("Corregir Datos.","center", "warning", 1500);

    }

}
