<button type="button" class="btn btn-ligh btn2" data-toggle="modal" data-target="#NewPublication">
  Nueva publicacion
</button>

<!-- Modal -->
<div class="modal fade" id="NewPublication" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header modalCabeza">
        <h5 class="modal-title" id="exampleModalLabel">¡Crea una nueva oportunidad de trabajo!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body cuerpo">
        <div class="row">
          <div class="col-lg-6">
            <form action="" method="post">
              <div class="form-group">
                <label class="text-dark" for="Ietiqueta">Ingrese la etiqueta del trabajo (*):</label>
                <input class="form-control" type="text" name="Ietiqueta" value="" id="Ietiqueta">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Esta etiqueta hará mas fácil la busqueda de este trabajo
                </small>
              </div>
              <div class="form-group">
                <label class="text-dark" for="IaPagar"> Ingrese el monto que va a pagar (*) </label>
                <input class="form-control" type="text" name="IaPagar" value="" id="IaPagar">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Monto a pagar
                </small>
              </div>
              <div class="form-group">
                <label class="text-dark" for="Idescripcion">Descripción del trabajo (*)</label>
                <textarea class="form-control" type="text" name="Idescripcion" value="" id="Idescripcion"></textarea>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  De que va a tratar el trabajo
                </small>
              </div>              
            </form>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <div class="form-group">
                <label class="text-dark is-invalid" for="Idireccion">Ingrese la direccion del trabajo (*):</label>
                <input class="form-control" type="email" name="Idireccion" value="Idireccion" id="Idireccion">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Dirección COMPLETA
                </small>
              </div>
              <div class="form-group">
                <label class="text-dark" for="Num">Numero de la calle que va a realizarse el trabajo(*)</label>
                <input class="form-control" type="text" name="Num" value="" id=NumCalle>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Número de la calle
                </small>
              </div>
              <div class="form-group">
                <label for="Sector">Comunna (*)</label>
                <select id="Sector" class="form-control">
                  <option selected disabled>Selecciona una comuna</option>
                  <option>Valparaiso</option>
                  <option>Viña</option>
                  <option value="">Quilpue</option>
                  <option value="">Villa Alemana</option>
                </select>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Seleccione una comuna 
                </small>
              </div>
              <div class="form-row">
                 <div class="form-group col-md-3">
                  <label for="año">Fecha de</label>
                  <input type="text" class="form-control" id="año" >
                  <small id="passwordHelpBlock" class="form-text text-muted" >
                    Año
                  </small>
                 </div>
                 <div class="form-group col-md-3 ">
                   <label for="mes">ingreso</label>
                  <input type="text" class="form-control" id="mes">
                  <small id="passwordHelpBlock" class="form-text text-muted" >
                    mes
                  </small>
                 </div>
                 <div class="form-group col-md-3">
                   <label for="dia">del trabajo</label>
                  <input type="text"class="form-control" id="dia" >
                  <small id="passwordHelpBlock" class="form-text text-muted" >
                    Día
                  </small>
                 </div>
                 <div class="form-group col-md-3 ">
                  <label for="hora">(*)</label>
                 <input type="text"class="form-control" id="hora" >
                 <small id="passwordHelpBlock" class="form-text text-muted" >
                  Hora
                </small>
                </div>

              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                 <label for="año2">Fecha de</label>
                 <input type="text" class="form-control"id="año2" >
                 <small id="passwordHelpBlock" class="form-text text-muted">
                  Año
                </small>
                </div>
                <div class="form-group col-md-3 ">
                  <label for="mes2">Final</label>
                 <input type="text" class="form-control" id="mes2">
                 <small id="passwordHelpBlock" class="form-text text-muted">
                  Mes
                </small>
                </div>
                <div class="form-group col-md-3">
                  <label for="dia2">de la publicacion</label>
                 <input type="text"class="form-control" id="dia2" >
                 <small id="passwordHelpBlock" class="form-text text-muted">
                  Día
                </small>
                </div>
                <div class="form-group col-md-3 ">
                 <label for="hora2">(*)</label>
                <input type="text"class="form-control" id="hora2" >
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Hora
                </small>
               </div>

             </div>
            </form>
          </div>
        </div>
    </div>
      <div class="modal-footer cuerpo">
        <button type="button" class="btn btn-primary" id="crear">Crear</button>
      </div>
    </div>
  </div>
</div>

<?php

//require_once "../bd.php";
//$descripcion = $_POST["descripcion"]; // arreglos asociativo
//$aPagar = $_POST["aPagar"];
//$ubicacion = $_POST["ubicacion"];
//$fecha = $_POST["fecha"];
//$titulo = $_POST["titulo"];
//$idusuario = $_POST["idusuario"];
//$rut=$_POST["rut"];
//$sql = "INSERT INTO publicacion(descripcion,aPagar,ubicacion,fecha,titulo,idusuario)"
//      ." VALUES(?,?,?,?,?,?,?)";
//$mysqli = conectar();
//$respuesta = new stdClass();
//if($mysqli){
//    $st = $mysqli->prepare($sql);
//    $st->bind_param("sssssis",$descripcion,$aPagar,$ubicacion,$fecha,$titulo,$idusuario,$rut);
//    $st->execute();
//    $st->close();
//    $respuesta->resultado = true;
//    $respuesta->comentario = "Los datos han sido ingresados correctamente";
//} else{
//    $respuesta->resultado = false;
//}
//echo json_encode($respuesta);
?>