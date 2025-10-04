<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vipax";

$mysqli = new mysqli($servidor, $usuario, $senha, $banco);
if ($mysqli->errno) {
  die("Erro na conexao");
}

/*
// consulta no banco de dados
$sql_code = "SELECT * FROM eventos_comuns";
$query_eventos = $mysqli->query($sql_code);
while ($row = $query_eventos->fetch_assoc()) {
  // mexer na linha da query
  // $row['id']
  // $row['nome']
  // $row['descricao']
}
*/
?>
