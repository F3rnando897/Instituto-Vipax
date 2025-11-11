<?php

// Processa a exclusão de eventos comuns
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-excluir-evento-comum'])) {
    $id = $_POST['btn-excluir-evento-comum'];
    $sql = "DELETE FROM eventos_comuns WHERE id = ?";
    $sql_img = "DELETE FROM galeria WHERE galeria_id = ?";
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