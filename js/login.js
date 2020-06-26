/**
 * Inicializa los dos métodos definidos posterior mente
 */
document.querySelector("#btnLoggear").addEventListener("click", function(){

    let correo = document.querySelector("#correoPersona1").value;
    let pass = document.querySelector("#passPersona").value;
    console.log("'"+correo+"'");

    if(iniciarValidacion()){
        crearConsulta();
    }else{
        
    }

});

/**
 * Valida que la contraseña y el correo no sean vacios
 */
function iniciarValidacion(){
    
    let correo = document.querySelector("#correoPersona1").value;
    let pass = document.querySelector("#passPersona").value;

    if (!correo=="" && !pass=="") {
        return true;
    }else{

        if (correo=="") {
            $("#invalidaSesion2").removeClass("d-none");
            $("#invalidaSesion2").text("Es necesario el correo, por favor ingreselo")
        }
        if (pass=="") {
            $("#invalidaSesion").removeClass("d-none");
            $("#invalidaSesion").text("Es necesario ingresar la contraseña");    
        }

        return false;
    }
}

/**
 * Obtiene el correo ingresado por el usuario y la contraseña válida que existan en la bd con axios
 *este retorna la session iniciada
 */
function crearConsulta(){

    let correo = document.querySelector("#correoPersona1").value;
    let pass = document.querySelector("#passPersona").value;

        //Obtener usuario
        let obtenerUsuario = {};
        obtenerUsuario.correo = correo;
        obtenerUsuario.pass = pass;

        //pasarle el formulario al php
        let formData = new FormData();
        formData.append("email",obtenerUsuario.correo);
        formData.append("pass",obtenerUsuario.pass);

        createQuery(formData).then(response =>{
            if (!response == "ERROR no se encontro al usuario") {
                
                return true;
            }else{
                if(response == "ERROR no se encontro al usuario" ){
                    alert("El usuario no existe, o a ocurrido un error en el sitio");
                }
                location.reload();
                return false;    
            }
            console.log(response);
            
        })

}

/**
 * Obtiene la pass y el correo, se lo pasa a la consulta en queryUsuario.php y retorna la sessions
 */

createQuery = async(formData) => {
 const response = await axios.post("api/usuario/queryUsuario.php", formData);
 return await response.data;
}