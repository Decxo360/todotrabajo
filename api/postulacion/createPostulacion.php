<?php
  require_once "../bd.php";
  $idpostulante = $_POST["idpostulante"]; // arreglos asociativo
  $idpublicacion = $_POST["idpublicacion"];
  $idusuario = $_POST["idusuario"];
  $rut = $_POST["rut"];
  $sql = "INSERT INTO postulacion(idpostulante,idpublicacion,idusuario,rut)"
        ." VALUES(?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("iiis",$idpostulante,$idpublicacion,$idusuario,$rut);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "Los datos han sido ingresados correctamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
