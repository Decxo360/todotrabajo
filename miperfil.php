<?php
require_once "templates/header.php";
require_once "api/bd.php";
            $rut =$_SESSION["usuario"]->rut;
            $sql = "SELECT * FROM experiencia 
            WHERE rut=?";
            $bd = conectar();
            if( $st = $bd->prepare($sql) ){
                 $st->bind_param("s", $rut);
                 $st->execute();
                 $result = $st->get_result();
                $lista = array();
                $entre= false;
                while($fila = $result->fetch_row()){
                    $experiencia = new stdClass();
                    $experiencia->idexperiencia = $fila[0];
                    $experiencia->esRealizado= $fila[1];
                    $experiencia->esPostulado = $fila[2];
                    $experiencia->puntos= $fila[3];
                    $experiencia->esSubido= $fila[4];
                    $experiencia->idusuario = $fila[5];
                    $experiencia->rut = $fila[6];
                    $lista[] = $experiencia;
                    $entre = true;
                }
                $st->close();
            }   
            $sql = "SELECT * FROM persona 
            WHERE(rut=?)";
            $bd = conectar();
            if( $st = $bd->prepare($sql) ){
                $st->bind_param("s", $rut);
                $st->execute();
                $result = $st->get_result();
               $lista = array();
               $entre= false;
               while($fila = $result->fetch_row()){
                $persona = new stdClass();
                $persona->nombre = $fila[0];
                $persona->apellidoM = $fila[1];
                $persona->apellidoP = $fila[2];
                $persona->rut = $fila[3];
                $persona->edad = $fila[4];
                $persona->tarjeta = $fila[5];
                $lista[] = $persona;
                $entre = true;
               }
               $st->close();
           }
           
           echo'
           <div class="contenedor">
           <div style="margin-left: 32px;">
           <img class="redondo1" src="img/putopng.jpg" alt="">
           <div class="row">
               <div class="col-lg-10 dflexCorreo">
                   <h6 class="correo" style="text-align: center; color: black;">',$persona->nombre,' ',$persona->apellidoP,' ',$persona->apellidoM,'</h6>
                   <h6 style="text-align: center; color: black;">',$_SESSION["usuario"]->email,'</h6>
               </div>
           </div>
           <div class="row">
             <div class="col-lg-2 dflexActos">
                 <h6 class="text-align-center">Trabajos realizados</h6>
                 <hr>
                 <h6 class="text-align-center" >',$experiencia->esRealizado,'</h6>
             </div>
             <div class="col-lg-2 dflexActos">
                 <h6 class="text-align-center">Trabajos Postulados</h6>
                 <hr>
                 <h6 class="text-align-center" >',$experiencia->esPostulado,'</h6>
             </div>
             <div class="col-lg-2 dflexActos">
                 <h6 class="text-align-center">Puntos acumulados</h6>
                 <hr>
                 <h6 class="text-align-center" >',$experiencia->puntos,'</h6>
             </div>
             <div class="col-lg-2 dflexActos" >
                 <h6 class="">Trabajos subidos </h6>
                 <hr>
                 <h6 class="">',$experiencia->esSubido,'</h6>
             </div>
           </div>
           
         </div>
       </div>
     </div>
   </div>
           </div>
           </div>
           ';
           ?>

           <div id="mispublicaciones"> 
           
           
           </div>


<?php require_once "templates/footer.php";?>
