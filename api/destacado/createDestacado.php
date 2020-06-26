<?php
/**
 * Llama a la conexion de la base de datos
 */
  require_once "../bd.php"; // arreglos asociativo
  $nombre = $_POST["nombre"];
  $apellidoM = $_POST["apellidoM"];
  $apellidoP = $_POST["apellidoP"];
  $rut = $_POST["rut"];
  $idusuario = $_POST["idusuario"];
  /**
   * Se crea la consulta sql en este caso insertar valores en una
   */
  $sql = "INSERT INTO destacado(nombre,apellidoM,apellidoP,rut,idusuario)"
        ." VALUES(?,?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("sssis",$nombre,$apellidoM,$apellidoP,$rut,$idusuario);
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
