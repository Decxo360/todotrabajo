<?php
  require_once "../bd.php";
  $respuesta = $_POST["respuesta"]; // arreglos asociativo
  $idpregunta = $_POST["idpregunta"];
  $sql = "INSERT INTO opiniones(respuesta,idpregunta)"
        ." VALUES(?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("si",$respuesta,$idpregunta);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
