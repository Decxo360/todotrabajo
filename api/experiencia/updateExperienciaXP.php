<?php
/**
 * Lla a la conexion a la base de datos
 */
  require_once "../bd.php";
  $xp = $_POST["xp"];
  $idusuario = $_POST["idusuario"];
  /**
   * Sentencia sql para actualizar datos
   */
  $sql = "UPDATE experiencia set xp = ? where (idusuario = ?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("si", $xp,$idusuario);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
