<?php 
include '../../config/conexao.php';
include '../sidebar.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: lista.php");
    exit();
}

$stmt = $mysqli->prepare("UPDATE vagas_reservadas SET situacao = 'aprovado' WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

header("Location: lista.php?id=" . $_GET['id_evento']);
exit();
?>
