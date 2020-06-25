<?php
require_once "../bd.php";
$idpublicacion = $_POST["idpublicacion"]; // arreglos asociativo
$idusuario = $_POST["idusuario"];
$codigo = $_POST["codigo"];
$rol= $_POST["rol"];
$sql = "INSERT INTO roles(idpublicacion,idusuario,codigo,rol)"
      ." VALUES(?,?,?,?)";
$mysqli = conectar();
$respuesta = new stdClass();
if($mysqli){
    $st = $mysqli->prepare($sql);
    $st->bind_param("iiss",$idpublicacion,$idusuario,$codigo,$rol);
    $st->execute();
    $st->close();
    $respuesta->resultado = true;
    $respuesta->comentario = "los datos han sido ingresados exitosamente";
} else{
    $respuesta->resultado = false;
}
echo json_encode($respuesta);
