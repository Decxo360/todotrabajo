<?php session_start(); ?>
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
    <link rel="stylesheet" href="css/miperfil.css">
    <link rel="stylesheet" href="css/preguntasFrecuentes.css">
    
    
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light text-white"
      style="background-color: #001a33; padding: 20px; margin-top:0px ;">
      <a class="navbar-brand text-white" href="index.php">TodoTrabajo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <a class="nav-link text-white" href=" #"data-toggle="modal" 
              data-target="#preguntasFrecuentes" style="color: black;"> 
              Preguntas Frecuentes <span class="sr-only">(current)</span>
            </a>
      <div class="modal" tabindex="-1" role="dialog" id="preguntasFrecuentes">
              <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                  <div class="modal-header modalCabeza">
                    <h5 class="modal-title"> ¡Preguntas frecuentes! </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5 Marco centrado shadow p-3 mb-5  rounded">
                            <img class="cuadrado" src="img/global.png" alt="">
                            <h6 class="h6"><img class="chiquito" src="img/clip.png" alt="">   
                                 Como hago muchas cosas de mi vida</h6>
                                 <h6 class="h6 letra">Nose, pero algo saldrá por el camino brro</h6>
                           
                        </div>
                        <div class="col-lg-5 Marco subido shadow p-3 mb-5  rounded">
                            <img class="cuadrado" src="img/cv.png" alt="">
                            <h6 class="h6" ><img class="chiquito" src="img/clip.png" alt="">    
                                Como hago muchas cosas de mi vida</h6>
                                <h6 class="letra h6">Nose, pero algo saldrá por el camino brro</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 Marco centrado shadow p-3 mb-5 rounded">
                            <img class="cuadrado"  src="img/workk.png" alt="">
                            <h6 class="h6" ><img class="chiquito" src="img/clip.png" alt="">  
                                Como hago muchas cosas de mi vida</h6>
                            <h6 class="h6 letra">Nose, pero algo saldrá por el camino brro</h6>
                      
                        </div>
                        <div class="col-lg-5 Marco subido shadow p-3 mb-5 rounded">
                            <img class="cuadrado" src="img/user.png" alt="">
                            <h6 class="h6" ><img class="chiquito" src="img/clip.png" alt="">     
                                Como hago muchas cosas de mi vida</h6>
                            <h6 class=" h6 letra">Nose, pero algo saldrá por el camino brro</h6>
                          
                        </div>
                    </div>
                  </div>
                  
                </div>
              </div>
                </div>
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
            echo '<button type="button" class="btn btn-outline-dark text-white" data-toggle="modal" data-target="#staticBackdrop">
            Registrarse
                     </button>';
        }else{
            echo'
     
            <a type="button" class="btn btn-outline-dark text-white" href="miperfil.php" > Mi perfil </a>';
            echo '<a class="btn btn-outline-dark text-white" href="cerrarsesion.php" > Cerrar Sesión </a> ';
        }
        ?>
                <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1"
          role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog ">
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
        
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
          role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
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
                <form action="" method="post">
                  <div class="form-group">
                    <label class="text-dark is-invalid" for="nombrePersona">Ingrese su Nombre:</label>
                    <input class="form-control" type="text" name="nombrePersona" value="" id="nombrePersona" required>
                    <div class="invalid-feedback d-none" id="invalido9">
                      Ingrese este campo
                    </div>
                  </div>
                  <div class="form-group">s
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