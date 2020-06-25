<?php
require_once "../bd.php";
session_start();
$sql = "SELECT * FROM roles WHERE (rol=Trabajador && idusuario=".$_SESSION["usuario"]->idusuario.")";
$mysqli = conectar();
$st = $mysqli->prepare($sql);
$st->execute();
$result = $st->get_result();
$lista = array();
while($fila = $result->fetch_row()){
   $roles = new stdClass();
   $roles->idpublicacion=$fila[0];
   $roles->idusuario=$fila[1];
   $roles->codigo = $fila[2];
   $roles->rol=$fila[3];
   $roles->idrol=$fila[4];
   $lista[] = $roles;
}
$st->close();
echo json_encode($lista);