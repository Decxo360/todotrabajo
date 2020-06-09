<?php
  require_once "../bd.php";
  $nombre = $_POST["nombre"]; // arreglos asociativo
  $apellidoM = $_POST["apellidoM"];
  $apellidoP = $_POST["apellidoP"];
  $rut = $_POST["rut"];
  $edad= $_POST["edad"];
  $tarjeta = $_POST["tarjeta"];
  $sql = "INSERT INTO persona(nombre,apellidoM,apellidoP,rut,edad,tarjeta)"
        ." VALUES(?,?,?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("ssssss",$nombre,$apellidoM,$apellidoP,$rut,$edad,$tarjeta);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta, JSON_UNESCAPED_SLASHES);
