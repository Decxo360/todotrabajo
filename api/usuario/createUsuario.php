<?php
  require_once "../bd.php";
  $email = $_POST["email"]; // arreglos asociativo
  $pass = $_POST["pass"];
  $tipousuario = $_POST["tipousuario"];
  $rut = $_POST["rut"];
  $sql = "INSERT INTO usuario(email,pass,tipousuario,rut)"
        ." VALUES(?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("ssss",$email,$pass,$tipousuario,$rut);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
      
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
