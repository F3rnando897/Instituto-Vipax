<?php 
include "./config/conexao.php";
include "config/funcs.php";
include "header.php";

if (!isset($_SESSION)){
  session_start();
}
?>

  <main id="index">
    <?php 
    $today = date('Y-m-d', time());
    $sql_code = "SELECT eventos_comuns.nome as nome, 
                eventos_comuns.id as id,
                eventos_comuns.descricao as descricao,
                eventos_futuros.id as id_futuro,
                eventos_futuros.data as data,
                eventos_futuros.horario as horario,
                eventos_futuros.preco as preco,
                eventos_futuros.vagas as vagas
                FROM eventos_comuns, eventos_futuros
                WHERE eventos_comuns.id = eventos_futuros.id_eventos_comuns
                AND eventos_futuros.data > '$today'
                ORDER BY eventos_futuros.data;";

    $query_eventos_futuros = $mysqli->query($sql_code);
    if ($query_eventos_futuros->num_rows === 0) {
      echo "<section><p>Nenhum evento marcado</p></section>";
    } else {
      while ($row = $query_eventos_futuros->fetch_assoc()){
    ?>
    <section>
      <div class="infos">
        <h2><?= $row['nome'] ?></h2>
        <p>Data: <?= mostrarData($row['data']) . ' - ' . mostrarHora($row['horario']) ?></p>
        <p>Vagas: <?= $row['vagas'] ?></p>
      </div>
      <div class="actions">
        <a href="eventos.php?evento=<?= $row['id'] ?>" class="saiba-mais">Saiba mais</a>
        <a href="inscricao.php?evento=<?= $row['id_futuro']?>" type="button" class="btn-saiba-mais">Quero participar</a>
      </div>
    </section>
    <?php 
      }
    }
    ?>
  </main>
<script src="js/main.js"></script>
<?php 
include "footer.php";
?>