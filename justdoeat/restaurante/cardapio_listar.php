<?php
require_once '../includes/funcoes.php';
require_once '../includes/conexao.php';

verifica_acesso(['Restaurante']);

$id_restaurante = $_SESSION['usuario_id'];

$sql = "SELECT id, nome, preco, categoria FROM produtos WHERE usuario_id = ? ORDER BY nome";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_restaurante);
$stmt->execute();
$resultado = $stmt->get_result();

require_once '../header.php';
?>

<div class="container admin-page">
    <h2>Gerenciar meu Cardápio (Produtos)</h2>
    <a href="cardapio_form.php" class="btn btn-primary">Adicionar Novo Produto</a>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Produto</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultado->num_rows > 0): ?>
                <?php while($produto = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $produto['id']; ?></td>
                        <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                        <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($produto['categoria']); ?></td>
                        <td>
                            <a href="cardapio_form.php?id=<?php echo $produto['id']; ?>" class="btn btn-secondary">Editar</a>
                            <a href="cardapio_action.php?acao=excluir&id=<?php echo $produto['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Nenhum produto encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php 
$stmt->close();
$conexao->close();
require_once '../footer.php'; 
?>