window.obtenerPublicacion = function() {
    axios.get('api/publicacion/queryPublicacion.php').then(function(response) {
      console.log(response.data);
      window.cargarPublicaciones(response.data);
      
    });
  };



  window.cargarPublicaciones = function(publicaciones){

    let cuerpo = document.querySelector(".cajaScroll");
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
        img.setAttribute("src", "img/user.png");
        h4Titulo.classList.add("titulo");
        hrgordo.classList.add("hrgordo");
        h4Trabajo.classList.add("trabajo");
        h6Empresa.classList.add("empresa");
        h6fecha.classList.add("fecha");


        //Obtengo los datos de la bd
        let publicacionActual = publicaciones[i];
        h4Titulo.innerText = publicacionActual.titulo;
        h4Trabajo.innerText = publicacionActual.titulo;
        h6fecha.innerText ="Publicado el: "+publicacionActual.fecha;
        divContainer.setAttribute("id",publicacionActual.idpublicacion);
        let formData = new this.FormData();
        let personaAjax = {};
        let rut;
        personaAjax.rut = publicacionActual.rut;
        formData.append("rut", personaAjax.rut);
        cargarPersona(formData).then(response=>{
        for (let i = 0; i < response.length; i++) {
          personaActual=response[i];
          h6Empresa.innerText = personaActual.nombre +" "+ personaActual.apellidoP +" "+ personaActual.apellidoM;
        }
        
        })  

        divContainer.appendChild(divImangen);
        divContainer.appendChild(divCuerpo);
        divImangen.appendChild(img);
        divCuerpo.appendChild(br);
        divCuerpo.appendChild(h4Titulo);
        divCuerpo.appendChild(hrgordo);
        divCuerpo.appendChild(h4Trabajo);
        divCuerpo.appendChild(h6Empresa);
        divCuerpo.appendChild(h6fecha);
        cuerpo.appendChild(divContainer);

        document.getElementById(publicacionActual.idpublicacion).addEventListener("click",function(){
          
          //Eliminar contenido anterior al que vamos a crear
          $(".cabeceraDescripcion").remove();
          $(".descripcion > div").remove();
          $(".descripciontrabajo").remove();
        

          //crear la estructura de la descripción

          let descripcion = document.querySelector(".descripcion");
          let divCabecera = document.createElement("div");
          let br1 = document.createElement("br");
          let h1 = document.createElement("h1");
          let br = document.createElement("br");
          let div = document.createElement("div");
          let divPostular = document.createElement("div");
          let h6 = document.createElement("h6")
          let h6centrado = document.createElement("h6");
          let h6fecha = document.createElement("h6");
          let h6fechaf = document.createElement("h6");
          let buttonModal = document.createElement("button");
          let divDescripcion = document.createElement("div");
          let h5 = document.createElement("h5");
          let hr1 = document.createElement("hr");
      
          //Agregarle las clases a los elementos html

          h6fechaf.classList.add("derecha");
          divCabecera.classList.add("cabeceraDescripcion");
          divPostular.classList.add("postular");
          buttonModal.classList.add("btn","btn-primary","float-right");
          buttonModal.setAttribute("type","button");
          buttonModal.setAttribute("data-toggle","modal");
          buttonModal.setAttribute("data-target","#exampleModal");
          divDescripcion.classList.add("descripciontrabajo");
          h6centrado.classList.add("centro");

          //Obtener los datos desde la base de datos
          buttonModal.innerText = "¡Postula!";
          h1.innerText = publicacionActual.titulo;
          h5.innerText= publicacionActual.publicacion;
          h6fecha.innerText = "Publicado el :" + publicacionActual.fecha;
          h6fechaf.innerText = "Termina en :"+ publicacionActual.fechafinal;
          h6centrado.innerText = "Dirección:"+ publicacionActual.ubicacion;
          personaAjax.rut = publicacionActual.rut;
          formData.append("rut", personaAjax.rut);
          cargarPersona(formData).then(response=>{
          for (let i = 0; i < response.length; i++) {
            personaActual=response[i];
            h6.innerText = personaActual.nombre +" "+ personaActual.apellidoP +" "+ personaActual.apellidoM;
          }
          })

          divCabecera.appendChild(br);
          divCabecera.appendChild(h1);
          divCabecera.appendChild(br);
          div.appendChild(divPostular);
          divPostular.appendChild(h6);
          divPostular.appendChild(buttonModal);
          divDescripcion.appendChild(hr1);
          divDescripcion.appendChild(h5);
          divDescripcion.appendChild(hr1);
          divDescripcion.appendChild(h6fecha);
          divDescripcion.appendChild(h6centrado);
          divDescripcion.appendChild(h6fechaf);
          descripcion.appendChild(divCabecera);
          descripcion.appendChild(div);
          descripcion.appendChild(divDescripcion);

        });
    }
  };
  cargarPersona = async(formData) =>{
      const response = await axios.post("api/persona/queryPersona.php", formData);
      return await response.data;
  }
  window.obtenerPublicacion()