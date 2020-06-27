<?php
/**
 * Llama a la conexion de la base de datos
 */
  require_once "../bd.php";
  $esRealizado = $_POST["esRealizado"]; // arreglos asociativo
  $esPostulado = $_POST["esPostulado"];
  $puntos = $_POST["puntos"];
  $esSubido = $_POST["esSubido"];
  $xp = $_POST["xp"];
  $idusuario = $_POST["idusuario"];
  $rut = $_POST["rut"];
   /**
   * Se crea la consulta sql en este caso insertar valores en una
   */
  $sql = "INSERT INTO experiencia(esRealizado,esPostulado,puntos,esSubido,xp,idusuario,rut)"
        ." VALUES(?,?,?,?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("iisiiis",$esRealizado,$esPostulado,$puntos,$esSubido,$xp,$idusuario,$rut);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
    /**
   * Se obtiene el resultado
   */
  echo json_encode($respuesta);
