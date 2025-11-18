<?php 
include '../sidebar.php';
include '../../config/conexao.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit();
}


?>

<main>

    <section class="content vagas">
        <h1><a href="index.php">←</a> Solicitacoes</h1>
        <form action="lista.php">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
            <input type="text" name="q" placeholder="Buscar...">
            <button class="btn" type="submit">Buscar</button>
        </form>
        <?php 
        $stmt = $mysqli->prepare("SELECT 
                    vagas_reservadas.id as id,
                    usuarios.nome as nome, 
                    usuarios.email as email
                    FROM vagas_reservadas, usuarios
                    WHERE id_evento = ?
                    AND usuarios.id = vagas_reservadas.id_usuario
                    AND situacao IS NULL");
        $stmt->bind_param("i", $_GET['id']);
        $stmt->execute();
        $response = $stmt->get_result();

        if ($response->num_rows === 0) {
            echo "<p>Nenhuma solicitação.</p>";
        }

        while ($row = $response->fetch_assoc()) {
        ?>

        <section class="line">
            <div class="head">
                <h2><?= $row['nome'] ?></h2>
                <p><?= $row['email'] ?></p>
            </div>
            <div class="foot">
                <a href="aprovar.php?id=<?= $row['id'] ?>&id_evento=<?= htmlspecialchars($_GET['id']) ?>" class="btn">Aprovar</a>
                <a href="reprovar.php?id=<?= $row['id'] ?>&id_evento=<?= htmlspecialchars($_GET['id']) ?>" class="btn">Reprovar</a>
            </div>
        </section>
        <?php } ?>

        <h2>Lista de presença</h2>
        <?php 
        $stmt = $mysqli->prepare("SELECT 
                    vagas_reservadas.id as id,
                    usuarios.nome as nome, 
                    usuarios.email as email
                    FROM vagas_reservadas, usuarios
                    WHERE id_evento = ?
                    AND usuarios.id = vagas_reservadas.id_usuario
                    AND situacao = 'aprovado'");
        $stmt->bind_param("i", $_GET['id']);
        $stmt->execute();
        $response = $stmt->get_result();

        if ($response->num_rows === 0) {
            echo "<p>Nenhum aprovado.</p>";
        }

        while ($row = $response->fetch_assoc()) {
        ?>

        <section class="line">
            <div class="head">
                <h2><?= $row['nome'] ?></h2>
                <p><?= $row['email'] ?></p>
            </div>
            <div class="foot">
                <a href="reprovar.php?id=<?= $row['id'] ?>&id_evento=<?= htmlspecialchars($_GET['id']) ?>" class="btn">Excluir</a>
            </div>
        </section>
        <?php } ?>
    </section>

</main>