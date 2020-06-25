window.obtenerPublicacion = function () {
  $("#publicacion").removeClass("btn-ligh", "button", "btn2");
  $("#publicacion").removeClass("button");
  $("#publicacion").removeClass("btn2");
  $("#publicacion").css("margin-top", "20px");
  $("publicacion").css("margin-bottom", "20px");
  $("#publicacion").addClass("btn-primary");
  $("#publicacion").addClass("btn-lg btn-block");
  axios.get("api/usuario/publicacionQuery.php").then(function (response) {
    window.cargarPublicaciones(response.data);
  });
};

window.cargarPublicaciones = function (publicaciones) {
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

    divSombra.classList.add("shadow-lg", "p3", "bg-white", "rounded");
    imgPersona.classList.add("fotoPersona");
    h6Nombre.classList.add("nombrePersona");
    h6Hashtag.classList.add("hashtag");
    h1Titulo.classList.add("titulo");
    divcollapse.classList.add("collapse");
    inputColapse.classList.add("down");
    buttonModal.classList.add("btn", "btn-dark", "btn-lg", "btn-block");

    //Pasarle atributos a los elementos

    imgPersona.setAttribute("src", "img/putopng.jpg");
    inputColapse.setAttribute("type", "image");
    inputColapse.setAttribute("src", "img/down.png");
    inputColapse.setAttribute("data-toggle", "collapse");
    inputColapse.setAttribute(
      "data-target",
      "#demo" + publicacionActual.idpublicacion
    );
    divcollapse.setAttribute("id", "demo" + publicacionActual.idpublicacion);
    buttonModal.setAttribute("type", "button");
    buttonModal.setAttribute("data-toggle", "modal");
    buttonModal.setAttribute("data-target", "#modal");
    buttonModal.setAttribute("id", "modal" + publicacionActual.idpublicacion);
    // Darle los value a los elementos html

    h6.innerText = "#" + publicacionActual.etiqueta;
    h1Titulo.innerText = publicacionActual.titulo;
    h6.innerText = "Publicado: " + publicacionActual.fecha;
    h6descripcion.innerText = publicacionActual.descripcion;
    h6Hashtag.innerHTML = publicacionActual.etiqueta;
    buttonModal.innerHTML = "¡Postula!";
    let formData = new this.FormData();
    let personaAjax = {};
    personaAjax.rut = publicacionActual.rut;
    formData.append("rut", personaAjax.rut);
    cargarPersona(formData).then((response) => {
      for (let i = 0; i < response.length; i++) {
        let personaActual = response[i];
        h6Nombre.innerText =
          personaActual.nombre +
          " " +
          personaActual.apellidoP +
          " " +
          personaActual.apellidoM;
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
      /**
       * Al precionar el boton de postular al trabajo ocurren una serie de servicios a la bd
       */
      document
        .getElementById("modal" + publicacionActual.idpublicacion)
        .addEventListener("click", function () {
          let modalbdy = document.querySelector("#modalbdy1");

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

          $("#modalbdy1").empty();

          //Obtener la pregunta desde la bd

          let preguntaAjax = new FormData();
          preguntaAjax.append("idpublicacion", publicacionActual.idpublicacion);
          preguntaAjax.append("idusuario", publicacionActual.idusuario);
          preguntaAjax.append("rut", publicacionActual.rut);
          obtenerPregunta(preguntaAjax).then((response) => {
            if (response[0].idpregunta == " ") {
              labelPregunta.innerText = "No hay pregunta para usted";
            } else {
              labelPregunta.innerText = response[0].texto;
            }
            $("label").css("margin-left", "70px");
            inputRespuesta.setAttribute("id", "respuesta");
            let idpregunta = response[0].idpregunta;
            console.log(idpregunta);
            let respuestaJax = {};
            respuestaJax.idpregunta = idpregunta;
          });

          botonEnviar.innerText = "Enviar";
          botonEnviar.setAttribute("id", "enviar");
          botonEnviar.setAttribute("type", "button");

          botonEnviar.style.marginTop = "10px";
          //form.setAttribute();

          form.appendChild(divGroup);
          divGroup.appendChild(labelPregunta);
          divGroup.appendChild(inputRespuesta);
          divGroup.appendChild(botonEnviar);
          modalbdy.appendChild(form);

          document
            .getElementById("enviar")
            .addEventListener("click", function () {
              let respuesta = document.querySelector("#respuesta").value;
              console.log(respuesta);
              let publicacionActual = publicaciones[i];
              let preguntaAjax = new FormData();
              preguntaAjax.append(
                "idpublicacion",
                publicacionActual.idpublicacion
              );
              preguntaAjax.append("idusuario", publicacionActual.idusuario);
              preguntaAjax.append("rut", publicacionActual.rut);
              obtenerPregunta(preguntaAjax).then((response) => {
                if (!response[0].idpregunta == " ") {
                  let idpregunta = response[0].idpregunta;
                  console.log(idpregunta);
                  let respuestaJax = {};
                  respuestaJax.idpregunta = idpregunta;
                  respuestaJax.respuesta = respuesta;
                  let formRes = new FormData();
                  formRes.append("respuesta", respuestaJax.idpregunta);
                  formRes.append("idpregunta", respuestaJax.respuesta);
                  crearRespuesta(formRes).then((response) => {
                    datosPersona().then((response) => {
                      let postulanteAjax = new FormData();
                      postulanteAjax.append("nombre", response[0].nombre);
                      postulanteAjax.append("apellidoM", response[0].apellidoM);
                      postulanteAjax.append("apellidoP", response[0].apellidoP);
                      crearPostulante(postulanteAjax).then((response) => {
                        consultarPostulante().then((response) => {
                          let postulacion = {};
                          console.log(publicacionActual.idusuario);
                          let idp = publicacionActual.idpublicacion;
                          let idu = publicacionActual.idusuario;
                          let ru = publicacionActual.rut;
                          let idpo = response[0].idpostulante;

                          postulacion.idp = idp;
                          postulacion.idu = idu;
                          postulacion.ru = ru;
                          postulacion.idpo = idpo;

                          let postulacionAjax = new FormData();

                          postulacionAjax.append(
                            "idpostulante",
                            postulacion.idpo
                          );
                          postulacionAjax.append(
                            "idpublicacion",
                            postulacion.idp
                          );
                          postulacionAjax.append("idusuario", postulacion.idu);
                          postulacionAjax.append("rut", postulacion.ru);
                          crearPostulacion(postulacionAjax).then((response) => {
                            alert("Felicidades, ha postulado con exito");
                            location.reload();
                          });
                        });
                      });
                    });
                  });
                } else {
                  return false;
                }
              });
            });
        });
    });
  }
};

document.getElementById("Postulantes").addEventListener("click", function () {
  let div1 = document.getElementById("postulantes");
  $("#postulantes").empty();
  div1.classList.remove("d-none");
  let h1Lele = document.createElement("h1");
  h1Lele.innerText = "Mis postulantes";
  $(h1Lele).css("text-align", "center");
  div1.appendChild(h1Lele);
  cargarPostulacion().then((response) => {
    for (let i = 0; i < response.length; i++) {
      let postulanteActual = response[i];

      let divSombra = document.createElement("div");
      let div = document.createElement("div");
      let divcollapse = document.createElement("div");
      let h6Nombre = document.createElement("h6");
      let h1Titulo = document.createElement("h1");
      let inputColapse = document.createElement("input");
      let imgPersona = document.createElement("img");
      let h6 = document.createElement("h6");
      let buttonSelecionado = document.createElement("button");

      divSombra.classList.add("shadow-lg", "p3", "bg-white", "rounded");
      h6Nombre.classList.add("nombrePersona");
      h1Titulo.classList.add("titulo");
      divcollapse.classList.add("collapse");
      inputColapse.classList.add("down2");
      buttonSelecionado.classList.add("btn", "btn-primary", "seleccionado");

      imgPersona.setAttribute("src", "img/putopng.jpg");
      inputColapse.setAttribute("type", "image");
      inputColapse.setAttribute("src", "img/down.png");
      inputColapse.setAttribute("data-toggle", "collapse");
      buttonSelecionado.setAttribute("type", "button");
      buttonSelecionado.setAttribute(
        "id",
        "seleccionado" + postulanteActual.idpublicacion
      );

      buttonSelecionado.innerText = "Seleccionar persona para este trabajo";
      let publicacion = postulanteActual.idpostulante;
      let postulanteAjax = new FormData();
      postulanteAjax.append("idpostulante", publicacion);
      let publiAjax = new FormData();
      publiAjax.append("idpublicacion", postulanteActual.idpublicacion);
      traemeLaPubli(publiAjax).then((response) => {
        for (let i = 0; i < response.length; i++) {
          let publiactual = response[i];
          let tituloPostulacion = publiactual.titulo;
          h1Titulo.innerText = tituloPostulacion;
          divcollapse.setAttribute(
            "id",
            "postulante" + publiactual.idpublicacion
          );
          inputColapse.setAttribute(
            "data-target",
            "#postulante" + publiactual.idpublicacion
          );
        }
      });
      traemeLpostulante(postulanteAjax).then((response) => {
        for (let i = 0; i < response.length; i++) {
          let postulante = response[i];
          let nombrePostulante =
            postulante.nombre +
            " " +
            postulante.apellidoP +
            " " +
            postulante.apellidoM;
          h6.innerText = nombrePostulante;
          h6.style.height = "50px";
          h6.style.paddingTop = "14px";
        }
      });

      divSombra.appendChild(div);
      divSombra.appendChild(h1Titulo);
      divSombra.appendChild(inputColapse);
      divSombra.appendChild(divcollapse);
      divcollapse.appendChild(div);
      divcollapse.appendChild(buttonSelecionado);
      div.appendChild(h6);
      div1.appendChild(divSombra);

      document
        .getElementById("seleccionado" + postulanteActual.idpublicacion)
        .addEventListener("click", function () {
          let botonsql = document.getElementById(
            "seleccionado" + postulanteActual.idpublicacion
          );
          
          let formdata = new FormData();
          let numEnviado = 0;
          let esEnviado = "no";
          formdata.append("esEnviado", esEnviado);
          formdata.append("numEnviado", numEnviado);
          formdata.append("idpostulante", postulanteActual.idpostulante);
          formdata.append("idpublicacion", postulanteActual.idpublicacion);
          formdata.append("idusuario", postulanteActual.idusuario);
          formdata.append("rut", postulanteActual.rut);
          crearSeleccionado(formdata).then((response) => {
            
            consultaSeleccionado().then(response=>{
              for (let i = 0; i < response.length; i++) {
                let publicacion = response[i];

            //crear la tabla Rol

            let codigo1 = randomString(10);
            let codigo2 = randomString(10);
            let idusuario = publicacion.idusuario;
            let idpublicacion = publicacion.idpublicacion;
            let rol = "Empleador";
            
            let RolEmpleador = {};

            RolEmpleador.codigo1 = codigo1;
            
            RolEmpleador.idusuario = idusuario;
            RolEmpleador.idpublicacion = idpublicacion;
            RolEmpleador.rol = rol;

            //Pasarle los datos al formulario para luego insertarlo a la bd

            let RolAjax = new FormData();
            RolAjax.append("codigo",RolEmpleador.codigo1);
            RolAjax.append("idusuario",RolEmpleador.idusuario);
            RolAjax.append("idpublicacion",RolEmpleador.idpublicacion);
            RolAjax.append("rol",RolEmpleador.rol);
            crearRol(RolAjax).then(response =>{
             
            })    
            
            let idpublicacion2 = publicacion.idpublicacion;
            let RolTrabajador = {};
            let rol2 = "Trabajador";

            RolTrabajador.codigo2 = codigo2;
            RolTrabajador.idpublicacion2 = idpublicacion2;
            RolTrabajador.rol2 = rol2;

            let RolEmpleadoAjax = new FormData();
            RolEmpleadoAjax.append("codigo",RolTrabajador.codigo2);
            RolEmpleadoAjax.append("idpublicacion",RolTrabajador.idpublicacion2);
            RolEmpleadoAjax.append("rol",RolTrabajador.rol2);

            crearRol2(RolEmpleadoAjax).then(response =>{
              
            })


            let finalizado ={};

            let idpublicacion3 = publicacion.idpublicacion;

            finalizado.idpublicacion3 = idpublicacion3;


            let finalizadoAjax = new FormData();

            finalizadoAjax.append("idpublicacion",finalizado.idpublicacion3);
            crearFinalizado(finalizadoAjax).then(response=>{
              
            })

              }
            })
            alert(
              "Felicidades, ha seleccionado a una persona para su trabajo!"
            );
          });
        });
    }
  });
});
 
/**
 * Al precionar el div seleccionado este genera diversas funciones, realiza inserciones, consultas e creacion
 * de elemtos HTML 
 */

document.getElementById("seleccionado").addEventListener("click", function () {

  let div = document.getElementById("seleccionados");
  let h1 = document.createElement("h1");
  $(h1).css("text-align","center");
  h1.innerText = "Trabajos a los que he sido seleccionado";
  $("#seleccionados").empty();
  div.appendChild(h1);
  consultarPostulante().then((response) => {
    for (let i = 0; i < response.length; i++) {
      let seleccionadoActual = response[i];
      let consultaSeleccionado = new FormData();
      consultaSeleccionado.append(
        "idpostulante",
        seleccionadoActual.idpostulante
      );
      consultaSelec(consultaSeleccionado).then((response) => {
        if (response == [] ) {
          alert("No has sido seleccionado para ningun trabajo, suerte!");
          location.reload();
        } else {
          for (let i = 0; i < response.length; i++) {
          
            let publiajax = new FormData();
            publiajax.append("idpublicacion", publicacion.idpublicacion);
            publicacionid(publiajax).then((response) => {
              
              // Se crean elementos html para poder mostrar los trabajos que has sido seleccionado

             
              let divshadow = document.createElement("div");
              let h6 = document.createElement("h6");
              let h6nombrePublicacion = document.createElement("h6");

              //Se le da el texto a los elemtos html

              
              h6.innerText = "Has sido seleccionado al trabajo: "+ response[0].titulo;

              let formData = new FormData();

              formData.append("rut", response[0].rut);
              cargarPersona(formData).then(response =>{
                h6nombrePublicacion.innerText = "De: " 
                + response[0].nombre
                +" "+ response[0].apellidoP 
                + " " + response[0].apellidoM;
              })

              $(h6).css("text-align","center");
              $(h6nombrePublicacion).css("text-align","center");


              div.classList.remove("d-none");
              divshadow.classList.add("shadow-lg", "p3", "bg-white", "rounded");

              //Crear los elementos en miperfil.php
              divshadow.appendChild(h6);
              divshadow.appendChild(h6nombrePublicacion);
              
              div.appendChild(divshadow);


            });
          }
        }
      });
    }
  });
});

/**
 * Carga la ultima calificacion ingresada por un usuario
 */ 


function Cargarpuntuacion(){
  consutaExperiencia().then(response =>{

  let cuerpo = document.querySelector(".dflexCorreo");

  let form = document.createElement("form");
  let label1 = document.createElement("label");
  let label2 = document.createElement("label");
  let label3 = document.createElement("label");
  let label4 = document.createElement("label");
  let label5 = document.createElement("label");
  let p = document.createElement("p");

  p.classList.add("clasificacion");

  label1.setAttribute("for","radio1");
  label2.setAttribute("for","radio2");
  label3.setAttribute("for","radio3");
  label4.setAttribute("for","radio4");
  label5.setAttribute("for","radio5");

  label1.innerText="★";
  label2.innerText="★";
  label3.innerText="★";
  label4.innerText="★";
  label5.innerText="★";
  
  //Darle el color a las estrellas
  
  label1.style.color = "orange";
  label2.style.color = "orange";
  label3.style.color = "orange";
  label4.style.color = "orange";
  label5.style.color = "orange";
  
  //Dejar el texto al centro
  p.style.textAlign = "center";
  
  //Asignarle el tamaño a la letra
  label1.style.fontSize = "x-large";
  label2.style.fontSize = "x-large";
  label3.style.fontSize = "x-large";
  label4.style.fontSize = "x-large";
  label5.style.fontSize = "x-large";
  

  form.appendChild(p);
  if(response[0].xp == 5){
    p.appendChild(label5);
    p.appendChild(label4);
    p.appendChild(label3);
    p.appendChild(label2);
    p.appendChild(label1);
  }
  if(response[0].xp == 4){
    p.appendChild(label4);
    p.appendChild(label3);
    p.appendChild(label2);
    p.appendChild(label1);
  }  
  if(response[0].xp == 3){
    p.appendChild(label3);
    p.appendChild(label2);
    p.appendChild(label1);
  }  
  if(response[0].xp == 2){
    p.appendChild(label2);
    p.appendChild(label1);
  }  
  if(response[0].xp == 1){
    p.appendChild(label1);
  }  
 
  
  cuerpo.appendChild(form);

 })
}

crearFinalizado = async(finalizadoAjax)=>{
  const response = await axios.post("api/finalizado/createFinalizado.php",finalizadoAjax);
  return await response.data;
}

crearRol2 = async(RolEmpleadoAjax)=>{
  const response = await axios.post("api/roles/createRol2.php",RolEmpleadoAjax);
  return await response.data;
}


consultaSeleccionado = async()=>{
  const response = await axios.get("api/seleccionado/queryEmpleador.php");
  return await response.data;
}


/**
 * Se le entrega un formulario para que axios le entregue los datos a php para la consulta sql
 */

crearRol = async(RolAjax)=>{
  const response = await axios.post("api/roles/createRol.php",RolAjax);
  return await response.data;
}

/**
 * Se le entrega un formulario para que axios le entregue los datos a php para la consulta sql
 */

publicacionid = async (publiajax) => {
  const response = await axios.post(
    "api/publicacion/consultaId.php",
    publiajax
  );
  return await response.data;
};

/**
 * Se le entrega un formulario para que axios le entregue los datos a php para la consulta sql
 */

consultaSelec = async (consultaSelec) => {
  const response = await axios.post(
    "api/seleccionado/querySeleccionado.php",
    consultaSelec
  );
  return await response.data;
};

/**
 * Se le entrega un formulario para que axios le entregue los datos a php para la consulta sql
 */

crearSeleccionado = async (formdata) => {
  const response = await axios.post(
    "api/seleccionado/createSeleccionado.php",
    formdata
  );
  return await response.data;
};

/**
 * Se le entrega un formulario para que axios le entregue los datos a php para la consulta sql
 */

traemeLaPubli = async (publiAjax) => {
  const response = await axios.post(
    "api/publicacion/queryNoseCuanto.php",
    publiAjax
  );
  return await response.data;
};

/**
 * Se le entrega un formulario para que axios le entregue los datos a php para la consulta sql
 */

traemeLpostulante = async (postulanteAjax) => {
  const response = await axios.post(
    "api/postulante/queryPostulante2.php",
    postulanteAjax
  );
  return await response.data;
};

cargarPostulacion = async () => {
  const response = await axios.get("api/postulacion/queryPostulacion.php");
  return await response.data;
};
/**
 * Se le entrega un formulario para que axios le entregue los datos a php para la consulta sql
 */
cargarPersona = async (formData) => {
  const response = await axios.post("api/persona/queryPersona.php", formData);
  return await response.data;
};
/**
 * Obtiene la pregunta para luego poder
 */
obtenerPregunta = async (preguntaAjax) => {
  const response = await axios.post(
    "api/pregunta/queryPregunta.php",
    preguntaAjax
  );
  return await response.data;
};
/**
 * Crea la respuesta 
 */
crearRespuesta = async (formRes) => {
  const response = await axios.post(
    "api/respuesta/createRespuesta.php",
    formRes
  );
  return await response.data;
};

/**
 * Consulta los datos de la persona
 */

datosPersona = async () => {
  const response = await axios.get("api/persona/datosPersona.php");
  return await response.data;
};

/**
 * Entrega un formulario a axios y axios le entrega los parametros a createPostulante.php
 */
crearPostulante = async (postulanteAjax) => {
  const response = await axios.post(
    "api/postulante/createPostulante.php",
    postulanteAjax
  );
  return await response.data;
};

/**
 * Consulta directa a la base de datos para obtener todos los parametros del postulante
 */

consultarPostulante = async () => {
  const response = await axios.get("api/postulante/queryPostulante.php");
  return await response.data;
};

/**
 * Entrega un formulario a axios y axios le entrega los parametros a createPostulacion.php
 */
crearPostulacion = async (postulacionAjax) => {
  const response = await axios.post(
    "api/postulacion/createPostulacion.php",
    postulacionAjax
  );
  return await response.data;
};

/**
 * Consulta la experiencia del usuario con el rut de la sesion
 */
consutaExperiencia = async() => {
  const response = await axios.get("api/experiencia/queryXp.php");
  return await response.data;
};

/**
 * Este método extrae caracteres del charSet, dependiendo del largo que se pida
 * este retorna aleatoriamente codigo
 * @param {largo del codigo} len 
 * @param {opcional} charSet 
 */
function randomString(len, charSet) {
  charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var randomString = '';
  for (var i = 0; i < len; i++) {
      var randomPoz = Math.floor(Math.random() * charSet.length);
      randomString += charSet.substring(randomPoz,randomPoz+1);
  }
  return randomString;
}

window.obtenerPublicacion();
Cargarpuntuacion();