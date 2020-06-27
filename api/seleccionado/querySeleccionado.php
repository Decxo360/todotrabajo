<?php
require_once "../bd.php";
$idpostulante = $_POST["idpostulante"];
/**
 * Sentencia sql que indica que traiga todo cuando la idpostulante sea igual a la obtenida por axios
 */
$sql = "SELECT * FROM seleccionado WHERE ( idpostulante = ?)";
$mysqli = conectar();
$st = $mysqli->prepare($sql);
$st->bind_param("i",$idpostulante);
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