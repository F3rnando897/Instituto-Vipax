<?php
include "criar_eventos_futuros.php";
include "editar_eventos_futuros.php";
include "excluir_eventos_futuros.php";    
include '../sidebar.php';
include '../../config/conexao.php';
?>
<main>
  <h1>EVENTOS MARCADOS</h1>
  <section class="card">
    <form action="">
        <div class="head">
<h2>Nome do evento:</h2>
  <input type="text">
        </div>
        <div class="body EVM">
<h2>Horario:</h2>
<input type="time">
<h2>Data:</h2>
<input type="date">
<h2>Preço</h2>
<input type="text">
<h2>Vagas</h2>
<input type="number">
        </div>
<div class="foot">
<a href="" class="btn">Desmarcar</a>
<button class="btn">Salvar</button>
</div>
    </form>
  </section>
  



</main>
    
</body>
</html>