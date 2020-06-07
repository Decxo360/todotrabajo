<?php
  require_once "../bd.php";
  $idPersona = $_POST["idPersona"];
  $sql = "DELETE FROM persona WHERE id=?";
  $conectar = conectar();
  $respuesta = new stdClass();
  if($conectar){
    $st = $conectar->prepare($sql);
    $st->bind_param("i",$idPersona);
    $st->execute();
    $st->close();
    $respuesta->resultado = true;
  } else {
    $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
