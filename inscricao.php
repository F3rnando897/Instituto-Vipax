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
if (!$evento || strtotime($evento['data']) < time()) header("Location: index.php");

function redirect($evento = "Evento nao encontrado", $data = "") {
    $nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : "Nome nao encontrado";
    $msg = "Ola! Meu nome é {$nome}. \nMe interessei pelo {$evento} do dia {$data}! Quero me inscrever!";
    $msg = urlencode($msg);
    header("Location: https://api.whatsapp.com/send?phone=5519999481842&text={$msg}");
    exit();
}

$erro_inscricao = 0;
if (isset($_POST['inscrever'])) {
    $stmt = $mysqli->prepare("INSERT INTO vagas_reservadas (id_evento, id_usuario, situacao) VALUES (? ,?, NULL)");
    $stmt->bind_param("ii", $_GET['evento'], $_SESSION['id']);
    if (!$stmt->execute()) {
        $erro_inscricao = 1;
    } else {
        include 'config/funcs.php';
        redirect($evento['nome'], mostrarData($evento['data']));
    }
    $stmt->close();
}


include 'config/funcs.php';
?>

<main>
    <h1>Inscrição para evento</h1>
    <section>
        <form method="post">
            <h2><?= $evento['nome'] ?></h2>
            <p><?= mostrarData($evento['data']) ?> <?= mostrarHora($evento['horario']) ?></p>
            <p>Vagas: <?= $evento['vagas'] ?></p>
            <p><?= mostrarPreco($evento['preco']) ?></p>
            <p><?= $evento['descricao'] ?></p>
            <br>
            <button type="submit" class="btn-saiba-mais" name="inscrever"><span>Inscrever-se</span></button>
        </form>
    </section>
</main>