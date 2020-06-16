window.obtenerPublicacion = function() {
    $("#publicacion").removeClass("btn-ligh","button", "btn2");
    $("#publicacion").removeClass("button");
    $("#publicacion").removeClass("btn2");
    $("#publicacion").css("margin-top","20px");
    $("publicacion").css("margin-bottom","20px");
    $("#publicacion").addClass("btn-primary");
    $("#publicacion").addClass("btn-lg btn-block");
    axios.get('api/usuario/publicacionQuery.php').then(function(response) {
        window.cargarPublicaciones(response.data);
    });
  };


  window.cargarPublicaciones = function(publicaciones){
  cuerpo = document.querySelector("#mispublicaciones");
  for (let i = 0; i < publicaciones.length; i++) {
      
    //Creación de elementos html

    let divSombra = document.createElement("div");
    let div = document.createElement("div");
    let divcollapse = document.createElement("div");
    let h6Hashtag = document.createElement("h6");
    let h6 = document.createElement("h6");
    let h6Nombre = document.createElement("h6");
    let h6descripcion = document.createElement("h6");
    let h1Titulo = document.createElement("h1");
    let inputColapse = document.createElement("input");
    let imgPersona = document.createElement("img");
    
    let buttonModal = document.createElement("button");


    //Darle los valores de la publicacion actual

    let publicacionActual = publicaciones[i];


    //Pasarle las clases a los elementos

    divSombra.classList.add("shadow-lg","p3","bg-white","rounded");
    imgPersona.classList.add("fotoPersona");
    h6Nombre.classList.add("nombrePersona");
    h6Hashtag.classList.add("hashtag");
    h1Titulo.classList.add("titulo");
    divcollapse.classList.add("collapse");
    inputColapse.classList.add("down");
    buttonModal.classList.add("btn", "btn-dark", "btn-lg", "btn-block");

    //Pasarle atributos a los elementos

    imgPersona.setAttribute("src", "img/putopng.jpg");
    inputColapse.setAttribute("type","image");
    inputColapse.setAttribute("src","img/down.png");
    inputColapse.setAttribute("data-toggle","collapse");
    inputColapse.setAttribute("data-target","#demo"+publicacionActual.idpublicacion);
    divcollapse.setAttribute("id","demo"+publicacionActual.idpublicacion);
    buttonModal.setAttribute("type","button");
    buttonModal.setAttribute("data-toggle","modal");
    buttonModal.setAttribute("data-target","#modal");
    buttonModal.setAttribute("id","modal"+publicacionActual.idpublicacion);
   // Darle los value a los elementos html

   h6.innerText = "#"+publicacionActual.etiqueta;
   h1Titulo.innerText=publicacionActual.titulo;
   h6.innerText="Publicado: "+publicacionActual.fecha;
   h6descripcion.innerText= publicacionActual.descripcion;
   h6Hashtag.innerHTML = publicacionActual.etiqueta;
   buttonModal.innerHTML = "¡Postula!";
   let formData = new this.FormData();
   let personaAjax = {};
   personaAjax.rut = publicacionActual.rut;
   formData.append("rut", personaAjax.rut);
   cargarPersona(formData).then(response=>{
    for (let i = 0; i < response.length; i++) {
      let personaActual=response[i];
      h6Nombre.innerText = personaActual.nombre +" "+ personaActual.apellidoP +" "+ personaActual.apellidoM;
    }

    divSombra.appendChild(div);
    divSombra.appendChild(h6Hashtag);
    divSombra.appendChild(h1Titulo);
    divSombra.appendChild(h6);
    divSombra.appendChild(inputColapse);
    divSombra.appendChild(divcollapse);
    div.appendChild(imgPersona);
    div.appendChild(h6Nombre);
    divcollapse.appendChild(h6descripcion);
    divcollapse.appendChild(buttonModal);
    cuerpo.appendChild(divSombra);
    
    document.getElementById("modal"+publicacionActual.idpublicacion).addEventListener("click", function() {
      let modalbdy= document.querySelector("#modalbdy1");

      //Crear  el formulario

      let form = document.createElement("form");
      let divGroup = document.createElement("div");
      let labelPregunta = document.createElement("label");
      let inputRespuesta = document.createElement("input");
      let botonEnviar = document.createElement("button");

      // Pasarle las clases a los elementos creados
      divGroup.classList.add("form-group");
      inputRespuesta.classList.add("form-control");
      botonEnviar.classList.add("btn", "btn-dark", "btn-lg", "btn-block");
      //Eliminarlos si ya existen
    

      //Obtener la pregunta desde la bd

      let preguntaAjax = new FormData();
      preguntaAjax.append("idpublicacion", publicacionActual.idpublicacion);
      obtenerPregunta(preguntaAjax).then(response=>{
        labelPregunta.innerText = response[0].texto;
        console.log(response[0].texto);
        console.log(response.texto);
        
      })

      botonEnviar.innerText= "Enviar";
      form.appendChild(divGroup);
      divGroup.appendChild(labelPregunta);
      divGroup.appendChild(inputRespuesta);
      divGroup.appendChild(botonEnviar);
      modalbdy.appendChild(form);


    });
    

    }) 
  }


}

cargarPersona = async(formData) =>{
    const response = await axios.post("api/persona/queryPersona.php", formData);
    return await response.data;
}
obtenerPregunta = async(preguntaAjax)=>{
  const response = await axios.post("api/pregunta/queryPregunta.php", preguntaAjax);
  return await response.data;
}


  window.obtenerPublicacion();
