<?php
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "vipax";

$mysqli = new mysqli($servidor, $usuario, $senha, $banco);
if ($mysqli->errno) {
  die("Erro na conexao");
}

?>
