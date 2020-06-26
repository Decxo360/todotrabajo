<button type="button" class="btn btn-ligh btn2 button" data-toggle="modal" data-target="#NewPublication" id="publicacion">
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
                  <label class="text-dark" for="Ititulo">Ingrese el oficio (*):</label>
                  <input class="form-control" type="text" name="Ititulo" value="" id="Ititulo">
                  <small id="passwordHelpBlock" class="form-text text-muted">
                    Usted debe ingresar que tipo de oficio necesita ej: jardinero
                  </small>
                </div>
              <div class="form-group">
                <label class="text-dark" for="IaPagar"> Ingrese el monto que va a pagar (*) </label>
                <input class="form-control" type="number" name="IaPagar" value="" id="IaPagar">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Monto a pagar ej:100.000
                </small>
              </div>
              <div class="form-group">
                <label class="text-dark" for="Idescripcion">Descripción del trabajo (*)</label>
                <textarea class="form-control" type="text" name="Idescripcion" value="" id="Idescripcion"></textarea>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  De que va a tratar el trabajo
                </small>
              </div>     
              <div class="form-group">
                <label class="text-dark" for="Ipregunta">Cree una pregunta para el postulante (*)</label>
                <input class="form-control" type="text" name="Ipregunta" value="" id="Ipregunta">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Ingrese lo que necesita saber de la persona que escogera. Ej: ¿Cuantos años lleva en el rubro?
                </small>
              </div> 
              <div class="form-group">
                <input type="checkbox" class="form-check-input" id="ItipoPublicacion">
                <label class="form-check-label text-dark" for="ItipoPublicacion">formal</label>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Ingrese si es de carácter formal o informal
                </small>
              </div>
              <div class="form-group">
                <input type="checkbox" class="form-check-input" id="ItipoPublicacion2">
                <label class="form-check-label text-dark" for="ItipoPublicacion2">informal</label>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Ingrese si es de carácter formal o informal
                </small>
              </div>                 
            </form>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <div class="form-group">
                <label class="text-dark is-invalid" for="Idireccion">Ingrese la direccion del trabajo (*):</label>
                <input class="form-control" type="email" name="Idireccion" value="" id="Idireccion">
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
                  <option>Selecciona una comuna</option>
                  <option >Valparaiso</option>
                  <option >Viña</option>
                  <option >Quilpue</option>
                  <option >Villa Alemana</option>
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
