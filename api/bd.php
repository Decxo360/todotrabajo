<?php
/**
 * Conexion de la base de datos, retorna la conexion
 */
function conectar(){
  $mysqli = new mysqli("localhost","root","","todotrabajo");
  if ($mysqli->connect_error) {
    return false;
    echo $mysqli;
  }else {
    $mysqli->set_charset("utf8");
    return $mysqli;
  }
}
