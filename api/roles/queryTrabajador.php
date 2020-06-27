<?php
require_once "../bd.php";
session_start();
$idusuario = $_SESSION["usuario"]->idusuario ;
$rol = "Trabajador";
/**
 * Consulta sql que indica que traiga todo cuando sea el idusuario obtenido por axios y cuando el rol sea trabajador
 */
$sql = "SELECT * FROM roles WHERE (idusuario = ? && rol = ?)";
$mysqli = conectar();
$st = $mysqli->prepare($sql);
$st->bind_param("is",$idusuario,$rol);
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