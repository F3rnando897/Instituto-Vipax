<?php
include '../sidebar.php';
include '../../config/conexao.php';

?>
<?php
if (isset($_POST['create_foto'])) {
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $uploadTmp = $_FILES['foto']['tmp_name'];
        $originalName = basename($_FILES['foto']['name']);
        $safeName = time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $originalName);

        $uploadsDir = __DIR__ . '/../../galeria/uploads';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0755, true);
        }

        $targetPath = $uploadsDir . DIRECTORY_SEPARATOR . $safeName;
            if (move_uploaded_file($uploadTmp, $targetPath)) {
            $dbPath = 'galeria/uploads/' . $safeName;
            $stmt = $mysqli->prepare("INSERT INTO galeria (path, id_eventos_comuns) VALUES (?, NULL)");
            if ($stmt) {
                $stmt->bind_param('s', $dbPath);
                if (!$stmt->execute()) {
                    $dbErr = $mysqli->error;
                    echo '<div class="error">Erro ao salvar imagem: ' . htmlspecialchars($dbErr) . '</div>';
                }
                $stmt->close();
            } else {
                $dbErr = $mysqli->error;
                echo '<div class="error">Erro na preparação da query: ' . htmlspecialchars($dbErr) . '</div>';
            }
        }
    }

    header('Location: index.php');
    exit;
}

?>
<body>
    <main>
        <h1>Galeria</h1>
        <section class="contentgaleria">
            <section class="card create">
                <form method="post" enctype="multipart/form-data">
                    <h3>Adicionar Fotos</h3>
                    <input type="file" name="foto" accept="image/*" required />
                    <button type="submit" class="btn" name="create_foto">Enviar</button>
                </form>
            </section>

            <section class="gallery-display">
                <h3>Galeria</h3>
                <div class="gallery-grid">
                    <?php
                    $sql = "SELECT * FROM galeria ORDER BY id DESC";
                    $res = $mysqli->query($sql);
                    if ($res) {
                        while ($row = $res->fetch_assoc()) {
                            $imgPath = '../../' . $row['path']; // 'galeria/uploads/filename'
                            ?>
                            <div class="photo-card">
                                <img src="<?php echo $imgPath; ?>" alt="Foto da Galeria">
                            </div>
                            <?php
                        }
                        $res->free();
                    } else {
                        echo '<p>Nenhuma foto encontrada.</p>';
                    }
                    ?>
                </div>
            </section>
        </section>
    </main>
    <script src="galeria.js"></script>
</body>
</html>