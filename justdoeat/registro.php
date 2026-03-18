<?php require_once "header.php"; ?>

<link rel="stylesheet" href="css/form.css">
<div class="form-container">
    <form action="auth.php" method="post" onsubmit="return validaCadastro()">
        <input type="hidden" name="acao" value="registrar">
        <img src="images/icons/logo_justdoeat.png" alt="Logo">
        <h2>Cadastro</h2>

        <div class="form-group">
            <label for="perfil">Tipo de Usuário</label>
            <select name="perfil" id="perfil" required onchange="toggleRestauranteFields()">
                <option value="Cliente">Sou um Cliente</option>
                <option value="Restaurante">Sou um Restaurante</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nome">Nome completo / Nome do Restaurante</label>
            <input type="text" name="nome" id="nome" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required>
        </div>

        <div class="form-group">
            <label for="confirma_senha">Confirmar Senha</label>
            <input type="password" name="confirma_senha" id="confirma_senha" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">
        </div>
        
        <div id="restaurante-fields" style="display: none;">
            <div class="form-group">
                <label for="cpf_cnpj">CPF / CNPJ</label>
                <input type="text" name="cpf_cnpj" id="cpf_cnpj">
            </div>

            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep">
            </div>

            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco">
            </div>

             <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" name="numero" id="numero">
            </div>

            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade">
            </div>

            <div class="form-group">
                <label for="horario_abertura">Horário de Abertura</label>
                <input type="time" name="horario_abertura" id="horario_abertura">
            </div>

            <div class="form-group">
                <label for="horario_fechamento">Horário de Fechamento</label>
                <input type="time" name="horario_fechamento" id="horario_fechamento">
            </div>
        </div>
        
        <button type="submit" class="sb btn-primary">Registrar</button>
        <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
    </form>
</div>

<script>
function toggleRestauranteFields() {
    const perfil = document.getElementById('perfil').value;
    const restauranteFields = document.getElementById('restaurante-fields');
    
    if (perfil === 'Restaurante') {
        restauranteFields.style.display = 'block';
    } else {
        restauranteFields.style.display = 'none';
    }
}

function validaCadastro() {
    const senha = document.getElementById('senha').value;
    const confirmaSenha = document.getElementById('confirma_senha').value;

    if (senha !== confirmaSenha) {
        alert("As senhas não coincidem!");
        return false;
    }
    return true;
}

toggleRestauranteFields();
</script>

<?php require_once "footer.php"; ?>