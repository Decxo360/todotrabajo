<?php
  require_once "../bd.php";
  $esRealizado = $_POST["esRealizado"]; // arreglos asociativo
  $esPostulado = $_POST["esPostulado"];
  $puntos = $_POST["puntos"];
  $esSubido = $_POST["esSubido"];
  $idusuario = $_POST["idusuario"];
  $rut = $_POST["rut"];
  echo $esRealizado;
  echo $esPostulado;
  echo $puntos;
  echo $esSubido;
  echo $idusuario;
  echo $rut;
  $sql = "INSERT INTO experiencia(esRealizado,esPostulado,puntos,esSubido,idusuario,rut)"
        ." VALUES(?,?,?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("iisiis",$esRealizado,$esPostulado,$puntos,$esSubido,$idusuario,$rut);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
