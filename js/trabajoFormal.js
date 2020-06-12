window.obtenerPublicacion = function() {
    axios.get('api/publicacion/queryPublicacion.php').then(function(response) {
      window.cargarPublicaciones(response.data);
    });
  };



  window.cargarPublicaciones = function(publicaciones){

    let cuerpo = document.querySelector("#cajaScroll");
    for (let i = 0; i < publicaciones.length; i++){
        //Cuerpo de la publicacion
        
        let divContainer= document.createElement("div");
        let divImangen= document.createElement("div");
        let divCuerpo= document.createElement("div");
        let img = document.createElement("img");
        let br = document.createElement("br");
        let h4Titulo= document.createElement("h4");
        let hrgordo = document.createElement("hr");
        let h4Trabajo = document.createElement("h4");
        let h6Empresa = document.createElement("h6");
        let h6fecha = document.createElement("h6");

        //Agregarle las clases a los elementos creados anteriormente
        divContainer.classList.add("flex-container1");
        divImangen.classList.add("imagen");
        divCuerpo.classList.add("cuerpa");
        img.classList.add("cuadrada");
        h4Titulo.classList.add("titulo");
        hrgordo.classList.add("hrgordo");
        h4Trabajo.classList.add("trabajo");
        h6Empresa.classList.add("empresa");
        h6fecha.classList.add("fecha");


        //Obtengo los datos de la bd
        let formData = new this.FormData();
        formData.append("rut",publicaciones.rut);
        cargarPersona(formData).then(response=>{
        h6Empresa.innerText = response.nombre;
        })  
        let publicacionActual = publicaciones[i];
        h4Titulo.innerText = publicacionActual.titulo;
        h4Trabajo.innerText = publicacionActual.titulo;
        h6fecha.innerText = publicacionActual.fecha;
        divContainer.id.innerText = publicacionActual.id;

        divContainer.appendChild(divImangen);
        divImangen.appendChild(img);
        divCuerpo.appendChild(br);
        divCuerpo.appendChild(h4Titulo);
        divCuerpo.appendChild(hrgordo);
        divCuerpo.appendChild(h4Trabajo);
        divCuerpo.appendChild(h6Empresa);
        divCuerpo.appendChild(h6fecha);
        cuerpo.appendChild(divContainer);

    }
  };
  cargarPersona = async(formData) =>{
      const response = await axios.post("api/persona/queryPersona.php", formData);
      return await response.data;
  }
  window.obtenerPublicacion()