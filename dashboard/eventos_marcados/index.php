<?php
include '../sidebar.php';
include '../../config/conexao.php';
include '../../config/funcs.php';

if (isset($_POST['novo_evento'])) {
  $day = 24*60*60;
  $oneWeek = date("Y-m-d", time() + 7 * $day);
  $stmt = $mysqli->prepare("INSERT INTO eventos_futuros (id_eventos_comuns, horario, data, preco, vagas) 
  VALUES (?,'12:00',?, '10000', '20')");
  $stmt->bind_param("is", $_POST['novo_evento'], $oneWeek);
  $stmt->execute();
  $stmt->close();
}

if (isset($_POST['save'])) {
  $id = $_POST['save'];
  $data = $_POST['data'.$id];
  $horario = $_POST['horario'.$id];
  $preco = limpar_preco($_POST['preco'.$id]) * 100;
  $vagas = intval($_POST['vagas'.$id]);
  
  if (!is_numeric($id)
      || $preco < 0
      || $vagas < 1) {
    unset($_POST);
    header("Location: index.php");
  }

  $stmt = $mysqli->prepare("UPDATE eventos_futuros SET data = ?, horario = ?, preco = ?, vagas = ? WHERE id = ?");
  $stmt->bind_param("ssiii", $data, $horario, $preco, $vagas, $id);
  $stmt->execute();
  $stmt->close();
}
?>
<main id="marcados">
  <h1>EVENTOS MARCADOS</h1>
  <section>

    <?php 
  $today = date("Y-m-d", time());
  $stmt = $mysqli->prepare("SELECT eventos_comuns.nome as nome, eventos_futuros.id as id, eventos_futuros.horario as horario, eventos_futuros.data as data, eventos_futuros.preco as preco, eventos_futuros.vagas as vagas FROM eventos_comuns, eventos_futuros WHERE eventos_futuros.id_eventos_comuns = eventos_comuns.id AND eventos_futuros.data > '$today'");
  $stmt->execute();
  $response = $stmt->get_result();
  $stmt->close();
  
  while ($row = $response->fetch_assoc()) {
    
  ?>
  <section class="card">
    <form method="post">
      <div class="head">
        <h2> <?= $row['nome'] ?> </h2>
      </div>
      <div class="body EVM">
        <table>
          <tr>
            <td><label>Horario</label></td>
            <td>
              <input 
              type="time" 
              name="horario<?= $row['id']?>"
              value="<?= $row['horario'] ?>" />
            </td>
          </tr>
          <tr>
            <td><label>Data</label></td>
            <td><input 
              type="date"
              name="data<?= $row['id']?>"
              value="<?= $row['data']?>" />
            </td>
          </tr>
          <tr>
            <td><label>Preço</label></td>
            <td>
              <input 
              type="text"
              name="preco<?= $row['id']?>"
              value="<?= mostrarPreco($row['preco'], false) ?>" />
            </td>
          </tr>
          <tr>
            <td><label>Vagas</label></td>
            <td>
              <input 
              type="number"
              min="1"
              name="vagas<?= $row['id']?>"
              value="<?= $row['vagas'] ?>" />
            </td>
          </tr>
        </table>
      </div>
      <div class="foot">
        <a href="desmarcar.php?id=<?= $row['id'] ?>" class="btn">Desmarcar</a>
        <button class="btn" name="save" value="<?= $row['id'] ?>">Salvar</button>
      </div>
    </form>
  </section>
  <?php 
  }
  ?>
  </section>
  <section class="card create">
    <form method="post">
      <h3>Marcar evento</h3>
      <div>

        <?php 
        selectEventos("novo_evento", false);
        ?>
      <button class="btn">+</button>
    </div>
    </form>
  </section>
</main>
    
</body>
</html>