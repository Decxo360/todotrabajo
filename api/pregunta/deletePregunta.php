<?php
  require_once "../bd.php";
  $idpregunta = $_POST["idpregunta"];
  $sql = "DELETE FROM pregunta WHERE id=?";
  $conectar = conectar();
  $respuesta = new stdClass();
  if($conectar){
    $st = $conectar->prepare($sql);
    $st->bind_param("i",$idPregunta);
    $st->execute();
    $st->close();
    $respuesta->resultado = true;
  } else {
    $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
