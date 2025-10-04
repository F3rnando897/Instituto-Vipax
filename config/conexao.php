<?php
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "vipax";

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);
    // Ativar modo de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado com sucesso!";
} catch(PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
