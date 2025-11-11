<?php 
include '../sidebar.php';

if (!is_numeric($_GET['id'])) {
    header("Location: index.php");
}

if (isset($_POST['delete'])) {
    include '../../config/conexao.php';
    
    $stmt = $mysqli->prepare("DELETE FROM galeria WHERE id_eventos_comuns = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $stmt->close();
    
    $stmt = $mysqli->prepare("DELETE FROM eventos_comuns WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");

}

?>

<main id="delete">
    <h1>Deletar evento comum</h1>
    <section class="card">
        <form method="post" >
            <h2>Voce tem certeza?</h2>
            <button type="submit" class="btn" name="delete">Apagar</button>
            <a href="index.php" class="cancel">Cancelar</a>
        </form>
    </section>
</main>