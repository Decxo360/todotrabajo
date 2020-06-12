<?php
    require_once "../bd.php";

    $mysqli = conectar();
    $st = $mysqli->prepare("SELECT * FROM publicacion");
    $st->execute();
    $result = $st->get_result();
    $lista = array();
    while($fila = $result->fetch_row()){
       $publicaciones = new stdClass();
       $publicaciones->idpublicacion= $fila[0];
       $publicaciones->aPagar = $fila[1];
       $publicaciones->ubicacion = $fila[2];
       $publicaciones->fecha = $fila[3];
       $publicaciones->titulo = $fila[4];
       $publicaciones->fechafinal = $fila[5];
       $publicaciones->idusuario = $fila[6];
       $publicaciones->rut= $fila[7];
       $lista[] = $publicaciones;
    }
    $st->close();
    echo json_encode($lista);
