<?php
/**
 * Llama a la conexión de la base de datos
 */
require_once "../bd.php";
$idpublicacion = $_POST["idpublicacion"];
$idusuario = $_POST["idusuario"];
$rut = $_POST["rut"];
/**
 * Sentencia sql, consulta todos los datos de pregunta
 */
$sql = "SELECT * FROM pregunta WHERE (idpublicacion= ? && idusuario= ? && rut= ?)";
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
   $pregunta->idusuario = $fila[3];
   $pregunta->rut = $fila[4];
   $lista[] = $pregunta;
}
$st->close();
echo json_encode($lista);