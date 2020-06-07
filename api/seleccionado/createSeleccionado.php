<?php
  require_once "../bd.php";
  $idpublicacion = $_POST["idpublicacion"]; // arreglos asociativo
  $idpostulante = $_POST["idpostulante"];
  $esEnviado = $_POST["esEnviado"];
  $numEnviado = $_POST["numEnviado"];
  $sql = "INSERT INTO opiniones(idpublicacion,idpostulante,esEnviado,numEnviado)"
        ." VALUES(?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("iisi",$idpublicacion,$idpostulante,$esEnviado,$numEnviado);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
