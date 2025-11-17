<!DOCTYPE html>
<html lang="pt-Br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vipax</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/eventos.css">
  <link rel="stylesheet" href="css/galeria.css">
  <link rel="stylesheet" href="css/login.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

  <header>
    <div>
      <a href="index.php">
        <h1>Vipax</h1>
      </a>
      <?php 
      if (!isset($_SESSION)){
        session_start();
      }
      if (isset($_SESSION['nome'])) {
        echo "<p>Bem vindo, ". $_SESSION['nome'] ."</p>";
      }
      ?>
      
    </div>
    <ul>
      <li><a href="index.php">Início</a></li>
      <li><a href="eventos.php">Eventos</a></li>
      <li><a href="objetivos.php">Objetivos</a></li>
      <li><a href="galeria.php">Galeria</a></li>
      <?php 
      if (!isset($_SESSION['nome'])) {
        echo "<li><a href='login.php'>Login</a></li>";
      } else {
        echo "<li><a href='logout.php'>Sair</a></li>";
      }

      if (isset($_SESSION['nivel']) && $_SESSION['nivel'] == 'admin') {
        echo "<li><a href='dashboard/'>Dashboard</a></li>";
      }
      ?>

    </ul>
  </header>