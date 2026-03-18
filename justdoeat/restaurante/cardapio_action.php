<?php
require_once '../includes/funcoes.php';
require_once '../includes/conexao.php';
verifica_acesso(['Restaurante']);

$acao = $_REQUEST['acao'] ?? '';
$id_restaurante = $_SESSION['usuario_id'];

switch ($acao) {
    case 'adicionar':
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $categoria = $_POST['categoria'];

        $sql = "INSERT INTO produtos (usuario_id, nome, descricao, preco, categoria) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("isdss", $id_restaurante, $nome, $descricao, $preco, $categoria);
        $stmt->execute();
        $stmt->close();
        break;

    case 'editar':
        $id_produto = $_POST['id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $categoria = $_POST['categoria'];


        $sql = "UPDATE produtos SET nome=?, descricao=?, preco=?, categoria=? WHERE id=? AND usuario_id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssdssi", $nome, $descricao, $preco, $categoria, $id_produto, $id_restaurante);
        $stmt->execute();
        $stmt->close();
        break;

    case 'excluir':
        $id_produto = $_GET['id'];

        $sql = "DELETE FROM produtos WHERE id = ? AND usuario_id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ii", $id_produto, $id_restaurante);
        $stmt->execute();
        $stmt->close();
        break;
}

$conexao->close();
header("Location: cardapio_listar.php"); 
exit();
?>