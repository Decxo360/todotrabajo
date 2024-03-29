<?php
/**
 * Llama a la conexion de la base de datos
 */
  require_once "../bd.php";
  session_start();
  $nombre = $_POST["nombre"]; // arreglos asociativo
  $apellidoM = $_POST["apellidoM"];
  $apellidoP = $_POST["apellidoP"];
  $rut = $_SESSION["usuario"]->rut;
  /**
   * Sentencia sql, insercion en postulante con datos ingresados y datos de la sesion
   */
  $sql = "INSERT INTO postulante(nombre,apellidoM,apellidoP,rut)"
        ." VALUES(?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("ssss", $nombre,$apellidoM,$apellidoP,$rut);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
