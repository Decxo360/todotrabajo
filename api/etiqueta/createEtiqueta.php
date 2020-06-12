<?php
  require_once "../bd.php";
  $tipo = $_POST["tipo"];
  $sql = "INSERT INTO etiqueta(tipo)"
        ." VALUES(?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("s",$tipo);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
