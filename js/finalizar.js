document.querySelector("#dropdownList").addEventListener("click", function () {
  let lista = document.getElementById("dropdownList").value;
  let cuerpo = document.getElementById("dropdownTrabajos");
  if (lista == "Empleador") {
    consultarEmpleador().then((response) => {
      console.log(response);
      for (let i = 0; i < response.length; i++) {
        let publicacionajax = new FormData();
        publicacionajax.append("idpublicacion", response[0].idpublicacion);
        consultarPublicacion(publicacionajax).then((response) => {
          console.log(response);
          let option = document.createElement("option");
          option.innerText = response[i].titulo;
          cuerpo.appendChild(option);
        });
      }

      let cuerpo = document.getElementById("creados");
      let div = document.createElement("div");
      let h6T = document.createElement("h6");
      let h6C = document.createElement("h6");
      let h6 = document.createElement("h6");

      div.classList.add("shadow-lg", "p3", "bg-white", "rounded");

      h6.style.textAlign = "center";
    });
  } else {
    if (lista == "Trabajador") {
      consultarTrabajador().then((response) => {
        console.log(response);
        let publicacionajax = new FormData();
        publicacionajax.append("idpublicacion", response[0].idpublicacion);
        consultarPublicacion(publicacionajax).then((response) => {
          console.log(response);
          let option = document.createElement("option");
          option.innerText = response[0].titulo;
          cuerpo.appendChild(option);
        });
        let cuerpo = document.getElementById("postulados");
        let div = document.createElement("div");
        let h6T = document.createElement("h6");
        let h6C = document.createElement("h6");
        let h6 = document.createElement("h6");

        div.classList.add("shadow-lg", "p3", "bg-white", "rounded");

        h6.style.textAlign = "center";
      });
    }
  }
});

function verificarSeleccionado() {
  let cuerpo = document.getElementById("postulados");
  let div = document.createElement("div");
  let h6T = document.createElement("h6");
  let h6C = document.createElement("h6");
  let h6 = document.createElement("h6");

  div.classList.add("shadow-lg", "p3", "bg-white", "rounded");

  h6.style.textAlign = "center";

  consultaPostulante().then((response) => {
    let SeleccionadoAjax = new FormData();
    SeleccionadoAjax.append("idpostulante", response[0].idpostulante);

    consultaSeleccionado(SeleccionadoAjax).then((response) => {
      let PublicacionAjax = new FormData();
      PublicacionAjax.append("idpublicacion", response[0].idpublicacion);
      consultaPublicacion(PublicacionAjax).then((response) => {
        h6T.innerText = "trabajo postulado: " + response[0].titulo;
        h6T.style.textAlign = "center";
        div.appendChild(h6T);
      });
    });
    console.log(h6T);
    let codigo1Ajax = new FormData();
    codigo1Ajax.append("idpostulante", response[0].idpostulante);

    queryCodigoTrabajador(codigo1Ajax).then((response) => {
      for (let i = 0; i < response.length; i++) {
        let finalizado = response[i];

        h6C.innerText =
          " Su código de trabajador es: " + finalizado.codigoTrabajador;
        h6C.style.textAlign = "center";

        div.appendChild(h6C);
        cuerpo.appendChild(div);
      }
    });
  });
}

function verificarEmpleador() {
  let cuerpo = document.getElementById("creados");
  let div = document.createElement("div");
  let h6T = document.createElement("h6");
  let h6C = document.createElement("h6");
  let h6 = document.createElement("h6");

  div.classList.add("shadow-lg", "p3", "bg-white", "rounded");

  h6.style.textAlign = "center";

  consultaEmpleador().then((response) => {
    id = document.getElementById("id").value;
    console.log(id);

    console.log(response);
    for (let i = 0; i < response.length; i++) {
      let publicacion = response[i];
      let PublicacionAjax = new FormData();
      PublicacionAjax.append("idpublicacion", publicacion.idpublicacion);
      consultaPublicacion(PublicacionAjax).then((response) => {
        h6T.innerText = "publicacion creada: " + response[0].titulo;
        h6T.style.textAlign = "center";
        div.appendChild(h6T);
      });
    }
    h6C.innerText = "El codigo de empleador es: " + response[0].codigoEmpleador;
    h6C.style.textAlign = "center";
    div.appendChild(h6C);
    cuerpo.appendChild(div);
  });
}

consultarEmpleador = async () => {
  const response = await axios.get("api/roles/queryEmpleador.php");
  return await response.data;
};

consultarTrabajador = async () => {
  const response = await axios.get("api/roles/queryTrabajador.php");
  return await response.data;
};

consultarPublicacion = async (publicacionajax) => {
  const response = await axios.post(
    "api/publicacion/consultaId.php",
    publicacionajax
  );
  return await response.data;
};

verificarSeleccionado();
verificarEmpleador();
