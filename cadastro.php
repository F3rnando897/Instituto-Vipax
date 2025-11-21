<?php 
include "header.php";
include "config/conexao.php";

if (isset($_POST['email'])) {
  include 'config/funcs.php';
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);
  $nome = $_POST['nome'];
  $telefone = limpar_texto($_POST['telefone']);
  $verificacao = verify($email, $senha, $nome, $telefone);
  $verificacao['emailUsavel'] = true;


  $ok = true;
  foreach($verificacao as $k => $v) {
    if (!$v) {
      $ok = false;
    }
  }

  // Verificar se ja existe um usuario com esse email
  $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?;");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $stmt->close();
  if ($result->fetch_assoc()) {
    // tem usuario com esse email
    $ok = false;
    $verificacao['emailUsavel'] = false;
  }

  if ($ok) {
    $stmt = $mysqli->prepare("INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss",$nome, $email, $senhaCrip, $telefone);
    if ($stmt->execute()) {
      $stmt->close();
      echo "<script>
      alert('Cadastro realizado com sucesso');
      </script>";

      header("Location: index.php");
    } else {
      $stmt->close();
      $ok = false;
    }
  }
}


?>
  
<main>
  <div class="main-content">
    <div class="container">
      <div class="login-container">
        <div class="login-header">
          <h1>Cadastro</h1>
          <p>Venha se aventurar</p>
        </div>
        <form method="post" id="loginForm">
          <div class="form-group">
            <label for="nome">Nome*</label>
            <?php 
              if (isset($ok) && !$ok && !$verificacao["nome"]) {
                echo "<p class='error'>Nome invalido</p>";
              }

              if (isset($ok) && $verificacao['nome']){
                echo "<input type='text' name='nome' value='{$nome}' required>";
              }else {
                echo "<input type='text' name='nome' required>";
              }
            ?>
          </div>
          <div class="form-group">
            <label for="telefone">Telefone</label>
              <?php 
                if (isset($ok) && !$ok && !$verificacao["telefone"]) {
                  echo "<p class='error'>Telefone invalido</p>";
                }
                if (isset($ok) && $verificacao['telefone']){
                  echo "<input type='tel' name='telefone' value='{$telefone}'>";
                } else {
                  echo "<input type='tel' name='telefone'>";
                }
              ?>
          </div>
          <div class="form-group">
            <label for="email">E-mail*</label>
              <?php 
                if (isset($ok) && !$ok && !$verificacao["email"]) {
                  echo "<p class='error'>E-mail invalido</p>";
                }else if (isset($ok) && !$ok && !$verificacao["emailUsavel"]) {
                  echo "<p class='error'>E-mail em uso</p>";
                }
                if (isset($ok) && $verificacao['email']){
                  echo "<input type='email' name='email' value='{$email}' required>";
                } else{
                  echo "<input type='email' name='email' required>";
                }
              ?>
          </div>
          <div class="form-group">
            <label for="senha">Senha*</label>
            <?php 
              if (isset($ok) && !$ok && !$verificacao["senha"]) {
                echo "<p class='error'>Senha invalido</p>";
              }
              if (isset($ok) && $verificacao['senha']){
                echo "<input type='password' name='senha' value='{$senha}' required>";
              } else {
                echo "<input type='password' name='senha' required>";
              }
            ?>
                        
          </div>
            <button type="submit" class="login-btn">Criar</button>
        </form>
        <div class="register-link">
          <p>Ja tem conta? <a href="login.php">Login</a></p>
        </div>
      </div>
    </div>
 </div>
  </main>

<?php 
include "footer.php";
?>