<?php
    require_once "../bd.php";
    $rut = $_POST["rut"];
    $mysqli = conectar();
    $st = $mysqli->prepare("SELECT * FROM persona 
        WHERE(rut=?)");
    $st->bind_param("s", $rut);
    $st->execute();
    $result = $st->get_result();
    $lista = array();
    $entre= false;
    while($fila = $result->fetch_row()){
       
        $persona = new stdClass();
        $persona->idpersona = $fila[0];
        $persona->nombre = $fila[1];
        $persona->apellidoM = $fila[2];
        $persona->apellidoP = $fila[3];
        $persona->rut = $fila[4];
        $persona->edad = $fila[5];
        $persona->tarjeta = $fila[6];
        $lista[] = $persona;
        $entre = true;
    }
    echo $rut;
    echo $entre;
    $st->close();
    echo json_encode($lista);