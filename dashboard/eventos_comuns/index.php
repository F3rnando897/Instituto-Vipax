<?php
include '../sidebar.php';
include '../../config/conexao.php';

?>
<?php 

if (isset($_POST['create_evento_comum'])) {
    $stmt = $mysqli->prepare("INSERT INTO eventos_comuns (nome, descricao) VALUES ('', '')");
    $stmt->execute();
    $stmt->close();
    unset($_POST['create_evento_comum']);
}

if (isset($_POST)) {
    foreach ($_POST as $k => $v) {
        if (str_starts_with($k, "text")) continue;
        if (!is_numeric($k)) continue;

        $stmt = $mysqli->prepare("UPDATE eventos_comuns SET nome = ?, descricao = ? WHERE id = ?");
        $stmt->bind_param("ssi", $v, $_POST['desc'.$k], $k);        
        $stmt->execute();
        $stmt->close();
    }
}
?>
    <main>
        <h1>Eventos comuns</h1>
        <section class="content objetivos">
            <?php 
            $stmt = $mysqli->prepare("SELECT * FROM eventos_comuns");
            $stmt->execute();
            $response = $stmt->get_result();
            $stmt->close();
            while($row = $response->fetch_assoc()){

            ?>
            <section class="card">
                <form class="card" method="post">
                    <div class="head">
                        <input name="<?= $row['id'] ?>" 
                        type="text" 
                        value="<?= $row['nome'] ?>"
                        placeholder="Nome evento">
                    </div>
                    <div class="body">
                        <textarea name="desc<?= $row['id'] ?>"
                        placeholder="Descricao..."><?= $row['descricao'] ?></textarea>
                    </div>
                    <div class="foot">
                        <a class="btn" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
                        <button class="btn" type="submit">Salvar</button>
                    </div>
                </form>
            </section>
            <?php } ?>
            <section class="card create">
                <form method="post">
                    <h3>Criar novo</h3>
                    <button class="btn" name="create_evento_comum">+</button>
                </form>
            </section>
        </section>
    </main>
    <script src="objetivos.js"></script>
</body>
</html>