<?php
  require_once "../bd.php";
  $trabajoRealizado = $_POST["trabajoRealizado"]; // arreglos asociativo
  $postulados = $_POST["postulados"];
  $puntos = $_POST["puntos"];
  $trabajoSubido = $_POST["trabajoSubido"];
  $idusuario = $_POST["idusuario"];
  $sql = "INSERT INTO opiniones(trabajoRealizado,postulados,puntos,trabajoSubido,idusuario)"
        ." VALUES(?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("iisii",$trabajoRealizado,$postulados,$puntos,$trabajoSubido,$idusuario);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
