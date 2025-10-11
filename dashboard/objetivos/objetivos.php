<?php

// Processa o formulário de objetivos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo_objetivo'], $_POST['descricao_objetivo'])) {
    $titulo = $_POST['titulo_objetivo'];
    $texto = $_POST['descricao_objetivo'];
    $sql = "INSERT INTO objetivos (titulo, texto) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $titulo, $texto);

    if ($stmt->execute()) {
        header("Location: dashBoard.php");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
}

// Processa a exclusão de objetivos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-excluir-objetivo'])) {
    $id = $_POST['btn-excluir-objetivo'];
    $sql = "DELETE FROM objetivos WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: dashBoard.php");
        exit();
    } else {
        echo "Erro ao excluir: " . $stmt->error;
    }
}

?>



