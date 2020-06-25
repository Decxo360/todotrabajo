<?php
require_once "../bd.php";
$idpublicacion = $_POST["idpublicacion"]; // arreglos asociativo
$estado = "pendiente";
$pagado = "pendiente";
$sql = "INSERT INTO finalizado(idpublicacion,estado,pagado)"
      ." VALUES(?,?,?)";
$mysqli = conectar();
$respuesta = new stdClass();
if($mysqli){
    $st = $mysqli->prepare($sql);
    $st->bind_param("iss",$idpublicacion,$estado,$pagado);
    $st->execute();
    $st->close();
    $respuesta->resultado = true;
    $respuesta->comentario = "los datos han sido ingresados exitosamente";
} else{
    $respuesta->resultado = false;
}
echo json_encode($respuesta);
