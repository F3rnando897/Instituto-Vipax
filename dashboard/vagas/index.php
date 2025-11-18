<?php
include '../sidebar.php';
include '../../config/conexao.php';
include '../../config/funcs.php';

?>
    <main>
        <h1>Vagas</h1>
        <section class="content">
            <?php 
            $stmt = $mysqli->prepare("SELECT 
                        eventos_futuros.id as id,
                        eventos_comuns.nome as nome,
                        eventos_futuros.data as data
                        FROM eventos_futuros, eventos_comuns
                        WHERE data > CURDATE() 
                        AND eventos_futuros.id_eventos_comuns = eventos_comuns.id");
            $stmt->execute();
            $response = $stmt->get_result();    


            while ($row = $response->fetch_assoc()) {
            ?>
            <section class="card">
                <h2><?= $row['nome'] ?></h2>
                <p><?= mostrarData($row['data']) ?></p>
                <p>
                <?php 
                // Quantidade de solicitações
                $stmt2 = $mysqli->prepare("SELECT COUNT(*) as total 
                            FROM vagas_reservadas
                            WHERE id_evento = ?
                            AND situacao IS NULL");
                $stmt2->bind_param("i", $row['id']);
                $stmt2->execute();
                $response2 = $stmt2->get_result();
                echo $response2->fetch_assoc()['total'];
                
                ?>    
                solicitações</p>
                <a href="lista.php?id=<?= $row['id'] ?>">Gerenciar ></a>
            </section>
            <?php } ?>
        </section>
    </main>
</body>
</html>