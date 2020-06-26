<?php
/**
 * Llama a la conexion de la base de datos
 */
  require_once "../bd.php";
  session_start();
  $texto = $_POST["texto"]; // arreglos asociativo
  $idpublicacion = $_POST["idpublicacion"];
  $idusuario = $_SESSION["usuario"]->idusuario;
  $rut = $_SESSION["usuario"]->rut;
    /**
     * Sentencia sql, insercion en la base de datos
     */
  $sql = "INSERT INTO pregunta(texto,idpublicacion,idusuario,rut)"
        ." VALUES(?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("siis",$texto,$idpublicacion,$idusuario,$rut);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
