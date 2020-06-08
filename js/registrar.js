document.querySelector("#btnRegistrar").addEventListener("click", function () {
  let nombre = document.querySelector("#nombrePersona").value;
  let apellidoM = document.querySelector("#apellidoMPersona").value;
  let apellidoP = document.querySelector("#apellidoPPersona").value;
  let rut = document.querySelector("#rutPersona").value;
  let tarjeta = document.querySelector("#tarjetaPersona").value;
  let edad = document.querySelector("#edadPersona").value;
  trabajoRealizado = 0;
  postulados = 0;
  puntos = 0;
  trabajoSubidos=0;
  if(!nombre == "" && !apellidoM == "" && !apellidoP == "" && !rut == "" && !tarjeta == "" && !edad==""){
    let nuevaExperiencia = {};
    nuevaExperiencia.trabajoRealizado = trabajoRealizado;
    nuevaExperiencia.postulados = postulados;
    nuevaExperiencia.puntos = puntos;
    nuevaExperiencia.trabajoSubidos = trabajoSubidos
    nuevaExperiencia.rut = rut;
    console.log(nuevaExperiencia);
    let fomrdata = new FormData();
    fomrdata.append("trabajoRealizado", nuevaExperiencia.trabajoRealizado);
    fomrdata.append("postulados", nuevaExperiencia.postulados);
    fomrdata.append("puntos", nuevaExperiencia.puntos);
    fomrdata.append("trabajoSubido", nuevaExperiencia.trabajoSubidos);
    fomrdata.append("rut", nuevaExperiencia.rut);
    let nuevaPersona = {};
    nuevaPersona.nombre = nombre;
    nuevaPersona.apellidoM = apellidoM;
    nuevaPersona.apellidoP = apellidoP;
    nuevaPersona.rut = rut;
    (nuevaPersona.edad = edad), (nuevaPersona.tarjeta = tarjeta);
    console.log(nuevaPersona);
    let formData = new FormData();
    formData.append("nombre", nuevaPersona.nombre);
    formData.append("apellidoM", nuevaPersona.apellidoM);
    formData.append("apellidoP", nuevaPersona.apellidoP);
    formData.append("rut", nuevaPersona.rut);
    formData.append("edad", nuevaPersona.edad);
    formData.append("tarjeta", nuevaPersona.tarjeta);
    axios.post("api/experiencia/createExperencia.php", fomrdata);
    axios.post("api/persona/createPersona.php", formData);
  }else {
    if(nombre ==""){
      $("#invalido9").removeClass("d-none");
    }
    if(apellidoM==""){
      $("#invalido8").removeClass("d-none");
    }
    if(apellidoP==""){
      $("#invalido7").removeClass("d-none");
    }
    if(rut==""){
      $("#invalido6").removeClass("d-none");
    }
    if(edad==""){
      $("#invalido5").removeClass("d-none");
    }
    if(tarjeta=="No tengo"){
      $("#invalido4").removeClass("d-none");
    }
  }

});

document.querySelector("#btnRegistrar").addEventListener("click", function () {
  let correo = document.querySelector("#correoPersona").value;
  let contraseña = document.querySelector("#contraseñaPersona").value;
  let contraseña2 =document.querySelector("#contraseña2").value;
  let tipoUsuario = "usuario";
  let rut = document.querySelector("#rutPersona").value;
  axios.get("api/usuario/emailUsuario.php");
  console.log(axios.get("api/usuario/emailUsuario.php"));
  let idpersonaa;
  console.log(rut);
    let error = "";
  if (
    !correo == "" &&
    !contraseña == "" &&
    !contraseña2 == "" &&
    !rut == ""
  ) {
    if (contraseña.length >= 8 && contraseña2.length >= 8) {
      if (contraseña == contraseña2) {

        let nuevoUsuario = {};
        nuevoUsuario.correo = correo;
        nuevoUsuario.contraseña = contraseña;
        nuevoUsuario.tipoUsuario = tipoUsuario;
        nuevoUsuario.rut = rut;
      //  let formData3 = new FormData();
      //  let nuevaId = {};
      //  nuevaId.rut = rut;
      //  console.log(nuevaId);
      //  formData3.append("rut", nuevaId.rut);
      //  let persona = {};
        //axios
        //  .post("api/persona/queryPersona.php", formData3)
        //  .then((response) => {
        //    console.log(response);
        //    persona = response.data;
        //    for (let i = 0; i < persona.length; i++) {
        //      nuevaid = {};
        //      nuevaid = persona[i];
        //      idpersonaa = nuevaid[0];
        //      console.log(persona);
        //    }
        //  });
        let formData2 = new FormData();
        formData2.append("email", nuevoUsuario.correo);
        formData2.append("password", nuevoUsuario.contraseña);
        formData2.append("tipousuario", nuevoUsuario.tipoUsuario);
        formData2.append("rut", nuevoUsuario.rut);
        axios.post("api/usuario/createUsuario.php", formData2);
        console.log(nuevoUsuario);
      }else{
          error = "No ha ingresado correctamente las contraseña";
      }
    } else{
       $("#invalido2").removeClass("d-none");
       $("#invalido2").text("La contraseña tiene que ser de largo 8 o superior");
       $("#invalido3").removeClass("d-none");
       $("#invalido3").text("La contraseña tiene que ser de largo 8 o superior");
    }
  }else {
    if (correo == "") {
        $("#invalido1").removeClass("d-none");
    }
    if (contraseña == "") {
        $("#invalido2").removeClass("d-none");
    }
    if (contraseña2 == "") {
        $("#invalido3").removeClass("d-none");
    }
    error = "Debe ingresar todos los campos"
    divModal = document.getElementById("staticBackdrop"); 
  }
  console.log(error);
});
