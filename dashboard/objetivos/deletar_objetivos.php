<?php

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