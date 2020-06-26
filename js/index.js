
/**
 * Este listener inicializa los metodos encargados de validar y insertar los valores obtenidos en la base de datos
 */
document.querySelector("#crear").addEventListener("click",function(){
    
    
    if (validarDatos()) {
        creaQuery();
    }else{
        console.log("error en db");
    }

    

    });
    /**
     * Valida los datos que hayan sido ingresados por el usuario
     * este metodo valida que ningun dato este vacio
     */
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
        let tipoPublicacion = document.querySelector("#ItipoPublicacion").checked;
        let tipoPublicacion2 = document.querySelector("#ItipoPublicacion2").checked;
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
    /**
     * Obtiene los valores ingresados para crear la publicacion y los inserta en la base de datos
     */
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
        let tipoPublicacion = document.querySelector("#ItipoPublicacion").checked;
        let tipoPublicacion2 = document.querySelector("#ItipoPublicacion2").checked;
        let tipo ;
        if (tipoPublicacion.checked=true) {
            tipo = "formal";
        }
        if (tipoPublicacion2.checked=true) {
            tipo= "informal";
        }
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
        nuevaPublicacion.tipo = tipo;
        let formdata = new FormData();
        console.log(nuevaPublicacion);
        formdata.append("descripcion",nuevaPublicacion.descripcion);
        formdata.append("aPagar",nuevaPublicacion.pagar);
        formdata.append("ubicacion",nuevaPublicacion.direccion );
        formdata.append("fecha", nuevaPublicacion.fecha1);
        formdata.append("titulo", nuevaPublicacion.titulo);
        formdata.append("fechafinal",nuevaPublicacion.fecha2);
        formdata.append("etiqueta", nuevaPublicacion.etiqueta);
        formdata.append("tipoPublicacion", nuevaPublicacion.tipo);
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
    /**
     * Obtiene los parametros ingresado por el usuario, todo los datos relacionados con la publicacion
     * y crea en la base de datos una nueva publicacion
     */
    Query = async(formdata) =>{
        const response = await axios.post("api/publicacion/createPublicacion.php", formdata);
        return await response.data;
    }
      /**
     * Obtiene la idpublicacion desde la base de datos 
     * y retorna toda la columna relacionada con esa id
     */
    queryId= async(formdata)=>{
        const response = await axios.post("api/publicacion/queryIdpublicacion.php",formdata);
        return await response.data;
    }

    /**
     * Obtiene la pregunta, el idusuario, idpublicacion y rut
     * los inserta en la base de datos pasandoselos a axios
     */
    createPregunta = async(formulario) =>{
        const response = await axios.post("api/pregunta/createPregunta.php",formulario);
        return await response.data;
    }