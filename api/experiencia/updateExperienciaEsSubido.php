<?php
/**
 * Llama a la conexion a la base de datos
 */
    session_start();   
  require_once "../bd.php";
  $esSubido = $_POST["esSubido"];
  $idusuario = $_SESSION["usuario"]->idusuario;
  /**
   * Sentencia sql para actualizar datos
   */
  $sql = "UPDATE experiencia set esSubido = ? where (idusuario = ?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("si", $esSubido,$idusuario);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
