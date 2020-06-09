<?php
  require_once "../bd.php";
  $idpostulante = $_POST["idPostulante"];
  $sql = "DELETE FROM postulante WHERE id=?";
  $conectar = conectar();
  $respuesta = new stdClass();
  if($conectar){
    $st = $conectar->prepare($sql);
    $st->bind_param("i",$idPostulante);
    $st->execute();
    $st->close();
    $respuesta->resultado = true;
  } else {
    $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
