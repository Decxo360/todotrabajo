<?php
  require_once "../bd.php";
  $idpublicacion = $_POST["idpublicacion"];
  $sql = "DELETE FROM publicacion WHERE id=?";
  $conectar = conectar();
  $respuesta = new stdClass();
  if($conectar){
    $st = $conectar->prepare($sql);
    $st->bind_param("i",$idPublicacion);
    $st->execute();
    $st->close();
    $respuesta->resultado = true;
  } else {
    $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
