<?php 
include "header.php";
include "config/conexao.php";
?>

  <main>
    <section class="galeria">
      <?php 
        $ids = [];
        $sql_code = "SELECT * FROM galeria";
        $query_galeria = $mysqli->query($sql_code);
        while ($row = $query_galeria->fetch_assoc()){
          $ids[] = $row['id'];
      ?>
      <a href=<?= "galeria.php?img=" . $row['id']; ?>>
        <img src=<?= $row['path']; ?>
        alt="Imagem">
      </a>
      <?php } ?>
    </section>
  </main>

  <?php if (isset($_GET['img'])){
    $stmt = $mysqli->prepare("SELECT path from galeria WHERE id = ?");
    $stmt->bind_param('s', $_GET['img']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $idsPos = array_search($_GET['img'], $ids);
    var_dump($ids);
    var_dump($idsPos);
    ?>
  <div class="modal">
    <a href="galeria.php" class="fechar">&times;</a>
    <a href="galeria.php?img=<?= $ids[$idsPos-1];?>" class="prev">&#10094;</a>
    
    <a href="galeria.php?img=<?php 
    if ($idsPos != count($ids) - 1){
      echo $ids[$idsPos+1];
    } else {
      echo $ids[0];
    }
    ?>" class="next">&#10095;</a>
    <img src=<?= "'{$row['path']}'";?> alt="Floresta 1">
  </div>
  <?php }?>

<?php 
include "footer.php";
?>

<script>

const modal = document.querySelector(".modal");
if (modal) {
  document.addEventListener('keyup', e => {
    if (e.key === `Escape`) {
      window.location.href = "galeria.php";
    }
  })
}

</script>