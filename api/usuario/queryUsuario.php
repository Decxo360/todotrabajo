<?php
require_once "../bd.php";
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "SELECT * FROM usuario WHERE (email=?,password=?)";
$bd = conectar();
$st = $bd->prepare($sql);
$st->bind_param("ss",$email,$password);
$st->execute();
$res = $st->get_result();
$error = "";
$lista = array();
if ($fila = $res->fetch_row()) {
    $usuario = new stdClass();
    $usuario->idusuario=$fila[0];
    $usuario->email=$fila[1];
    $usuario->password=$fila[2];
    $usuario->tipousuario=$fila[3];
    $usuario->rut=$fila[4];
    $_SESSION["usuario"] = $usuario;
    header("Location:index.php");
    $lista[] = $usuario;
    exit();
  }else {
    $error = "Datos erroneos";
  }
  $st->close();
  echo $error;
json_encode($lista);