<?php

//Processa a edição de eventos comuns
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-editar-evento-comum'])){
    $id = $_POST['btn-editar-evento-comum'];
    $sql = "UPDATE eventos_comuns SET nome = ?, descricao = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi", $nome, $descricao, $id);
    if ($stmt->execute()) {
        header("Location: dashBoard.php");
        exit();
    } else {
        echo "Erro ao editar: " . $stmt->error;
    }
}
?>

?>