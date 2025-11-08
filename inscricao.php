<?php 

include 'header.php';
if (!isset($_GET['evento']) || 
    !isset($_SESSION['id']) ||
    !is_numeric($_GET['evento'])) {
    header("Location: index.php");
}

include 'config/conexao.php';
$stmt = $mysqli->prepare("SELECT eventos_futuros.data as data,
                eventos_futuros.horario as horario,
                eventos_futuros.preco as preco,
                eventos_futuros.vagas as vagas,
                eventos_comuns.nome as nome,
                eventos_comuns.descricao as descricao
                FROM eventos_futuros, eventos_comuns 
                WHERE eventos_futuros.id_eventos_comuns = eventos_comuns.id 
                AND eventos_futuros.id = ?");

$stmt->bind_param("i", $_GET['evento']);
$stmt->execute();
$evento = $stmt->get_result()->fetch_assoc();
$stmt->close();

include 'config/funcs.php';
?>

<main>
    <h1>Inscricao para evento</h1>
    <section>
        <h2><?= $evento['nome'] ?></h2>
        <p><?= mostrarData($evento['data']) ?> <?= mostrarHora($evento['horario']) ?></p>
        <p>Vagas: <?= $evento['vagas'] ?></p>
        <p><?= mostrarPreco($evento['preco']) ?></p>
        <p><?= $evento['descricao'] ?></p>
    </section>
</main>