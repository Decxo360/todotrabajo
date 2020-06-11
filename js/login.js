document.querySelector("#btnLoggear").addEventListener("click", function(){

    let correo = document.querySelector("#correoPersona1").value;
    let pass = document.querySelector("#passPersona").value;
    console.log("'"+correo+"'");

    if(iniciarValidacion()){
        crearConsulta();
    }else{
        
    }

});
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

createQuery = async(formData) => {
 const response = await axios.post("api/usuario/queryUsuario.php", formData);
 return await response.data;
}