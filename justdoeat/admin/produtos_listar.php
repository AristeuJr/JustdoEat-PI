<?php
require_once '../includes/funcoes.php';
require_once '../includes/conexao.php';
verifica_acesso(['Admin']); 

// SQL para pegar produtos e o nome do restaurante (usuário) dono
$sql = "SELECT p.id, p.nome, p.preco, p.categoria, u.nome as nome_restaurante 
        FROM produtos p 
        JOIN usuarios u ON p.usuario_id = u.id 
        ORDER BY u.nome, p.nome";
$resultado = $conexao->query($sql);

require_once '../header.php';
?>

<div class="container">
    <h2>Listagem Geral de Produtos</h2>
    <p>Esta página mostra todos os produtos cadastrados no sistema.</p>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Restaurante</th>
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
                        <td><?php echo htmlspecialchars($produto['nome_restaurante']); ?></td>
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
$conexao->close();
require_once '../footer.php'; 
?>