<?php 
include '../sidebar.php';
include '../../config/conexao.php';

if (!is_numeric($_GET['id'])) {
  header("Location: index.php");
  exit();
}


if (isset($_POST['delete'])) {
    $id = $_GET['id'];
    
    $stmt = $mysqli->prepare("DELETE FROM eventos_futuros WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    
    header("Location: index.php");
    exit();
 
}

?>

<main id="delete_objetivo">
    <h1>Deletar objetivo</h1>
    <section class="card">
        <form method="post" >
            <h2>Voce tem certeza?</h2>
            <button type="submit" class="btn" name="delete">Apagar</button>
            <a href="index.php" class="cancel">Cancelar</a>
        </form>
    </section>
</main>