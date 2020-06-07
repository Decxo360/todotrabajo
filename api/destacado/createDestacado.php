<?php
  require_once "../bd.php";
  $idusuario = $_POST["idusuario"]; // arreglos asociativo
  $idpersona = $_POST["idpersona"];
  $nombre = $_POST["nombre"];
  $apellidoM = $_POST["apellidoM"];
  $apellidoP = $_POST["apellidoP"];
  $sql = "INSERT INTO opiniones(idusario,idpersona,nombre,apellidoM,apellidoP)"
        ." VALUES(?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("iisss",$idusuario,$idpersona,$nombre,$apellidoM,$apellidoP);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
