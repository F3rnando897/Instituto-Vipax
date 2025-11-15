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

function mostrarPreco($price, bool $rs = true) {
  $price = strval($price);
  $format = "";

  for($i = strlen($price)-1; $i >= 0; $i--) {
    if (strlen($price) - $i == 3) 
      $format = ',' . $format;
    
    if ($i < strlen($price) - 3 && 
      (strlen($price) - $i - 3) % 3 == 0)
      $format = '.' . $format;
    
    $format = $price[$i] . $format;
  }

  return $rs ? "R$".$format : $format;
  
}

function limpar_preco($str){ 
  $str = str_replace(".", "", $str); 
  $str = str_replace(",", ".", $str); 
  return floatval($str);
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

function selectEventos($name) {
  include '../../config/conexao.php';

  $stmt = $mysqli->prepare("SELECT * FROM eventos_comuns");
  $stmt->execute();
  $response = $stmt->get_result();
  $stmt->close();

  echo "<select name='$name' class='btn'>";
  while ($row = $response->fetch_assoc()) {
    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
  }
  echo "</select>";
  
}

?>