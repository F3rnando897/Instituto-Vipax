<?php 
include "header.php";
include 'config/conexao.php';
if (!isset($_SESSION)){
  session_start();
}
?>
  
  <main id="eventos">
    <?php 
    
    $sql_code = "SELECT eventos_comuns.nome AS nome,
                eventos_comuns.id AS id,
                galeria.path AS foto,
                eventos_comuns.descricao AS descricao 
                FROM eventos_comuns, galeria 
                WHERE eventos_comuns.id_galeria = galeria.id 
                OR galeria.id_eventos_comuns = eventos_comuns.id;";
    $query_eventos_comuns = $mysqli->query($sql_code);
    while ($row = $query_eventos_comuns->fetch_assoc()) {
    ?>
    <section class="eventos">
        <img src=<?= '"' . $row['foto'] . '"'; ?> alt="">
        <div class="conteudo">
          <h2><?= $row['nome']; ?></h2>
          <a href="eventos.php?evento=<?= $row['id'] ?>" type="button" class="btn-saiba-mais">Saiba mais</a>
          <div class='modal <?php 
            if (isset($_GET['evento']) && $_GET['evento'] == $row['id']) {
              unset($_GET);
              echo "open";
            }?>'>
              <div class="content">
                <h2><?= $row['nome']; ?></h2>
                <a href="eventos.php">&times</a>
                <p><?= $row['descricao'];?></p>
              </div>
              <?php 
              $sql_code = "SELECT * FROM galeria WHERE id_eventos_comuns = ". $row['id'];
              $query_galeria = $mysqli->query($sql_code);
              if ($query_galeria->num_rows > 0) {
              ?>
              <div class="galeria">
                <?php while ($foto = $query_galeria->fetch_assoc()){?>
                
                  <img src="<?= $foto['path'] ?>">

                <?php }?>
              </div>
              <?php } ?>
            </div>
        </div>
    </section>
    <?php 
    } 
    ?>

  </main>

  <script src="js/eventos.js"></script>
<?php 
include "footer.php";
?>