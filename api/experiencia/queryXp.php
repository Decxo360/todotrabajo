<?php
/**
 * Llama a la conexion a la base de datos
 */
require_once "../bd.php";
/**
 * Datos de la sesion 
 */
session_start();
$rut =$_SESSION["usuario"]->rut;
/**
 * consulta sql para que me traiga todo de experiencia cuando el rut sea igual al de la sesion
 */
$sql = "SELECT * FROM experiencia 
WHERE rut=?";
$bd = conectar();
    if( $st = $bd->prepare($sql) ){
$st->bind_param("s", $rut);
$st->execute();
$result = $st->get_result();
$lista = array();
$entre= false;
        while($fila = $result->fetch_row()){
        $experiencia = new stdClass();
        $experiencia->idexperiencia = $fila[0];
        $experiencia->esRealizado= $fila[1];
        $experiencia->esPostulado = $fila[2];
        $experiencia->puntos= $fila[3];
        $experiencia->esSubido= $fila[4];
        $experiencia->xp = $fila[5];
        $experiencia->idusuario = $fila[6];
        $experiencia->rut = $fila[7];
        $lista[] = $experiencia;
        $entre = true;
        }
    }   
$st->close();
echo json_encode($lista);