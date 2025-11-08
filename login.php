<?php 
include "header.php";
if (!isset($_SESSION)){
  session_start();
}
if (isset($_POST['email'])) {
  include 'config/funcs.php';
  include 'config/conexao.php';
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $verifySenha = true;
  $hasUser = true;
  
  $verificacao = verify($email, $senha);
  $ok = true;
  foreach($verificacao as $v) {
    if (!$v) {
      $ok = false;
    }
  }

  if ($ok) {
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?;");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if (!$user) {
      // usuario nao existente
      $hasUser = false;
    } else if (password_verify($senha, $user['senha'])) {
      // usuario existe e a senha esta correta
      if (!isset($_SESSION)){
        session_start();
      }
      $_SESSION['id'] = $user['id'];
      $_SESSION['nome'] = $user['nome'];
      header("Location: index.php");
    } else {
      // senha incorreta
      $verifySenha = false;
    }
  }
}
?>
  
<main>
  <div class="main-content">
    <div class="container">
      <div class="login-container">
        <div class="login-header">
          <h1>Login</h1>
          <p>Acesse sua conta para continuar</p>
        </div>
        <form id="loginForm" method="POST">
          <div class="form-group">
            <label for="email">E-mail</label>
            <?php 
                if (isset($ok) && !$ok && !$verificacao["email"]) {
                  echo "<p class='error'>E-mail invalido</p>";
                } else if (isset($hasUser) && !$hasUser) {
                  echo "<p class='error'>E-mail não cadastrado</p>";
                }
                if (isset($ok) && $verificacao['email']){
                  echo "<input type='email' name='email' value='{$email}' required>";
                } else{
                  echo "<input type='email' name='email' required>";
                }
              ?>
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <?php 
              if (isset($ok) && !$ok && !$verificacao["senha"]) {
                echo "<p class='error'>Senha invalido</p>";
              } else if(isset($verifySenha) && !$verifySenha) {
                echo "<p class='error'>Senha incorreta</p>";
              }
              ?>
            <input type='password' name='senha' required>
          </div>
          <button type="submit" class="login-btn">Entrar</button>
        </form>
        <div class="register-link">
          <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
        </div>
      </div>
    </div>
  </div>
</main>

<?php 
include "footer.php";
?>