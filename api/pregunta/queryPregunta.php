<?php
session_start();
require_once "../bd.php";
$idpublicacion = $_POST["idpublicacion"];
$idusuario = $_SESSION["usuario"]->idusuario;
$rut = $_SESSION["usuario"]->rut;
echo $idpublicacion;
$sql = "SELECT * FROM pregunta WHERE (idpublicacion= ? && idusuario= ? && rut= ?) limit 1";
$mysqli = conectar();
$st = $mysqli->prepare($sql);
$st->bind_param("iis",$idpublicacion,$idusuario,$rut);
$st->execute();
$result = $st->get_result();
$lista = array();
while($fila = $result->fetch_row()){
   $pregunta = new stdClass();
   $pregunta->idpregunta= $fila[0];
   $pregunta->texto = $fila[1];
   $pregunta->idpublicacion = $fila[2];
   $lista[] = $pregunta;
}
$st->close();
echo json_encode($lista);