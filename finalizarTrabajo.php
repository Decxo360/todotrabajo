<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/valoracion.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <main>

      <div class="row" style="margin-left: 0px; margin-right: 0px;">
        <div class="col-lg-6 col-md-6 col-sm-12 mx-auto" 
        style=
        "background: rgb(0,0,0);
        background: linear-gradient(90deg, rgba(0,0,0,0.08167016806722693) 4%, rgba(64,19,210,1) 51%, rgba(11,16,148,1) 97%);">
          <img src="img/logo.png" alt="" style="height:600px; width:600px;">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 mx-auto mt-10" style="height: 667px;">
        <div class="row">
        <div class="col-lg-3">
        <select class="form-control" name="" id="dropdownList">
        <option value="">Ninguno</option>
        <option value="">Empleador</option>
        <option value="">Trabajador</option>
        </select>
        </div>
        <div class="col-lg-3">
        <select class="form-control" name="" id="dropdownTrabajos">
        <option value="">Ninguno</option>
        </select>
        </div>
        </div>
          <h1 style="margin-top: 5%; text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" >¡Finaliza el trabajo ya!</h1>
          <hr>
            <input type="image" src="img/down.png" style="width: 20px; height: 20px; margin-left: 90%; margin-top: 5%;" data-toggle="collapse" data-target="#demo2" style="position: absolute; float: none;" >
            <div id="demo2" class="collapse" >
              <div id="creados"> 
              
              </div>
              <div id="postulados">
              </div>
            </div>
            <hr>
            <form action="" style="margin-top: 15%;">

            <div class="form-group">
                <label for="codigo1">Ingrese el codigo de su empleador</label>
                <input type="text"class="form-control" id="codigo1">
              </div>  
              <div class="form-group">
                <label for="codigo2">Ingrese el codigo del trabajador</label>
                <input type="text"class="form-control" id="codigo2">
              </div>
              <div class="form-group d-none"id="empleador">
                <label for=""> Ingrese la clasificacion del empleador </label>
                <p class="clasificacion" style="text-align: center; font-size: xx-large;">
                  <input id="radio1" type="radio" name="estrellas" value="5">
                  <label for="radio1">★</label>
                  <input id="radio2" type="radio" name="estrellas" value="4">
                  <label for="radio2">★</label>
                  <input id="radio3" type="radio" name="estrellas" value="3">
                  <label for="radio3">★</label>
                  <input id="radio4" type="radio" name="estrellas" value="2">
                  <label for="radio4">★</label>
                  <input id="radio5" type="radio" name="estrellas" value="1">
                  <label for="radio5">★</label>
                </p>
              </div>
              <div class="form-group d-none" id="trabajador">
                <label for=""> Ingrese la clasificacion del Trabajador </label>
                <p class="clasificacion" style="text-align: center; font-size: xx-large;">
                  <input id="radio1" type="radio" name="estrellas" value="5">
                  <label for="radio1">★</label>
                  <input id="radio2" type="radio" name="estrellas" value="4">
                  <label for="radio2">★</label>
                  <input id="radio3" type="radio" name="estrellas" value="3">
                  <label for="radio3">★</label>
                  <input id="radio4" type="radio" name="estrellas" value="2">
                  <label for="radio4">★</label>
                  <input id="radio5" type="radio" name="estrellas" value="1">
                  <label for="radio5">★</label>
                </p>
              </div>
            </form>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" type="submit"> Terminar </button>
            </div>
            <h1 style="text-align: center;  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">¡Gracias por preferirnos!</h1>
        </div>
      </div>
      </main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/finalizar.js"></script>
</body>
</html>