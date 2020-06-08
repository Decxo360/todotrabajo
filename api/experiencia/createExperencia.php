<?php
  require_once "../bd.php";
  $trabajoRealizado = $_POST["trabajoRealizado"]; // arreglos asociativo
  $postulados = $_POST["postulados"];
  $puntos = $_POST["puntos"];
  $trabajoSubido = $_POST["trabajoSubido"];
  $rut = $_POST["rut"];
  $sql = "INSERT INTO experiencia(trabajoRealizado,postulados,puntos,trabajoSubido,rut)"
        ." VALUES(?,?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("iisis",$trabajoRealizado,$postulados,$puntos,$trabajoSubido,$rut);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
