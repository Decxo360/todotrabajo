<?php
/**
 * Llama la conexion de la bd
 */
require_once "../bd.php";
session_start();
$rut = $_SESSION["usuario"]->rut;
/**
 * Sentencia sql con datos de la sesion iniciada
 */
$sql = "SELECT * FROM postulacion WHERE ( rut= ?)";
$mysqli = conectar();
$st = $mysqli->prepare($sql);
$st->bind_param("s",$rut);
$st->execute();
$result = $st->get_result();
$lista = array();
while($fila = $result->fetch_row()){
   $postulacion = new stdClass();
   $postulacion->idpostulante = $fila[0];
   $postulacion->idpublicacion = $fila[1];
   $postulacion->idusuario= $fila[2];
   $postulacion->rut=$fila[3];
   $lista[] = $postulacion;
}
$st->close();
echo json_encode($lista);