<?php
  require_once "../bd.php";
  $idRespuesta = $_POST["idRespuesta"];
  $sql = "DELETE FROM respuesta WHERE id=?";
  $conectar = conectar();
  $respuesta = new stdClass();
  if($conectar){
    $st = $conectar->prepare($sql);
    $st->bind_param("i",$idRespuesta);
    $st->execute();
    $st->close();
    $respuesta->resultado = true;
  } else {
    $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
