<?php
/**
 * Llama a la conexion de la base de datos
 */
require_once "../bd.php";
$codigo = $_POST["codigo"];
/**
 * Consulta cuando el codigo sea igual a 1 ordenado por codigo de forma descendiente con limite de una row
 */
$sql = "SELECT * FROM roles WHERE (codigo = ?) ORDER BY codigo DESC LIMIT 1 ";
$mysqli = conectar();
$st = $mysqli->prepare($sql);
$st->bind_param("s",$codigo);
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