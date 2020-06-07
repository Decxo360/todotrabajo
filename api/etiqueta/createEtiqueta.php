<?php
  require_once "../bd.php";
  $nombre = $_POST["nombre"]; // arreglos asociativo
  $tipo = $_POST["tipo"];
  $idpublicacion = $_POST["idpublicacion"];
  $sql = "INSERT INTO opiniones(nombre,tipo,idpublicacion)"
        ." VALUES(?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("ssi",$nombre,$tipo,$idpublicacion);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
