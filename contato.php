<?php

require_once 'includes/conexao.php';

echo "<h1>Reset de Senha do Administrador</h1>";


$admin_email = 'admin@justdoeat.com';
$admin_nome = 'Administrador';
$nova_senha_admin = 'admin123'; 

$novo_hash = password_hash($nova_senha_admin, PASSWORD_DEFAULT);

if (!$novo_hash) {
    die("<p style='color:red;'>ERRO CRÍTICO: A função password_hash() não está funcionando no seu servidor.</p>");
}

echo "<p>Preparando para resetar o usuário com o e-mail: <strong>" . $admin_email . "</strong></p>";
echo "<p>A nova senha será: <strong>" . $nova_senha_admin . "</strong></p>";

$sql = "INSERT INTO usuarios (nome, email, senha, perfil) 
        VALUES (?, ?, ?, 'Admin')
        ON DUPLICATE KEY UPDATE 
        senha = VALUES(senha), 
        perfil = 'Admin', 
        nome = VALUES(nome)";

$stmt = $conexao->prepare($sql);
if (!$stmt) {
    die("<p style='color:red;'>ERRO ao preparar a query: " . $conexao->error . "</p>");
}


$stmt->bind_param("sss", $admin_nome, $admin_email, $novo_hash);


if ($stmt->execute()) {
    echo "<h2 style='color:green;'>SUCESSO!</h2>";
    echo "<p>O usuário administrador foi criado/resetado com sucesso.</p>";
    echo "<p>Por favor, tente fazer o login novamente usando a nova senha.</p>";
} else {
    echo "<h2 style='color:red;'>FALHA!</h2>";
    echo "<p>Não foi possível executar a query no banco de dados: " . $stmt->error . "</p>";
}

$stmt->close();
$conexao->close();

echo "<hr><p><strong>IMPORTANTE:</strong> Por segurança, após conseguir fazer o login, apague este arquivo (admin_reset.php) do seu servidor.</p>";
?>