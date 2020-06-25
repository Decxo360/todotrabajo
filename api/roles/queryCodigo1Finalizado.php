<?php
require_once "../bd.php";
$idpostulante = $_POST["idpostulante"];
$sql = "SELECT * FROM finalizado WHERE (idpostulante= ?)";
$mysqli = conectar();
$st = $mysqli->prepare($sql);
$st->bind_param("i",$idpostulante);
$st->execute();
$result = $st->get_result();
$lista = array();
while($fila = $result->fetch_row()){
   $finalizado = new stdClass();
   $finalizado->idfinaliazado=$fila[0];
   $finalizado->idpublicacion=$fila[1];
   $finalizado->idusuarioEmpleador = $fila[2];
   $finalizado->idpostulante=$fila[3];
   $finalizado->codigoEmpleador=$fila[4];
   $finalizado->codigoTrabajador=$fila[5];
   $lista[] = $finalizado;
}
$st->close();
echo json_encode($lista);