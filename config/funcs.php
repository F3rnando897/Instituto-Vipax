<?php 

function mostrarData($data) {
  $data = explode("-", $data);
  $data[0] %= 100; 
  $data = array_reverse($data);
  return implode("/", $data);
}

function mostrarHora($hora) {
  $hora = explode(":", $hora);
  array_pop($hora);
  return implode(":", $hora);
}

?>