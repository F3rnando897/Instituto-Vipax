<?php 
include "header.php";
include 'config/conexao.php';


?>
  
  <main id="eventos">
    <?php 
    
    $sql_code = "SELECT * FROM eventos_comuns";
    $query_eventos_comuns = $mysqli->query($sql_code);
    while ($row = $query_eventos_comuns->fetch_assoc()) {
    ?>
    <section class="eventos">
        <img src=<?= '"' . $row['fotos'] . '"'; ?> alt="">
        <div>
            <h2><?= $row['nome']; ?></h2>
            <button type="button" class="btn-saiba-mais">Saiba mais</button>
            <dialog>
              <div class="content">

                <h2><?= $row['nome']; ?></h2>
                <p><?= $row['descricao'];?></p>
              </div>
            </dialog>
        </div>
    </section>
    <?php 
    } 
    ?>
    <!-- <section class="eventos">
        <img src="assets/pizza.jpg">
        <div>
            <h2>Caminhada da lua cheia</h2>
            <button type="button" class="btn-saiba-mais">Saiba mais</button>
            <dialog>
                <h2>Caminhada da lua cheia</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea similique nihil assumenda deleniti corrupti quasi. Esse perferendis suscipit ab magnam! Nihil, explicabo incidunt error sapiente, ex placeat consequuntur commodi aperiam delectus odit hic saepe obcaecati maiores sunt tempore voluptatum aspernatur.</p>
            </dialog>
        </div>
    </section> -->

  </main>

  <script src="js/eventos.js"></script>
<?php 
include "footer.php";
?>