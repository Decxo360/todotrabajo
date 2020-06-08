<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../bd.php";
$email = $_POST["email"];
$password = $_POST["password"];
echo $email;
echo $password;
$sql = "SELECT * FROM usuario WHERE (email=\"?\" AND password=\"?\")";
$mysqli = conectar();
$st = $mysqli->prepare($sql);
$st->bind_param("s",$email,$password);
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
    $lista[] = $usuario;
    exit();
  }else {
    $error = "Datos erroneos";
  }
  $st->close();
  echo $error;
json_encode($lista);