<?php
 require_once "templates/header.php";
 ?>
 <link rel="stylesheet" href="css/trabajoFormal.css">
  <main class="container-fluid" style="padding-left: 0px; padding-right: 0px;">

    <link rel="stylesheet" href="css/search.css">
            

   

      <div class="">
      <div class="search">
        <input type="text" class="searchTerm" placeholder="¿Que estas buscando?" id="filtro">
        <button type="submit" class="searchButton" id="filtrar"> Buscar
          <i class="fa fa-search"></i>
       </button>
      </div>
      </div>


      <div class="col-lg-12" id="mispublicaciones"> 
      
            <?php 
            if(!isset($_SESSION["usuario"]))
            {

            }else{
            require_once "crearPublicacion.php";
            } ?> 
            <div id="cuerpo">
            </div>
      
            <h1 style="text-align: center; margin-top: 30px; margin-bottom: 30px;">Trabajos Informales ingresados en nuestra plataforma</h1>
           </div>
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
                 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
             <div class="modal-content">
             <h1 style="text-align: center;">Responda las preguntas</h1>
              <div class="modal-body" id="modalbdy1">
              </div>
             </div>
            </div>
        </div>

  </main>
<?php 
require_once "templates/footer.php"
?>
<script src="js/trabajoInformal.js" ></script>
<script src="js/index.js"></script>