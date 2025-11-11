<?php
include '../sidebar.php';

?>
    <main>
        <?php 
        if (isset($_POST)) {
            foreach ($_POST as $k => $v) {
                echo $k;
                echo "<br>";
                var_dump($v);
            }
        }
        ?>
        <h1>Objetivos</h1>
        <section class="content objetivos">
            
            <section class="card">
                <form class="card" method="post">
                    <div class="head">
                        <input name="1" type="text" value="Título">
                    </div>
                    <div class="body">
                        <textarea name="text1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non obcaecati odio distinctio tempore in incidunt suscipit commodi placeat asperiores natus!</textarea>
                    </div>
                    <div class="foot">
                        <a class="btn" href="delete.php?id=num">Delete</a>
                        <button class="btn" type="submit">Salvar</button>
                    </div>
                </form>
            </section>
            <section class="card create_objetivo">
                <form method="post">
                    <h3>Criar novo</h3>
                    <button class="btn" name="create_objetivo">+</button>
                </form>
            </section>
        </section>
    </main>
</body>
</html>