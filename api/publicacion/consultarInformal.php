<?php
/**
 * Llama a la conexion de la base de datos:
 */
    require_once "../bd.php";
    $mysqli = conectar();
    /**
     * Manda la sentencia sql para consultar todo cuando el tipoPublicacion sea igual a informal
     */
    $st = $mysqli->prepare("SELECT * FROM publicacion WHERE (tipoPublicacion='informal')");
    $st->execute();
    $result = $st->get_result();
    $lista = array();
    while($fila = $result->fetch_row()){
       $publicaciones = new stdClass();
       $publicaciones->idpublicacion= $fila[0];
       $publicaciones->descripcion = $fila[1];
       $publicaciones->aPagar = $fila[2];
       $publicaciones->ubicacion = $fila[3];
       $publicaciones->fecha = $fila[4];
       $publicaciones->titulo = $fila[5];
       $publicaciones->fechafinal = $fila[6];
       $publicaciones->idusuario = $fila[7];
       $publicaciones->rut= $fila[8];
       $publicaciones->tipoPublicacion=$fila[9];
       $publicaciones->etiqueta=$fila[10];
       $lista[] = $publicaciones;
    }
    $st->close();
    echo json_encode($lista);
