<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//session_start();
//require_once "api/bd.php";
//if (count($_POST)>0){
//  $correo = $_POST["correoPersona"];
//  $clave = $_POST["passPersona"];
//  $sql = "SELECT * FROM usuario WHERE (email='$clave' AND password='$clave')";
//  $bd = conectar();
//  $st = $bd->prepare($sql);
//  $st->bind_param("ss",$correo,$clave);
//  $st->execute();
//  $res = $st->get_result();
//  if ($fila = $res->fetch_row()) {
//    $usuario = new stdClass();
//    $usuario->idusuario=$fila[0];
//    $usuario->email=$fila[1];
//    $usuario->password=$fila[2];
//    $usuario->tipousuario=$fila[3];
//    $usuario->rut=$fila[4];
//    $_SESSION["usuario"] = $usuario;
//    exit();
//  }else {
//    $error = "Datos erroneos O no existe el usuario";
//  }
//}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>TodoTrabajo</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light text-white"
      style="background-color: #001a33; padding: 20px; margin-top:0px ;">
      <a class="navbar-brand text-white" href="#">TodoTrabajo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-white" href=" #"data-toggle="modal" 
              data-target="#preguntasFrecuentes"> 
              Preguntas Frecuentes <span class="sr-only">(current)</span>
            </a>
            <div class="modal" tabindex="-1" role="dialog" id="preguntasFrecuentes">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"> ¡Preguntas frecuentes! </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Modal body text goes here.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
                </div>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white"href=" #">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Ayuda
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
          </li>
          <li class="nav-item">
         
          </li>
        </ul>
      </div>
      <div>
        <?php
        //session_start();
        if(!isset($_SESSION["usuario"])){
          echo '<button type="button" class="btn btn-outline-dark text-white" data-toggle="modal"
          data-target="#staticBackdrop1">
          Iniciar Sesión
        </button>';
        }else{
          echo '<button type="button" class=btn btn-outline-dark text-white"> Cerrar Sesión </button> ';
        }
        ?>
        <!-- Button trigger modal -->
        
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1"
          role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="staticBackdropLabel" style="text-align: center; color: rgb(0, 0, 0);">
                  Ingrese a nuestra plataforma
                </h3>
                <hr><br>

                <h6 style="color: rgb(157, 163, 163); text-align: center;">
                  Inicia sesión y comienza a postular a los trabajos que ya estan disponibles y/o subir trabajos
                </h6><br>
                <div class="btn-group" style="margin-left: 144px;" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-outline-secondary">Personal</button>
                  <button type="button" class="btn btn-outline-secondary">Empresa</button>
                </div>
                <form action="" method="post">
                  <div class="form-group">
                    <label class="text-dark is-invalid" for="correoPersona">Ingrese con su correo eletrónico:</label>
                    <input class="form-control" type="email" name="correoPersona" value="" id="correoPersona1" required>
                    <div class="invalid-feedback d-none" id="invalidaSesion2">
                      Ingrese este campo
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="text-dark is-invalid" for="passPersona">Ingrese su contraseña:</label>
                    <input class="form-control" type="password" name="passPersona" value="" id="passPersona" required>
                    <div class="invalid-feedback d-none" id="invalidaSesion">
                      Ingrese este campo
                    </div>
                  </div>
                  <div class="form-group">
                    <br>
                    <hr>
                    <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" id="btnLoggear"> Iniciar
                      Sesión</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-dark text-white" data-toggle="modal" data-target="#staticBackdrop">
          Registrarse
        </button>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
          role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="staticBackdropLabel" style="text-align: center; color: rgb(0, 0, 0);">
                  Sea parte de nuestra plataforma
                </h3>
                <hr><br>

                <h6 style="color: rgb(157, 163, 163); text-align: center;">
                  Registrate y comienza a postular a los trabajos que ya estan disponibles y/o subir trabajos.
                </h6>
                <hr><br>
                <div class="btn-group" style="margin-left: 144px;" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-outline-secondary">Personal</button>
                  <button type="button" class="btn btn-outline-secondary">Empresa</button>
                </div>
                <form action="" method="post">
                  <div class="form-group">
                    <label class="text-dark is-invalid" for="nombrePersona">Ingrese su Nombre:</label>
                    <input class="form-control" type="text" name="nombrePersona" value="" id="nombrePersona" required>
                    <div class="invalid-feedback d-none" id="invalido9">
                      Ingrese este campo
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="text-dark is-invalid" for="apellidoMPersona">Ingrese con su apellido materno:</label>
                    <input class="form-control" type="text" name="apellidoMPersona" value="" id="apellidoMPersona" required>
                    <div class="invalid-feedback d-none" id="invalido8">
                      Ingrese este campo
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="text-dark is-invalid" for="apellidoPPersona">Ingrese con su apellido paterno:</label>
                    <input class="form-control" type="text" name="apellidoPPersona" value="" id="apellidoPPersona" required>
                    <div class="invalid-feedback d-none" id="invalido7">
                      Ingrese este campo
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="text-dark is-invalid" for="edadPersona">Ingrese con su edad:</label>
                    <input class="form-control" type="text" name="edadPersona" value="" id="edadPersona" required>
                    <div class="invalid-feedback d-none" id="invalido6">
                      Ingrese este campo
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="text-dark is-invalid" for="rutPersona">Ingrese su rut:</label>
                    <input class="form-control" type="text" name="rutPersona" value="" id="rutPersona" required>
                    <div class="invalid-feedback d-none" id="invalido5">
                      Ingrese este campo
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="text-dark is-invalid" for="tarjetaPersona">Tipo de tarjeta bancaria:</label>
                    <select id="tarjetaPersona" class="form-control" name="tarjetaPersona" required>
                      <option selected disabled value="">No tengo</option>
                      <option>Bancco estado</option>
                      <option>Banco bci</option>
                      <option>Banco scotiabank</option>
                    </select>
                    <div class="invalid-feedback d-none" id="invalido4">
                      Ingrese este campo
                    </div>
                    <div class="form-group">
                      <label class="text-dark is-invalid" for="correoPersona">Ingrese con su correo eletrónico:</label>
                      <input class="form-control" type="email" name="correo-txt" value="" id="correoPersona" required>
                      <div class="invalid-feedback d-none" id="invalido1">
                        Ingrese este campo
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="text-dark is-invalid" for="contraseñaPersona">Ingrese su contraseña:</label>
                      <input class="form-control" type="password" name="clave-txt" value="" id="contraseñaPersona" required>
                      <div class="invalid-feedback d-none" id="invalido2">
                        Ingrese este campo
                      </div>
                    </div>
                <div class=" form-group">
                        <label class="text-dark is-invalid" for="contraseña2">Repita su contraseña:</label>
                        <input class="form-control" type="password" name="" value="" id="contraseña2" required>
                        <div class="invalid-feedback d-none" id="invalido3">
                          Ingrese este campo
                        </div> 
                      </div>
                      <div class="form-check">
                        <br>
                        <input class="form-check-input is-invalid" type="checkbox" id="gridCheck1">
                        <label class="form-check-label text-alignment-center text-dark" for="gridCheck1" required>
                          Acepto terminos y condiciones.
                        </label>
                        <div class="invalid-feedback d-none" id="">
                          Necesitas aceptar los terminos y condiciones para avanzar.
                        </div>
                      </div>
                      <div class="form-group">
                        <br>
                        <hr>
                        <button type="button" class="registar btn btn-primary btn-lg btn-block"  name="btnRegistrar" id="btnRegistrar" data-backdrop ="static" data-keyboard="false"> Registrarse
                        </button>
                      </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    </header>



    <main class="container-fluid " style="padding-left: 0px; padding-right: 0px;">
        <div>
            <img src="img/efectoParallax.jpg" alt="">
            <div class="medio mx-auto">
                <button class="btn btn-ligh" style="background: #fff;" > <a href="trabajoFromal.html" style="color: black;">Trabajos informales</a> </button>
                 <button class="btn btn-ligh " style="background: #fff;">Trabajos formales</button>
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
    <link rel="stylesheet" href="css/footer.css">
    <footer >
        <div class="row" style="width: 1350px; background-color: rgb(48, 51, 51);">
            <div class="col-lg-4 col-md-6 col-sm-6" style="color: white;">
                <ul>
                    <li type="circle">Politicas y normas de uso</li>
                    <li type="circle">Publicidad</li>
                    <li type="circle">Relleno</li>
                    <li type="circle">Más relleno</li>
                  </ul>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-6">
                <a class="btn" id="btn" href=""><img src="img/gmail.png" alt="" style="width: 80%; height: 80%;"></a>
                <a class="btn" id="btn" href=""><img src="img/instagram.png" alt="" style="width: 80%; height: 80%;"></a>
                <a class="btn" id="btn" href=""><img src="img/facebook.png" alt="" style="width: 80%; height: 80%;"></a>
                <a class="btn" id="btn" href=""><img src="img/twitter.png" alt="" style="width: 80%; height: 80%;"></a>
            </div>
        </div>
    </footer>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
     integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/registrar.js"></script>
    <script src="js/login.js"></script>





   


    </html>