document.querySelector("#btnRegistrar").addEventListener("click", function () {
  let nombre = document.querySelector("#nombrePersona").value;
  let apellidoM = document.querySelector("#apellidoMPersona").value;
  let apellidoP = document.querySelector("#apellidoPPersona").value;
  let rut = document.querySelector("#rutPersona").value;
  let tarjeta = document.querySelector("#tarjetaPersona").value;
  let edad = document.querySelector("#edadPersona").value;
  
  if(!nombre == "" && !apellidoM == "" && !apellidoP == "" && !rut == "" && !tarjeta == "" && !edad==""){
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
  trabajoRealizado = 0;
  postulados = 0;
  puntos = 0;
  trabajoSubidos=0;
  let rut = document.querySelector("#rutPersona").value;
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
        let idusuario;
      
        let fomrdata = new FormData();
        nuevaexp={};
        nuevaexp.correo= correo;
        nuevaexp.contraseña= contraseña;
        let formdata1 = new FormData();
        formdata1.append("email",nuevaexp.correo);
        formdata1.append("pass",nuevaexp.contraseña);
        let formData2 = new FormData();
        formData2.append("email", nuevoUsuario.correo);
        formData2.append("pass", nuevoUsuario.contraseña);
        formData2.append("tipousuario", nuevoUsuario.tipoUsuario);
        formData2.append("rut", nuevoUsuario.rut);
        axios.post("api/usuario/createUsuario.php", formData2)
        .then(axios.post("api/usuario/queryUsuario.php",formdata1).then(response=>{
          let usuario = response.data;
          console.log(axios.post("api/usuario/createUsuario.php", formData2));
          console.log(usuario);
        //  console.log(usuario);
          //for (let index = 0; index < usuario.length; index++) {
          //      console.log("si funca");

          //      let nu = {};
          //      nu = usuario[index];
          //      idusuario = nu[0];
          //}
         }));
        let nuevaExperiencia = {};
        nuevaExperiencia.trabajoRealizado = trabajoRealizado;
        nuevaExperiencia.postulados = postulados;
        nuevaExperiencia.puntos = puntos;
        nuevaExperiencia.trabajoSubidos = trabajoSubidos;
        nuevaExperiencia.idusuario=idusuario;
        nuevaExperiencia.rut = rut;
        fomrdata.append("esRealizado", nuevaExperiencia.trabajoRealizado);
        fomrdata.append("esPostulado", nuevaExperiencia.postulados);
        fomrdata.append("puntos", nuevaExperiencia.puntos);
        fomrdata.append("esSubido", nuevaExperiencia.trabajoSubidos);
        fomrdata.append("idusuario",nuevaExperiencia.idusuario);
        fomrdata.append("rut", nuevaExperiencia.rut);
        //axios.post("api/experiencia/createExperencia.php", fomrdata);
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
