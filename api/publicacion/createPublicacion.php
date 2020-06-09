<?php
  require_once "../bd.php";
  $descripcion = $_POST["descripcion"]; // arreglos asociativo
  $aPagar = $_POST["aPagar"];
  $ubicacion = $_POST["ubicacion"];
  $fecha = $_POST["fecha"];
  $titulo = $_POST["titulo"];
  $idusuario = $_POST["idusuario"];
  $rut=$_POST["rut"];
  $sql = "INSERT INTO publicacion(descripcion,aPagar,ubicacion,fecha,titulo,idusuario)"
        ." VALUES(?,?,?,?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("sssssis",$descripcion,$aPagar,$ubicacion,$fecha,$titulo,$idusuario,$rut);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "Los datos han sido ingresados correctamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
