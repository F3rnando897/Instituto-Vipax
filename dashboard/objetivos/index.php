<?php
include '../sidebar.php';
include '../../config/conexao.php';

?>
<?php 

if (isset($_POST['create_objetivo'])) {
    $stmt = $mysqli->prepare("INSERT INTO objetivos (titulo, texto) VALUES ('', '')");
    $stmt->execute();
    $stmt->close();
}

if (isset($_POST)) {
    foreach ($_POST as $k => $v) {
        if ($k == "create_objetivo") continue;
        if (str_starts_with($k, "text")) continue;
        if (!is_numeric($k)) continue;

        $stmt = $mysqli->prepare("UPDATE objetivos SET titulo = ?, texto = ? WHERE id = ?");
        $stmt->bind_param("ssi", $v, $_POST['text'.$k], $k);        
        $stmt->execute();
        $stmt->close();
    }
}
?>
    <main>
        <h1>Objetivos</h1>
        <section class="content objetivos">
            <?php 
            $stmt = $mysqli->prepare("SELECT * FROM objetivos");
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
                        value="<?= $row['titulo'] ?>"
                        placeholder="Título">
                    </div>
                    <div class="body">
                        <textarea name="text<?= $row['id'] ?>"
                        placeholder="Texto..."><?= $row['texto'] ?></textarea>
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
    <script src="ecomuns.js"></script>
</body>
</html>