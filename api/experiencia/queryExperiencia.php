<?php
/**
 *Llamo a la conexion a la base de datos
 */
    require_once "../bd.php";
    $rut = $_POST["rut"];
    $mysqli = conectar();
    /**
     * Sentencia sql, la cual es una consulta
     */
    $st = $mysqli->prepare("SELECT * FROM experiencia 
        WHERE rut='?'");
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
        $experiencia->idusuario = $fila[5];
        $experiencia->rut = $fila[6];
        $lista[] = $experiencia;
        $entre = true;
    }
    $st->close();
    /**
     * Resultado de la consulta
     */
    echo json_encode($lista);