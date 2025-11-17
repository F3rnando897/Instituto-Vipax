<?php 
include 'sidebar.php';
include '../config/conexao.php';


$data = [
    "objetivos" => 0,
    "galeria" => 0,
    "eventos_comuns" => 0,
    "vagas_reservadas" => 0,
    "eventos_futuros" => 0
];

foreach ($data as $table => $v) {
    $sql = "SELECT count(*) as qnt FROM $table";
    if ($table == "eventos_futuros") {
        $today = date("Y-m-d", time());
        $sql = $sql . " WHERE data > '$today'";
    } else if ($table == "vagas_reservadas") {
        $sql = $sql . " WHERE situacao IS NULL";
    }
    
    $result = $mysqli->query($sql)->fetch_assoc();
    $data[$table] = $result['qnt'];
}

?>
    <main>
        <h1>DashBoard</h1>

        <section class="content">
            <section class="card">
                <div class="head">
                    <h2>Objetivos</h2>
                </div>
                <div class="body">
                    <p><?=  $data['objetivos'] ?> objetivos salvos</p>
                    <a href="objetivos/index.php">Visualizar</a>

                </div>
            </section>

            <section class="card">
                <div class="head">
                    <h2>Galeria</h2>
                </div>
                <div class="body">
                    <p><?=  $data['galeria'] ?> fotos salvas</p>
                    <a href="galeria/index.php">Visualizar</a>

                </div>
            </section>

            <section class="card">
                <div class="head">
                    <h2>Eventos comuns</h2>
                </div>
                <div class="body">
                    <p><?=  $data['eventos_comuns'] ?> eventos existentes</p>
                    <a href="eventos_comuns/index.php">Visualizar</a>

                </div>
            </section>

            <section class="card">
                <div class="head">
                    <h2>Eventos marcados</h2>
                </div>
                <div class="body">
                    <p><?=  $data['eventos_futuros'] ?> eventos marcados</p>
                    <a href="eventos_marcados/index.php">Visualizar</a>

                </div>
            </section>
            <section class="card">
                <div class="head">
                    <h2>Vagas</h2>
                </div>
                <div class="body">
                    <p><?=  $data['vagas_reservadas'] ?> pedidos de inscrição</p>
                    <a href="vagas/index.php">Visualizar</a>

                </div>
            </section>
        </section>
    </main>
</body>
</html>