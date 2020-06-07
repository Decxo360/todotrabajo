<?php
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
