<?php

// Processa o formulário de cadastro de eventos comuns
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_evento'], $_POST['descricao_evento'])) {
    $nome = $_POST['nome_evento'];
    $descricao = $_POST['descricao_evento'];
    $sql = "INSERT INTO eventos_comuns (nome, descricao) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $nome, $descricao);

    if ($stmt->execute()) {
        header("Location: dashBoard.php");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
}

// Processa o upload da foto do evento comum
if(isset($_FILES['fotos_evento'])){
    $fotos = $_FILES['fotos_evento'];
    if($fotos['size'] > 2097152){
        echo "O arquivo é muito grande. Máximo permitido é 2MB.";
        
    }  
    if($fotos['error']){
        echo "Erro ao enviar o arquivo. Código do erro: " . $fotos['error'];
        exit();
    }  

    $pasta = "uploads/";
    $nomeDoArquivo = $fotos['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    if($extensao != "jpg" && $extensao != "jpeg" && $extensao != "png"){
        die( "Apenas arquivos JPG, JPEG e PNG são permitidos.");
    }

    $deu_certo = move_uploaded_file($fotos['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);
    
}

?>