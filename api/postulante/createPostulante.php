<?php
  require_once "../bd.php";
  $experiencia = $_POST["experiencia"];
  $nombre = $_POST["nombre"]; // arreglos asociativo
  $apellidoM = $_POST["apellidoM"];
  $apellidoP = $_POST["apellidoP"];
  
  
  $sql = "INSERT INTO postulante(experiencia,nombre,apellidoM,apellidoP)"
        ." VALUES(?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("ssss",$experiencia,$nombre,$apellidoM,$apellidoP);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
