<?php
    require_once "../bd.php";
    $descripcion = $_POST["descripcion"]; // arreglos asociativo
    $aPagar = $_POST["aPagar"];
    $ubicacion = $_POST["ubicacion"];
    $fecha = $_POST["fecha"];
    $titulo = $_POST["titulo"];
    $fechafinal = $_POST["fechafinal"];
    session_start();
    $idusuario = $_SESSION["usuario"]->idusuario ;
    $rut= $_SESSION["usuario"]->rut;
    $tipoPublicacion;
    if($_SESSION["usuario"]->tipoUsuario == "usuario"){
      $tipoPublicacion = "informal";
    }else{
      $tipoPublicacion = "formal";
    }
    $etiqueta=$_POST["etiqueta"];
    $mysqli = conectar();
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
