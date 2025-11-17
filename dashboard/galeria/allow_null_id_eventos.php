<?php
// Script rápido para alterar a coluna `id_eventos_comuns` para aceitar NULL
// Uso: abra no navegador http://localhost/Instituto-Vipax/dashboard/galeria/allow_null_id_eventos.php

include __DIR__ . '/../../config/conexao.php';

header('Content-Type: text/plain; charset=utf-8');

// verifica se a coluna existe e seu atributo NULL
$check = $mysqli->query("SHOW COLUMNS FROM galeria LIKE 'id_eventos_comuns'");
if (!$check) {
    echo "Erro ao consultar estrutura da tabela: " . $mysqli->error;
    exit;
}

$col = $check->fetch_assoc();
if (!$col) {
    echo "Coluna 'id_eventos_comuns' não encontrada na tabela 'galeria'.\n";
    exit;
}

echo "Coluna encontrada. Tipo: {$col['Type']}, Null: {$col['Null']}, Key: {$col['Key']}\n";

if (strtoupper($col['Null']) === 'YES') {
    echo "A coluna já aceita NULL. Nada a fazer.\n";
    exit;
}

$sql = "ALTER TABLE galeria MODIFY id_eventos_comuns INT NULL";
if ($mysqli->query($sql)) {
    echo "Sucesso: coluna alterada para NULL.\n";
} else {
    echo "Falha ao alterar coluna: " . $mysqli->error . "\n";
    echo "Você pode executar manualmente este comando no phpMyAdmin ou MySQL CLI:\nALTER TABLE galeria MODIFY id_eventos_comuns INT NULL;\n";
}

?>
