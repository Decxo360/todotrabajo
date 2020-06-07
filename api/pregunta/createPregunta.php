<?php
  require_once "../bd.php";
  $pregunta = $_POST["pregunta"]; // arreglos asociativo
  $idpublicacion = $_POST["idpublicacion"];
  $sql = "INSERT INTO opiniones(pregunta,idpublicacion)"
        ." VALUES(?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("si",$pregunta,$idpublicacion);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
