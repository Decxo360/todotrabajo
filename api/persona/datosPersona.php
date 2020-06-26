<?php
/**
 * Llama a la conexion a de la base de datos
 */
    require_once "../bd.php";
    session_start();
    $rut = $_SESSION["usuario"]->rut;
    $mysqli = conectar();
    /**
     * Sentencia sql para traer todos los datos con el rut de la sesion iniciada
     */
    $st = $mysqli->prepare("SELECT * FROM persona 
        WHERE(rut=?)");
    $st->bind_param("s", $rut);
    $st->execute();
    $result = $st->get_result();
    $lista = array();
    $entre= false;
    while($fila = $result->fetch_row()){
        $persona = new stdClass();
        $persona->nombre = $fila[0];
        $persona->apellidoM = $fila[1];
        $persona->apellidoP = $fila[2];
        $persona->rut = $fila[3];
        $persona->edad = $fila[4];
        $persona->tarjeta = $fila[5];
        $lista[] = $persona;
        $entre = true;
    }
    $st->close();
    echo json_encode($lista);