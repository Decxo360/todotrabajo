<?php
 require_once "templates/header.php";
 ?>
 <link rel="stylesheet" href="css/trabajoFormal.css">
  <main class="container-fluid" style="padding-left: 0px; padding-right: 0px;">

    <link rel="stylesheet" href="css/search.css">
    <div class="flexsearch">
      <div class="flexsearch--wrapper">
        <form class="flexsearch--form" action="#" method="post">
          <div class="flexsearch--input-wrapper">
            <input class="flexsearch--input" type="search" placeholder="search">
          </div>
          <input class="flexsearch--submit" type="submit" value="&#10140;" />
        </form>
      </div>
    </div>

    <div class="row" style="width: 1363px;">
      <div class="col-lg-5 col-md-6 col-sm-12 cajaScroll">
        <div class="flex-container1">
          <div class="imagen">
            <img class="cuadrada" src="img/user.png" alt="">
          </div>
          <div class="cuerpa">
            <br>
            <h4 class="titulo">Titulo</h4>
            <hr class="hrgordo">
            <h4 class="trabajo">Trabajo</h4>
            <h6 class="empresa">-persona</h6>
            <h6 class="fecha">fecha</h6>
          </div>
        </div>
        <div class="flex-container1">
          <div class="imagen">
            <img class="cuadrada" src="img/user.png" alt="">
          </div>

          <div class="cuerpa">
            <br>
            <h4 class="titulo">Titulo</h4>
            <hr class="hrgordo">
            <h4 class="trabajo">Trabajo</h4>
            <h6 class="empresa">-persona</h6>
            <h6 class="fecha">fecha</h6>
          </div>
        </div>
        <div class="flex-container1">
          <div class="imagen">
            <img class="cuadrada" src="img/user.png" alt="">
          </div>
          <div class="cuerpa">
            <br>
            <h4 class="titulo">Titulo </h4>
            <hr class="hrgordo">
            <h5 class="trabajo">Trabajo</h5>
            <h6 class="empresa">-persona</h6>
            <h6 class="fecha">fecha</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-6 col-sm-12 descripcion">
        <div class="cabeceraDescripcion">
          <br>
          <h1>Aquí va el título de la página</h1>
          <br>
        </div>
        <div>
          <div class="postular">
            <h6>Empresa/Persona</h6>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Postular Ahora
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel " style="text-align: center;">¡Postula!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Postular</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <div style="color: black;" class="descripciontrabajo">
          <h5>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur voluptates amet illum accusamus
            tempora vel incidunt quod, in repudiandae dolores atque vitae accusantium facilis enim quia quam corrupti
            inventore ratione.
          </h5>

        </div>

      </div>
    </div>
    </div>
  </main>
<?php 
require_once "templates/footer.php"
?>