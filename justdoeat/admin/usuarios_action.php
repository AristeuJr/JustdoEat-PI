<?php
require_once '../includes/funcoes.php';
require_once '../includes/conexao.php';
verifica_acesso(['Admin']);

$acao = $_REQUEST['acao'] ?? ''; // Pega a ação via GET ou POST

switch ($acao) {
    case 'adicionar':
    case 'editar':
        $id = $_POST['id'] ?? null;
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $perfil = $_POST['perfil'];
        $senha = $_POST['senha'];

        if ($acao == 'adicionar') {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, perfil, senha) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nome, $email, $perfil, $senha_hash);
        } else { // Editar
            if (!empty($senha)) {
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                $stmt = $conexao->prepare("UPDATE usuarios SET nome=?, email=?, perfil=?, senha=? WHERE id=?");
                $stmt->bind_param("ssssi", $nome, $email, $perfil, $senha_hash, $id);
            } else {
                $stmt = $conexao->prepare("UPDATE usuarios SET nome=?, email=?, perfil=? WHERE id=?");
                $stmt->bind_param("sssi", $nome, $email, $perfil, $id);
            }
        }
        $stmt->execute();
        $stmt->close();
        break;

    case 'excluir':
        $id = $_GET['id'];
        $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        break;
}

$conexao->close();
header("Location: usuarios_listar.php");
exit();
?>