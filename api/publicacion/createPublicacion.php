<?php
/**
 * Llama a la conexion de la base de datos
 */
  require_once "../bd.php";
  $descripcion = $_POST["descripcion"]; // arreglos asociativo
  $aPagar = $_POST["aPagar"];
  $ubicacion = $_POST["ubicacion"];
  $fecha = $_POST["fecha"];
  $titulo = $_POST["titulo"];
  $fechafinal = $_POST["fechafinal"];
  session_start();
  $idusuario = $_SESSION["usuario"]->idusuario ;
  $rut= $_SESSION["usuario"]->rut;
  $tipoPublicacion=$_POST["tipoPublicacion"];
  $etiqueta = $_POST["etiqueta"];
  /**
   * Sentencia sql, insercion a la bd
   */
  $sql = "INSERT INTO publicacion(descripcion,aPagar,ubicacion,fecha,titulo,fechafinal,idusuario,rut,tipoPublicacion,etiqueta)"
        ." VALUES(?,?,?,?,?,?,?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("ssssssisss",$descripcion,$aPagar,$ubicacion,$fecha,$titulo,$fechafinal,$idusuario,$rut,$tipoPublicacion,$etiqueta);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "Los datos han sido ingresados correctamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
