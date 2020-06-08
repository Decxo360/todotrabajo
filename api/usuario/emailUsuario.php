<?php
    require_once "../bd.php";
    $mysqli = conectar();
    $st = $mysqli->prepare("SELECT email,password FROM usuario");
    $st->execute();
    $res = $st->get_result();
    $lista = array();
    if(!$st){
    echo "Algo anda mal D:".$php_errormsg;
    }else{
    if ($fila = $res->fetch_row()) {
        $usuario = new stdClass();
        $usuario->email=$fila[0];
        $usuario->password=$fila[1];
        $lista[] =$usuario;
      }else {
        $error = "Datos erroneos";
      }
    }
    $st->close();
    echo json_encode($lista);