<?php
  require_once "../bd.php";
  $FK_idpostulante = $_POST["FK_idpostulante"]; // arreglos asociativo
  $FK_idpublicacion = $_POST["FK_idpublicacion"];
  $FK_idusuario = $_POST["FK_idusuario"];
  $FK_idpersona = $_POST["FK_idpersona"];
  $sql = "INSERT INTO opiniones(FK_idpostulante,FK_idpublicacion,FK_idusuario,FK_idpersona)"
        ." VALUES(?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("iiii",$FK_idpostulante,$FK_idpublicacion,$FK_idusuario,$FK_idpersona);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "Los datos han sido ingresados correctamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
