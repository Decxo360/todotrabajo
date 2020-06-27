<?php
/**
 * Llama a la base de datos
 */
    require_once "../bd.php";
/**
 * Consulta con sesion
 */
    session_start();
    $idusuario = $_SESSION["usuario"]->idusuario ;
    $rut= $_SESSION["usuario"]->rut;

    $etiqueta=$_POST["etiqueta"];
    $mysqli = conectar();
    /**
     * Sentencia sql la cual dice que le traiga toda la publicacion cuando sea idusario igual a la de la sesion
     * y cuando el rut sea igual a la de la sesion
     */
    $st = $mysqli->prepare("SELECT * FROM publicacion WHERE (idusuario=? && rut=?) ORDER BY idpublicacion DESC LIMIT 1");
    $st->bind_param("is",$idusuario,$rut);
    $st->execute();
    $result = $st->get_result();
    $lista = array();
    while($fila = $result->fetch_row()){
        $publicacion = new stdClass();
        $publicacion->idpublicacion= $fila[0];
        $publicacion->descripcion = $fila[1];
        $publicacion->aPagar = $fila[2];
        $publicacion->ubicacion = $fila[3];
        $publicacion->fecha = $fila[4];
        $publicacion->titulo = $fila[5];
        $publicacion->fechafinal = $fila[6];
        $publicacion->idusuario = $fila[7];
        $publicacion->rut= $fila[8];
        $publicacion->tipoPublicacion=$fila[9];
        $publicacion->etiqueta=$fila[10];
        $lista[]=$publicacion;
    }
    $st->close();
    echo json_encode($lista);
