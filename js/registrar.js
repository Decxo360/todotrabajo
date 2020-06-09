var nombre
var apellidoM
var apellidoP
var rut
var tarjeta
var edad
var correo
var contraseña
var contraseña2

document.querySelector("#btnRegistrar").addEventListener("click", function () {
  
  //person
  nombre = document.querySelector("#nombrePersona").value;
  apellidoM = document.querySelector("#apellidoMPersona").value;
  apellidoP = document.querySelector("#apellidoPPersona").value;
  rut = document.querySelector("#rutPersona").value;
  tarjeta = document.querySelector("#tarjetaPersona").value;
  edad = document.querySelector("#edadPersona").value;
  //user
  correo = document.querySelector("#correoPersona").value;
  contraseña = document.querySelector("#contraseñaPersona").value;
  contraseña2 =document.querySelector("#contraseña2").value;

  if(verificarCampos()){
    iniciarRegistro();
  }
  
});

function iniciarRegistro() {

  //making person
  let nuevaPersona = {};
  nuevaPersona.nombre = nombre;
  nuevaPersona.apellidoM = apellidoM;
  nuevaPersona.apellidoP = apellidoP;
  nuevaPersona.rut = rut;
  (nuevaPersona.edad = edad), (nuevaPersona.tarjeta = tarjeta);

  //making formulary from data person
  let personaAjax = new FormData();
  personaAjax.append("nombre", nuevaPersona.nombre);
  personaAjax.append("apellidoM", nuevaPersona.apellidoM);
  personaAjax.append("apellidoP", nuevaPersona.apellidoP);
  personaAjax.append("rut", nuevaPersona.rut);
  personaAjax.append("edad", nuevaPersona.edad);
  personaAjax.append("tarjeta", nuevaPersona.tarjeta);
  
  //user data
  let tipoUsuario = "usuario";
  trabajoRealizado = 0;
  postulados = 0;
  puntos = 0;
  trabajoSubidos=0;

  let nuevoUsuario = {};
  nuevoUsuario.correo = correo;
  nuevoUsuario.contraseña = contraseña;
  nuevoUsuario.tipoUsuario = tipoUsuario;
  nuevoUsuario.rut = nuevaPersona.rut;
  
  let userAjax = new FormData();
  //todo agregar los datos de usuario al formData userAjax
  userAjax.append("email", nuevoUsuario.correo);
  userAjax.append("pass", nuevoUsuario.contraseña);
  userAjax.append("tipoUsuario", nuevoUsuario.tipoUsuario);
  userAjax.append("rut", nuevoUsuario.rut);


  //TODO AGREGAR Y CREAR LA PARTE DE EXPERIENCIA
  
  /*let nuevaExperiencia = {};
  nuevaExperiencia.trabajoRealizado = trabajoRealizado;
  nuevaExperiencia.postulados = postulados;
  nuevaExperiencia.puntos = puntos;
  nuevaExperiencia.trabajoSubidos = trabajoSubidos;
  nuevaExperiencia.idusuario=idusuario;
  nuevaExperiencia.rut = rut;

  let experienceAjax = new FormData();
  fomrdata.append("esRealizado", nuevaExperiencia.trabajoRealizado);
  fomrdata.append("esPostulado", nuevaExperiencia.postulados);
  fomrdata.append("puntos", nuevaExperiencia.puntos);
  fomrdata.append("esSubido", nuevaExperiencia.trabajoSubidos);
  fomrdata.append("idusuario",nuevaExperiencia.idusuario);
  fomrdata.append("rut", nuevaExperiencia.rut);*/

  //sending person through ajax to endpoint
  
  createPersona(personaAjax).then(res => {
    createUser(userAjax).then(res => {
      console.log(res);
    })
  })
  
    
}

createPersona = async (personaAjax) => {
  const res = await axios.post("api/persona/createPersona.php", personaAjax);
  return await res.data;
}

createUser = async (userAjax) => {
  const res = await axios.post("api/usuario/createUsuario.php", userAjax);
  return await res.data;
}

function verificarCampos() {

  let error = "";

  if(

    /* persona */
    nombre != "" &&
    apellidoM != "" &&
    apellidoP != "" &&
    rut != "" &&
    tarjeta != "" &&
    edad != "" &&

    /* usuario */
    correo != "" &&
    contraseña != "" &&
    contraseña2 != "" &&
    contraseña.length >= 8 &&
    contraseña2.length >= 8 &&
    (contraseña === contraseña2)

    ){
      return true;
  }
  
  //person inputs
  if(nombre == ""){
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

  //user inputs
  if (correo == "") {
    $("#invalido1").removeClass("d-none");
  }
  if (contraseña == "") {
    $("#invalido2").removeClass("d-none");
  }
  if (contraseña2 == "") {
    $("#invalido3").removeClass("d-none");
  }
  if(contraseña.length >= 8){
    $("#invalido2").removeClass("d-none");
    $("#invalido2").text("La contraseña tiene que ser de largo 8 o superior");
  }
  if(contraseña2.length >= 8){
    $("#invalido3").removeClass("d-none");
    $("#invalido3").text("La contraseña tiene que ser de largo 8 o superior");
  }
  if(contraseña == contraseña2){
    error = "No ha ingresado correctamente las contraseña";
  }

  error = "Debe ingresar todos los campos"
  divModal = document.getElementById("staticBackdrop");
  console.log(error);

  return false;
}