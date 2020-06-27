let nombre;
let apellidoM;
let apellidoP;
let rut;
let tarjeta;
let edad;
let correo;
let contraseña;
let contraseña2;
let tipoUsuario;
let trabajoRealizado = 0;
let postulados = 0;
let puntos = 0;
let trabajoSubidos=0;
let idusuario;
/**
 * Inicializa los métodos definidos posteriormente
 */
document.querySelector("#btnRegistrar").addEventListener("click", function () {
  //PERSONA
  let nombre = document.querySelector("#nombrePersona").value;
  let apellidoM = document.querySelector("#apellidoMPersona").value;
  let apellidoP = document.querySelector("#apellidoPPersona").value;
  let rut = document.querySelector("#rutPersona").value;
  let tarjeta = document.querySelector("#tarjetaPersona").value;
  let edad = document.querySelector("#edadPersona").value;

  //USUARIO
  let correo = document.querySelector("#correoPersona").value;
  let contraseña = document.querySelector("#contraseñaPersona").value;
  let contraseña2 =document.querySelector("#contraseña2").value;
  let tipoUsuario = "usuario";
  
  if(verificarCampos()){
    iniciarRegistro();

  }else {
  }

});

/**
 * Obtiene todos los datos del registro de persona como tabla
 * nombre,apellidoP,apellidoM,rut,tarjeta y edad
 * Obtiene todos los datos del registro del usuario como tabla
 * correo, contraseña
 */
function iniciarRegistro(){
    //PERSONA
    let nombre = document.querySelector("#nombrePersona").value;
    let apellidoM = document.querySelector("#apellidoMPersona").value;
    let apellidoP = document.querySelector("#apellidoPPersona").value;
    let rut = document.querySelector("#rutPersona").value;
    let tarjeta = document.querySelector("#tarjetaPersona").value;
    let edad = document.querySelector("#edadPersona").value;
  
    //USUARIO
    let correo = document.querySelector("#correoPersona").value;
    let contraseña = document.querySelector("#contraseñaPersona").value;
    let contraseña2 =document.querySelector("#contraseña2").value;
    let tipoUsuario = "usuario";
    //EXPERIENCIA
    let trabajoRealizado = 0;
    let postulados = 0;
    let puntos = 0;
    let trabajoSubidos=0;
    let idusuariox;

  //creando a la persona
  let nuevaPersona = {};
  nuevaPersona.nombre = nombre;
  nuevaPersona.apellidoM = apellidoM;
  nuevaPersona.apellidoP = apellidoP;
  nuevaPersona.rut = rut;
  (nuevaPersona.edad = edad), 
  (nuevaPersona.tarjeta = tarjeta);

  //Pasando los datos al formData
  let formData = new FormData();
  formData.append("nombre", nuevaPersona.nombre);
  formData.append("apellidoM", nuevaPersona.apellidoM);
  formData.append("apellidoP", nuevaPersona.apellidoP);
  formData.append("rut", nuevaPersona.rut);
  formData.append("edad", nuevaPersona.edad);
  formData.append("tarjeta", nuevaPersona.tarjeta);
    
  //creando al usuario
  let nuevoUsuario = {};
  nuevoUsuario.correo = correo;
  nuevoUsuario.contraseña = contraseña;
  nuevoUsuario.tipoUsuario = tipoUsuario;
  nuevoUsuario.rut = rut;

  //Pasando los datas al formData1
  let formData2 = new FormData();
  formData2.append("email", nuevoUsuario.correo);
  formData2.append("pass", nuevoUsuario.contraseña);
  formData2.append("tipousuario", nuevoUsuario.tipoUsuario);
  formData2.append("rut", nuevoUsuario.rut);
  
  //Creando la experiencia del usuario
  let nuevaExperiencia = {};
  nuevaExperiencia.trabajoRealizado = trabajoRealizado;
  nuevaExperiencia.postulados = postulados;
  nuevaExperiencia.puntos = puntos;
  nuevaExperiencia.trabajoSubidos = trabajoSubidos;
  let exp = 5;
  nuevaExperiencia.exp = exp
  nuevaExperiencia.idusuariox = idusuariox;
  nuevaExperiencia.rut=rut;


  nuevaExperiencia.rut = rut;

  //Creando el formdata de la experiencia
  let xpAjax = new FormData();
  xpAjax.append("esRealizado", nuevaExperiencia.trabajoRealizado);
  xpAjax.append("esPostulado", nuevaExperiencia.postulados);
  xpAjax.append("puntos", nuevaExperiencia.puntos);
  xpAjax.append("esSubido", nuevaExperiencia.trabajoSubidos);
  xpAjax.append("xp",nuevaExperiencia.exp);
 
  
  //crear la query del usuario
  nuevaexp={};
  nuevaexp.correo= correo;
  nuevaexp.contraseña= contraseña;

  //crear la query hacia la tabla usuario
  let formdata1 = new FormData();
  formdata1.append("email",nuevaexp.correo);
  formdata1.append("pass",nuevaexp.contraseña);

  createPersona(formData).then(resposne =>{
    createUser(formData2).then(resposne =>{
      createQuery(formdata1).then(response =>{
        idusuariox = response.idusuario;
        nuevaExperiencia.idusuariox = idusuariox;
        xpAjax.append("idusuario",nuevaExperiencia.idusuariox);
        xpAjax.append("rut", nuevaExperiencia.rut);
        createExperencia(xpAjax).then(response =>{
         location.reload();
        })
      })
    })
  })
}

/**
 * Se le entrega un formulario para que axios le entregue los datos a php para la consulta sql
 */
createPersona = async(formData) => {
  const response = await axios.post("api/persona/createPersona.php", formData);
  return await response.data;
}
/**
 * Se le entrega un formulario para que axios le entregue los datos a php para la consulta sql
 */
createUser = async (formData2) => {
  const response = await axios.post("api/usuario/createUsuario.php", formData2);
  return await response.data;
  
}
/**
 * Se le entrega un formulario para que axios le entregue los datos a php para la consulta sql
 */
createQuery = async (formdata1) =>{
  const response = await axios.post("api/usuario/queryUsuario.php",formdata1);
  return await response.data;
}
createExperencia = async(xpAjax) =>{
  const response = await axios.post("api/experiencia/createExperencia.php", xpAjax);
  return await response.data;
}


/**
 * Valida que los campos ingresados en el método IniciarRegistro() no sean vacios, en caso que sean
 * vacios este lanza un error
 */
function verificarCampos(){

    //PERSONA
    let nombre = document.querySelector("#nombrePersona").value;
    let apellidoM = document.querySelector("#apellidoMPersona").value;
    let apellidoP = document.querySelector("#apellidoPPersona").value;
    let rut = document.querySelector("#rutPersona").value;
    let tarjeta = document.querySelector("#tarjetaPersona").value;
    let edad = document.querySelector("#edadPersona").value;
  
    //USUARIO
    let correo = document.querySelector("#correoPersona").value;
    let contraseña = document.querySelector("#contraseñaPersona").value;
    let contraseña2 =document.querySelector("#contraseña2").value;
    let tipoUsuario = "usuario";

  if 
  (
    !correo == "" &&
    !contraseña == "" &&
    !contraseña2 == "" &&
    !rut == ""
    && !nombre == "" 
    && !apellidoM == "" 
    && !apellidoP == "" 
    && !rut == "" 
    && !tarjeta == "" 
    && !edad==""
    &&contraseña.length >= 8 
    && contraseña2.length >= 8
    &&(contraseña == contraseña2)
  
  ) {
    return true; 
  }else{
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
    if (correo == "") {
      $("#invalido1").removeClass("d-none");
  }
  if (contraseña == "") {
      $("#invalido2").removeClass("d-none");
  }
  if (contraseña2 == "") {
      $("#invalido3").removeClass("d-none");
  }
  if(contraseña.length <= 7 ){
    $("#invalido2").removeClass("d-none");
    $("#invalido2").text("La contraseña tiene que ser de largo 8 o superior");
  }
  if (contraseña2.length <= 7) { 
    $("#invalido3").removeClass("d-none");
    $("#invalido3").text("La contraseña tiene que ser de largo 8 o superior");
  }
  if(contraseña == contraseña2){
    alert("No ha ingresado correctamente las contraseña");
  }
  return false;
  }
}
