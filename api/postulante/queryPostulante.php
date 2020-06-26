<?php
/**
 * Llama a la conexion de la base de datos
 */
require_once "../bd.php";
session_start();
$rut = $_SESSION["usuario"]->rut;
/**
 * Sentencia sql, consulta con datos de la sesion
 */
$sql = "SELECT * FROM postulante WHERE (rut= ?)";
$mysqli = conectar();
$st = $mysqli->prepare($sql);
$st->bind_param("s",$rut);
$st->execute();
$result = $st->get_result();
$lista = array();
while($fila = $result->fetch_row()){
   $postulante = new stdClass();
   $postulante->idpostulante=$fila[0];
   $postulante->nombre=$fila[1];
   $postulante->apellidoM=$fila[2];
   $postulante->apellidoP=$fila[3];
   $postulante->rut=$fila[4];
   
   $lista[] = $postulante;
}
$st->close();
echo json_encode($lista);