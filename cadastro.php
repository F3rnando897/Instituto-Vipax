<?php 
include "header.php";
?>
  
  <main>
 <div class="main-content">
        <div class="container">
            <div class="login-container">
                <div class="login-header">
                    <h1>Cadastro</h1>
                    <p>Venha se aventurar</p>
                </div>
                <form id="loginForm">
                    <div class="form-group">
                        <label for="nome">Nome*</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                         <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="tel" id="telefone" name="telefone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail*</label>
                        <input type="email" id="email" name="email" required>
                    </div>
 
                    <div class="form-group">
                        <label for="password">Senha*</label>
                        <input type="password" id="password" name="password" required>
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