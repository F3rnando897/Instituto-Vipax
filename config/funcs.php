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

function limpar_texto($str){ 
  return preg_replace("/[^0-9]/", "", $str); 
}

function verify($email, $senha, $nome = "Nome", $telefone = "19912341234") {
  $infos = [
    "email" => true,
    "senha" => true,
    "nome" => true,
    "telefone" => true
  ];
  // Verificar email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $infos["email"] = false;
  }
  
  // Verificar senha
  if (strlen($senha) < 6 || strlen($senha) > 16) {
    $infos["senha"] = false;
  }

  // Verificar nome
  if (strlen($nome) < 2 || strlen($nome) > 100) {
    $infos["nome"] = false;
  }

  // Verificar telefone
  $telefone = limpar_texto($telefone);
  if (strlen($telefone) != 11 && strlen($telefone) != 0) {
    $infos["telefone"] = false;
  }

  return $infos;
}

?>