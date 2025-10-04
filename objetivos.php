<?php 
include "header.php";
include "config/conexao.php";
?>
    <main id="objetivos">
      <?php 
      $sql_code = "SELECT * FROM objetivos";
      $query_objetivos = $mysqli->query($sql_code);
      while ($row = $query_objetivos->fetch_assoc()) {
      ?>
      <section class="objetivos">
        <h2><?= $row['titulo'];?></h2>
        <p><?= $row['texto'];?></p>
      </section>
      <?php } ?>
    </main>
<?php 
include "footer.php";
?>