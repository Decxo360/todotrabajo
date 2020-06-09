document.querySelector("#btnLoggear").addEventListener("click", function(){

    let correo = document.querySelector("#correoPersona1").value;
    let pass = document.querySelector("#passPersona").value;
    console.log("'"+correo+"'");

    if(!correo=="" && !pass==""){

        let obtenerUsuario = {};
        obtenerUsuario.correo = correo;
        obtenerUsuario.pass = pass;

        let formData = new FormData();
        formData.append("email",obtenerUsuario.correo);
        formData.append("password",obtenerUsuario.pass);

        axios.post("api/usuario/queryUsuario.php", formData)
        .then(response => {
            console.log("exitoso")
            console.log(response);
        })
        .catch(error => {
            console.log("fallamos")
            console.log(error)
        });

    }else{
        if (correo=="") {
            $("#invalidaSesion2").removeClass("d-none");
            $("#invalidaSesion2").text("Es necesario el correo, por favor ingreselo")
        }
        if (pass=="") {
            $("#invalidaSesion").removeClass("d-none");
            $("#invalidaSesion").text("Es necesario ingresar la contraseña");    
        }
    }

});