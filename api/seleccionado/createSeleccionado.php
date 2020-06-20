<?php
  require_once "../bd.php";
  $esEnviado = $_POST["esEnviado"];
  $numEnviado = $_POST["numEnviado"];
  $idpublicacion = $_POST["idpublicacion"]; // arreglos asociativo
  $idpostulante = $_POST["idpostulante"];
  $idusuario = $_POST["idusuario"];
  $rut = $_POST["rut"];
  $sql = "INSERT INTO seleccionado( esEnviado,numEnviado,idpostulante,idpublicacion,idusuario,rut)"
        ." VALUES(?,?,?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("ssiiis",$esEnviado,$numEnviado,$idpostulante,$idpublicacion,$idusuario,$rut);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
