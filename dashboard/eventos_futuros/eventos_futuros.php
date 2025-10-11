<?php

// Processa o formulário de cadastro de eventos futuros
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_evento_futuro'], $_POST['descricao_evento_futuro'])) {
    $nome = $_POST['nome_evento_futuro'];
    $descricao = $_POST['descricao_evento_futuro'];
    $sql = "INSERT INTO eventos_futuros (nome, descricao) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $nome, $descricao);

    if ($stmt->execute()) {
        header("Location: dashBoard.php");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
}


?>