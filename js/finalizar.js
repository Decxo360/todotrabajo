/**
 * Este listener obtiene datos de la sesion, con estos datos obtiene los titulos de los trabajos y el codigo respectivo
 * si es un empleador o un trabajador
 */


document.querySelector("#dropdownList").addEventListener("click", function () {
  let lista = document.getElementById("dropdownList").value;
  let cuerpo = document.getElementById("dropdownTrabajos");
  let cuerpo2 = document.getElementById("creados");
  let div = document.createElement("div");
  let h6T = document.createElement("h6");
  let h6C = document.createElement("h6");
  let h6 = document.createElement("h6");
  div.classList.add("shadow-lg", "p3", "bg-white", "rounded");
  h6.style.textAlign = "center";

  if (lista == "Empleador") {
    consultarEmpleador().then((response) => {
      for (let i = 0; i < response.length; i++) {
        $(cuerpo).empty();

        $(cuerpo2).empty();

        h6.innerText = "Su codigo es: " + response[0].codigo;
        div.setAttribute("id", response[0].idrol);
        div.appendChild(h6);
        cuerpo2.appendChild(div);

        let publicacionajax = new FormData();
        publicacionajax.append("idpublicacion", response[0].idpublicacion);
        consultarPublicacion(publicacionajax).then((response) => {
          console.log(response);
          let option = document.createElement("option");
          option.innerText = response[0].titulo;
          console.log((option.innerText = response[0].titulo));
          cuerpo.appendChild(option);
        });
      }
      $("#empleadores").addClass("d-none");
      $("#trabajadores").removeClass("d-none");
    });
  } else {
    if (lista == "Trabajador") {
      $("#trabajadores").addClass("d-none");
      $("#empleadores").removeClass("d-none");
      consultarTrabajador().then((response) => {
        for (let i = 0; i < response.length; i++) {
          $(cuerpo).empty();
          $(cuerpo2).empty();
          h6.innerText = "Su codigo es: " + response[0].codigo;
          div.setAttribute("id", response[0].idrol);
          div.appendChild(h6);
          cuerpo2.appendChild(div);

          let publicacionajax = new FormData();
          publicacionajax.append("idpublicacion", response[0].idpublicacion);
          consultarPublicacion(publicacionajax).then((response) => {
            let option = document.createElement("option");
            option.innerText = response[0].titulo;
            cuerpo.appendChild(option);
          });
        }
      });
    }
  }
});


/**
 * Este listener obtiene 3 parametros los cuales son el codigo del empleador, codigo del empleado y la valoracion
 * en caso de codigo1 o codigo2 mencionados anterior mente no sean iguales a la de la base de datos retorna un error
 * si esto esta igual te enviará a index.php
 */
document
  .querySelector("#finalizarTrabajo")
  .addEventListener("click", function () {
    let lista = document.getElementById("dropdownList").value;
    let codigo1 = document.getElementById("codigo1").value;
    let codigo2 = document.getElementById("codigo2").value;

    let estrella1 = document.getElementById("radio11").value;
    let estrella2 = document.getElementById("radio22").value;
    let estrella3 = document.getElementById("radio33").value;
    let estrella4 = document.getElementById("radio44").value;
    let estrella5 = document.getElementById("radio55").value;

    let estrella11 = document.getElementById("radio1").value;
    let estrella22 = document.getElementById("radio2").value;
    let estrella33 = document.getElementById("radio3").value;
    let estrella44 = document.getElementById("radio4").value;
    let estrella55 = document.getElementById("radio5").value;

    let estrella111 = document.getElementById("radio1").checked;
    let estrella222 = document.getElementById("radio2").checked;
    let estrella333 = document.getElementById("radio3").checked;
    let estrella444 = document.getElementById("radio4").checked;
    let estrella555 = document.getElementById("radio5").checked;

    let xp;
    console.log(estrella11);
    console.log(estrella22);
    console.log(estrella33);
    console.log(estrella44);
    console.log(estrella55);

    console.log(estrella111);

    let codigo = {};
    let experiencia = {};

    if (lista == "Empleador") {
      if ((estrella111 = true)) {
        experiencia.xp = estrella11;
      }
      if ((estrella222 = true)) {
        experiencia.xp = estrella22;
      }
      if ((estrella333 = true)) {
        experiencia.xp = estrella33;
      }
      if ((estrella444 = true)) {
        experiencia.xp = estrella44;
        console.log(experiencia.estrella44);
      }
      if ((estrella555 = true)) {
        experiencia.xp = estrella55;
      }
      codigo.codigo1 = codigo1;
      codigo.codigo2 = codigo2;

      let CodigoAJAX = new FormData();
      CodigoAJAX.append("codigo", codigo.codigo2);

      queryCodigo(CodigoAJAX).then((response) => {
        if (!codigo2 == response[0].codigo) {
          alert("ha ocurrido un error con los codigos intente de nuevo");
          location.reload();
        } else {
          console.log("son iguales");
        }
      });

      CodigoAJAX.append("codigo", codigo.codigo1);

      queryCodigo(CodigoAJAX).then((response) => {
        if (!codigo1 == response[0].codigo) {
          alert("ha ocurrido un error con los codigos intente de nuevo");
          location.reload();
        }
        let experienciaAJAX = new FormData();
        experienciaAJAX.append("xp", experiencia.xp);
        experienciaAJAX.append("idusuario", response[0].idusuario);

        updateExperiencia(experienciaAJAX).then((response) => {
          console.log(response);
          alert("Ha finalizado este trabajo, gracias");
          window.location.href = "index.php";
        });
      });
    }
    if (lista == "Trabajador") {
      if ((estrella1.checked = true)) {
        experiencia.xp = estrella1;
      }
      if ((estrella2.checked = true)) {
        experiencia.xp = estrella2;
      }
      if ((estrella3.checked = true)) {
        experiencia.xp = estrella3;
      }
      if ((estrella4.checked = true)) {
        experiencia.xp = estrella4;
      }
      if ((estrella5.checked = true)) {
        experiencia.xp = estrella5;
      }

      codigo.codigo1 = codigo1;
      codigo.codigo2 = codigo2;
      let CodigoAJAX = new FormData();

      odigoAJAX.append("codigo", codigo.codigo1);

      queryCodigo(CodigoAJAX).then((response) => {
        if (!codigo1 == response[0].codigo) {
          alert("ha ocurrido un error con los codigos intente de nuevo");
          location.reload();
        }
      });

      CodigoAJAX.append("codigo", codigo.codigo2);
      queryCodigo(CodigoAJAX).then((response) => {
        if (!codigo2 == response[0].codigo) {
          alert("ha ocurrido un error con los codigos intente de nuevo");
          location.reload();
        } else {
          let experienciaAJAX = new FormData();
          experienciaAJAX.append("xp", experiencia.xp);
          experienciaAJAX.append("idusuario", response[0].idusuario);

          updateExperiencia(experienciaAJAX).then((response) => {
            console.log(response);
            alert("Ha finalizado este trabajo, gracias");
            window.location.href = "index.php";
          });
        }
      });
    }
  });
/**
 * Funcion que retorna valores de la tabla roles
 */
consultarEmpleador = async () => {
  const response = await axios.get("api/roles/queryEmpleador.php");
  return await response.data;
};
/**
 * Funcion que retorna valores de la tabla roles
 */
consultarTrabajador = async () => {
  const response = await axios.get("api/roles/queryTrabajador.php");
  return await response.data;
};
/**
 * Obtiene el codigo ingresado por el usuario
 * Funcion que retorna el codigo consultado de la tabla roles
 */
queryCodigo = async (CodigoAJAX) => {
  const response = await axios.post(
    "api/roles/queryCodigo1Roles.php",
    CodigoAJAX
  );
  return await response.data;
};
/**
 * obtiene la id d ela publicacion
 * retorna todos los valores relacionados a la id obtenida
 */
consultarPublicacion = async (publicacionajax) => {
  const response = await axios.post(
    "api/publicacion/consultaId.php",
    publicacionajax
  );
  return await response.data;
};
/**
 * obtiene la valoracion ingresada y el id del usuario al que se le ingreso la valoracion
 * retorna un texto para saber si fue ingresado con exito
 */
updateExperiencia = async (experienciaAJAX) => {
  const response = await axios.post(
    "api/experiencia/updateExperienciaXP.php",
    experienciaAJAX
  );
  return response.data;
};
