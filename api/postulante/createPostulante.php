<?php
  require_once "../bd.php";
  $nombre = $_POST["nombre"]; // arreglos asociativo
  $apellidoM = $_POST["apellidoM"];
  $apellidoP = $_POST["apellidoP"];
  $experiencia = $_POST["experiencia"];
  $idusuario = $_POST["idusuario"];
  $idpersona = $_POST["idpersona"];
  $sql = "INSERT INTO opiniones(nombre,apellidoM,apellidoP,experiencia,idusuario,idpersona)"
        ." VALUES(?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("sssiii",$nombre,$apellidoM,$apellidoP,$experiencia,$idusuario,$idpersona);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
