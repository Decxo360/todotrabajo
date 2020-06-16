document.querySelector("#crear").addEventListener("click",function(){
    console.log("estamos adentro");
    
    if (validarDatos()) {
        creaQuery();
    }else{
        console.log("error en db");
    }

    

    });
    
    function validarDatos(){

        let etiqueta = document.querySelector("#Ietiqueta").value;
        let descripcion = document.querySelector("#Idescripcion").value;
        let pagar = document.querySelector("#IaPagar").value;
        let direccion = document.querySelector("#Idireccion").value;
        let numCalle = document.querySelector("#NumCalle").value;
        let Sector = document.querySelector("#Sector").value;
        let año = document.querySelector("#año").value;
        let mes = document.querySelector("#mes").value;
        let dia = document.querySelector("#dia").value;
        let hora = document.querySelector("#hora").value;
        let año2 = document.querySelector("#año2").value;
        let mes2 = document.querySelector("#mes2").value;
        let dia2 = document.querySelector("#dia2").value;
        let hora2 = document.querySelector("#hora2").value;
        let pregunta = document.querySelector("#Ipregunta").value;
        if ( 
            !etiqueta == " " 
            && !descripcion == " "
            && !pagar == " "
            && !direccion == " "
            && !numCalle == " "
            && !Sector == " "
            && !año == " "
            && !mes == " "
            && !dia == " "
            && !hora == " "
            && !año2 == " "
            && !mes2 == " "
            && !dia2 == " "
            && !hora2 == " "
            && !pregunta == " "
        ) {
            return true;
        }else{
            alert("Hay campos vacíos, por favor rellene todo");
            return false;
        }



    }
    
    function creaQuery(){
        console.log("estamos adentro");
        let etiqueta = document.querySelector("#Ietiqueta").value;
        let descripcion = document.querySelector("#Idescripcion").value;
        let pagar = document.querySelector("#IaPagar").value;
        let direccion = document.querySelector("#Idireccion").value;
        let numCalle = document.querySelector("#NumCalle").value;
        let Sector = document.querySelector("#Sector").value;
        let año = document.querySelector("#año").value;
        let mes = document.querySelector("#mes").value;
        let dia = document.querySelector("#dia").value;
        let hora = document.querySelector("#hora").value;
        let año2 = document.querySelector("#año2").value;
        let mes2 = document.querySelector("#mes2").value;
        let dia2 = document.querySelector("#dia2").value;
        let hora2 = document.querySelector("#hora2").value;
        let pregunta = document.querySelector("#Ipregunta").value;
        let fecha1;
        console.log(document.querySelector("#NumCalle").value);
        let fecha2;
        let titulo = document.querySelector("#Ititulo").value;
        console.log(descripcion);
        let nuevaPublicacion = {};
        nuevaPublicacion.titulo = titulo;
        nuevaPublicacion.descripcion = descripcion;
        nuevaPublicacion.pagar = pagar;
        nuevaPublicacion.direccion= direccion +" "+ Sector +" "+ numCalle;
        nuevaPublicacion.fecha1 = año +":"+mes+":"+dia+":"+hora;
        nuevaPublicacion.fecha2 = año2+":"+mes2+":"+dia2+":"+hora2;
        nuevaPublicacion.etiqueta = etiqueta;
        let formdata = new FormData();
        console.log(nuevaPublicacion);
        formdata.append("descripcion",nuevaPublicacion.descripcion);
        formdata.append("aPagar",nuevaPublicacion.pagar);
        formdata.append("ubicacion",nuevaPublicacion.direccion );
        formdata.append("fecha", nuevaPublicacion.fecha1);
        formdata.append("titulo", nuevaPublicacion.titulo);
        formdata.append("fechafinal",nuevaPublicacion.fecha2);
        formdata.append("etiqueta", nuevaPublicacion.etiqueta);
        Query(formdata).then(response=>{
            console.log(response);
            queryId(formdata).then(response=>{
                let preguntaAjax = {};
                let idpublicacionn = response[0].idpublicacion;
                console.log(idpublicacionn);
                preguntaAjax.pregunta = pregunta;
                preguntaAjax.idpublicacionn= idpublicacionn;
                let formulario = new FormData();
                formulario.append("texto",preguntaAjax.pregunta);
                formulario.append("idpublicacion",preguntaAjax.idpublicacionn);
                createPregunta(formulario).then(response=>{
                    console.log(response);
                     if(response==false){
                      alert("Intentalo de nuevo, algo ha pasado con el sitio :C");
                
                        }else{
                     alert("¡Todo ha sido ingresado con exito, gracias!");
                         location.reload();
                       }
                })
            })
           
        })
   
    }
    Query = async(formdata) =>{
        const response = await axios.post("api/publicacion/createPublicacion.php", formdata);
        return await response.data;
    }
    queryId= async(formdata)=>{
        const response = await axios.post("api/publicacion/queryIdpublicacion.php",formdata);
        return await response.data;
    }
    createPregunta = async(formulario) =>{
        const response = await axios.post("api/pregunta/createPregunta.php",formulario);
        return await response.data;
    }