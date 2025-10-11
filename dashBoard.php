<?php
include "config/conexao.php";
include "dashboard/eventos_comuns/eventos_comuns.php";
include "dashboard/eventos_futuros/eventos_futuros.php";
include "dashboard/objetivos/objetivos.php";

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
    <?php var_dump($_POST); ?>
    <h1>Bem-vindo à Dashboard!</h1>
    <!-- Cadastro de eventos comuns -->
    <div id="inicio" class="content-section">
        <h2>Cadastro de eventos</h2>
        <br>
        <form enctype="multipart/form-data" action="dashboard.php" method="POST">
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
        <button type="submit" name="btn-editar-evento-comum" value="<?= $row['id']; ?>">Editar</button>
        <button type="submit" name="btn-excluir-evento-comum" value="<?= $row['id']; ?>">Excluir</button>
    </div>
</section>
<?php 
} 
?>
    

    <!-- Cadastro de objetivos -->
    <div id="inicio" class="content-section">
        <h2>Cadastro Objetivo</h2>
        <br>
        <form action="dashboard.php" method="POST">
            <label for="nome_evento">Titulo do Objetivo:</label>
            <input type="text" id="titulo_objetivo" name="titulo_objetivo">

            <label for="descricao_evento">Descrição do Evento:</label>
            <textarea id="descricao_objetivo" name="descricao_objetivo"></textarea>

            <button type="submit">Cadastrar Objetivo</button>
        </form>
    </div>

    <!-- Exibição dos objetivos cadastrados -->
    <div class="content-section">
        <h2>Objetivos Cadastrados</h2>
        <?php
        $sql_code = "SELECT * FROM objetivos";
        $query_objetivos = $mysqli->query($sql_code);

        while ($row = $query_objetivos->fetch_assoc()) {
        ?>
            <div class="objetivo">
                <h3><?= $row['titulo']; ?></h3>
                <p><?= $row['texto']; ?></p>
                
                <form action="dashboard.php" method="POST">
                    <button type="submit" name="btn-editar-objetivo" value="<?= $row['id']; ?>">Editar</button>
                </form>
                <form action="dashboard.php" method="POST">
                    <button type="submit" name="btn-excluir-objetivo" value="<?= $row['id']; ?>">Excluir</button>
                </form>

            </div>
        <?php
        }
        
        ?>

        
    

</div>

<div class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Editar Evento</h2>
        <form>
            <label for="edit_nome_evento">Nome do Evento:</label>
            <input type="text" id="edit_nome_evento" name="edit_nome_evento" required>

            <label for="edit_descricao_evento">Descrição do Evento:</label>
            <textarea id="edit_descricao_evento" name="edit_descricao_evento" required></textarea>

            <button type="submit">Salvar Alterações</button>
        </form>
    </div>

</div>
