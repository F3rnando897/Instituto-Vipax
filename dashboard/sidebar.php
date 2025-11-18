<?php 
if (!isset($_SESSION['id'])) session_start();

// Verifica adm
// if (){}

if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
    define('BASE_URL', '/Instituto-Vipax/');
} else {
    define('BASE_URL', '/');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vipax dashboard</title>

    <link rel="stylesheet" href="<?= BASE_URL; ?>/dashboard/dashboard.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/dashboard/painel_de_controle/painel.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/dashboard/objetivos/objetivos.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/dashboard/galeria/galeria.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/dashboard/vagas/vagas.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/dashboard/eventos_marcados/eventos_marcados.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <script src="<?= BASE_URL; ?>/dashboard/sidebar.js" defer></script>
</head>
<body id="dash">

<aside>
    <div class="sandwich">
        <i class="fa-solid fa-bars"></i>
    </div>
    <nav>
        <ul>
            <li><a href="<?= BASE_URL; ?>">Site</a></li>
            <li><a href="<?= BASE_URL; ?>/dashboard">Dashboard</a></li>
            <li><a href="<?= BASE_URL; ?>/dashboard/objetivos">Objetivos</a></li>
            <li><a href="<?= BASE_URL; ?>/dashboard/eventos_comuns">Eventos comuns</a></li>
            <li><a href="<?= BASE_URL; ?>/dashboard/eventos_marcados">Eventos marcados</a></li>
            <li><a href="<?= BASE_URL; ?>/dashboard/galeria">Galeria</a></li>
            <li><a href="<?= BASE_URL; ?>/dashboard/vagas">Vagas</a></li>
        </ul>
    </nav>
</aside>

    
