<?php require_once "header.php"; ?>

<link rel="stylesheet" href="css/form.css"> <div class="form-container">
    <form action="auth.php" method="post">
        <input type="hidden" name="acao" value="login">
        <img src="images/icons/logo_justdoeat.png" alt="Logo">
        <h4>Entre com a sua conta!</h4>

        <?php if(isset($_GET['erro'])): ?>
            <p class="error-message">Usuário ou senha inválidos.</p>
        <?php endif; ?>
        <?php if(isset($_GET['sucesso'])): ?>
            <p class="success-message">Cadastro realizado com sucesso! Faça o login.</p>
        <?php endif; ?>

        <div class="form-group">
            <label for="email">Insira o E-mail</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="senha">Insira a Senha</label>
            <input type="password" name="senha" id="senha" required>
        </div>
        
        <button type="submit" class="sb btn-primary">Entrar</button>

        <div class="form-links">
            <a href="registro.php">Criar conta</a>
            <a href="#">Esqueceu a senha?</a>
        </div>
    </form>
</div>

<?php require_once "footer.php"; ?>