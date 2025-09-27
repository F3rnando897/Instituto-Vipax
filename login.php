<?php 
include "header.php";
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
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>
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