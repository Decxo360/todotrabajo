<?php
require_once "../bd.php";
session_start();
$idusuario = $_SESSION["usuario"]->idusuario;
$sql = "SELECT * FROM seleccionado WHERE ( idusuario = ?)";
$mysqli = conectar();
$st = $mysqli->prepare($sql);
$st->bind_param("i",$idusuario);
$st->execute();
$result = $st->get_result();
$lista = array();
while($fila = $result->fetch_row()){
   $seleccionado = new stdClass();
   $seleccionado->idseleccionado= $fila[0];
   $seleccionado->numEnviado = $fila[2];
   $seleccionado->idpostulante= $fila[3];
   $seleccionado->idpublicacion = $fila[4];
   $seleccionado->idusuario = $fila[5];
   $seleccionado->rut = $fila[6];
   $lista[] = $seleccionado;
}
$st->close();
echo json_encode($lista);