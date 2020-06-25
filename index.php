<?php
require_once "templates/header.php";
 ?>
    <main class="container-fluid " style="padding-left: 0px; padding-right: 0px;">
        <div>
            <img src="img/efectoParallax.jpg" alt="">
            <div class="medio mx-auto">
                <?php  
            if(!isset($_SESSION["usuario"])){
  
            }else{
              require_once "crearPublicacion.php";
            }
            ?>
                <button class="btn btn-ligh button " style="background: #fff;" > <a href="trabajoFromal.php" style="color: black;">Trabajos Formal</a> </button>
                 <button class="btn btn-ligh button " style="background: #fff;"> <a href="trabajoInformal.php" style="color: black;">Trabajos informales</a></button>
            </div>
        </div>
        <div class="relleno">
            <h4>Destacado del mes</h4>
        </div>
        <div class="row" style="width: 1350px;">
        <div class="flexbox">
            <div class="img">
                <img src="img/user.png" alt="" class="redondo">
            </div>
            <div class="nombre">
                <h6>Diego Ignacio Ludnstedt Muñoz</h6>
            </div>
            <div class="puntuacion">

            </div>
        </div>
        <div class="flexbox">
            <div class="img">
                <img src="img/user.png" alt="" class="redondo">
            </div>
            <div class="nombre">
                <h6>Diego Ignacio Ludnstedt Muñoz</h6>
            </div>
            <div class="puntuacion">

            </div>
        </div>
        <div class="flexbox">
            <div class="img">
                <img src="img/user.png" alt="" class="redondo">
            </div>
            <div class="nombre">
                <h6>Diego Ignacio Ludnstedt Muñoz</h6>
            </div>
            <div class="puntuacion">

            </div>
        </div>
        
    </main>
    
    
<?php
require_once "templates/footer.php";
?>
<script src="js/registrar.js"></script>
<script src="js/login.js"></script>
<script src="js/index.js"></script>