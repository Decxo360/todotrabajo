<?php

session_start();

require_once "../bd.php";

$email = $_POST["email"];
$password = $_POST["pass"];
/**
 * Sentencia sql que indica que traiga todo cuando email sea igaul al obtenido de axios y la pass sea igual a
 * la obtenida por axios
 */
$sql = "SELECT * FROM usuario WHERE email=?&&pass=? limit 1";

$mysqli = conectar();
$st = $mysqli->prepare($sql);
$st->bind_param("ss",$email, $password);
$st->execute();

$res = new stdClass();
$res = $st->get_result();

$error = "";
$lista=array();
$usuario = new stdClass();
$usuario = $res->fetch_object();
$_SESSION["usuario"] = $usuario;


if($usuario){
  $error = json_encode($usuario);
}else{
  $error = "ERROR no se encontro al usuario";
}

$st->close();
echo $error;
//echo json_encode($usuario);