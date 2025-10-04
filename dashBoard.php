<?php
include "config/conexao.php";

// Processa o formulário de cadastro de eventos comuns
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_evento'], $_POST['descricao_evento'])) {
    $nome = $_POST['nome_evento'];
    $descricao = $_POST['descricao_evento'];
    $sql = "INSERT INTO eventos_comuns (nome, descricao) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $nome, $descricao);

    if ($stmt->execute()) {
        header("Location: dashBoard.php");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
}

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


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dashBoard.css">
    <link rel="stylesheet" href="css/style.css">
</head>


<!-- Sidebar -->
<div class="sidebar">
    <h2 style="text-align:center;">Dashboard</h2>
    <a href="#">Início</a>
    <a href="#">Usuários</a>
    <a href="#">Relatórios</a>
    <a href="#">Configurações</a>
    <a href="#">Sair</a>
</div>

<div class="main-content" id="main-content">
    <h1>Bem-vindo à Dashboard!</h1>
    <!-- Cadastro de eventos comuns -->
    <div id="inicio" class="content-section">
        <h2>Cadastro de eventos</h2>
        <br>
        <form action="dashboard.php" method="POST">
            <label for="nome_evento">Nome do Evento:</label>
            <input type="text" id="nome_evento" name="nome_evento" required>

            <label for="descricao_evento">Descrição do Evento:</label>
            <textarea id="descricao_evento" name="descricao_evento" required></textarea>

            <label for="data_evento">Fotos: </label>
            <input type="file" id="fotos_evento" name="fotos_evento">


            <button type="submit">Cadastrar Evento</button>
        </form>
    </div>

    <!-- Exibição dos eventos comuns cadastrados -->
    <?php 
    $sql_code = "SELECT * FROM eventos_comuns";
    $query_eventos_comuns = $mysqli->query($sql_code);

    while ($row = $query_eventos_comuns->fetch_assoc()) {
    
        $id_galeria = $row['id_galeria'];
        $sql_code_foto = "SELECT `path` FROM galeria WHERE id = $id_galeria";
        $query_eventos_foto = $mysqli->query($sql_code_foto);
    ?>
    <section class="eventos">
    <div>
        <h2><?= $row['nome']; ?></h2>
        <p><?= $row['descricao'];?></p>
        <?php 
        while ($foto = $query_eventos_foto->fetch_assoc()) {
        ?>
            <img src="<?= $foto['path']; ?>" alt="Foto do Evento" style="width:200px; height:auto; margin-right:10px;">
        <?php 
        } 
        ?>
    </div>
</section>
<?php 
} 
?>
    
    <!-- Cadastro de eventos futuros -->
    <div id="inicio" class="content-section">
        <h2>Cadastro de eventos</h2>
        <br>
        <form action="processa_evento.php" method="POST">
            <label for="nome_evento">Nome do Evento:</label>
            <input type="text" id="nome_evento_futuro" name="nome_evento_futuro" required>

            <label for="descricao_evento">Descrição do Evento:</label>
            <textarea id="descricao_evento_futuro" name="descricao_evento_futuro" required></textarea>

            <label for="data_evento">Fotos: </label>
            <input type="file" id="fotos_evento" name="fotos_evento[]" multiple required>


            <button type="submit">Cadastrar Evento</button>
        </form>
    </div>
    

</div>

