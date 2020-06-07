<?php
  require_once "../bd.php";
  $email = $_POST["email"]; // arreglos asociativo
  $password = $_POST["password"];
  $tipousuario = $_POST["tipousuario"];
  $idpersona = $_POST["idpersona"];
  $sql = "INSERT INTO usuario(email,password,tipousuario,idpersona)"
        ." VALUES(?,?,?,?)";
  $mysqli = conectar();
  $respuesta = new stdClass();
  if($mysqli){
      $st = $mysqli->prepare($sql);
      $st->bind_param("sssi",$email,$password,$tipousuario,$idpersona);
      $st->execute();
      $st->close();
      $respuesta->resultado = true;
      $respuesta->comentario = "los datos han sido ingresados exitosamente";
  } else{
      $respuesta->resultado = false;
  }
  echo json_encode($respuesta);
