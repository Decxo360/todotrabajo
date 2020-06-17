<?php
  require_once "../bd.php";
  $texto = $_POST["respuesta"]; // arreglos asociativo
  $idpregunta = $_POST["idpregunta"];
  echo $texto;
  echo $idpregunta;
  $sql = "INSERT INTO respuesta(texto,idpregunta)"
        ."VALUES( ? , ? )";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("si",$texto,$idpregunta);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
