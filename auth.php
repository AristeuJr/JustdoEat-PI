<?php
require_once '../includes/funcoes.php';
require_once '../includes/conexao.php';
verifica_acesso(['Admin']); // Somente Admin pode acessar

$sql = "SELECT id, nome, email, perfil FROM usuarios ORDER BY nome";
$resultado = $conexao->query($sql);

require_once '../header.php';
?>

<div class="container">
    <h2>Gerenciamento de Usuários</h2>
    <a href="usuarios_form.php" class="btn btn-primary">Adicionar Novo Usuário</a>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Perfil</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultado->num_rows > 0): ?>
                <?php while($usuario = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $usuario['id']; ?></td>
                        <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['perfil']); ?></td>
                        <td>
                            <a href="usuarios_form.php?id=<?php echo $usuario['id']; ?>" class="btn btn-secondary">Editar</a>
                            <a href="usuarios_action.php?acao=excluir&id=<?php echo $usuario['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Nenhum usuário encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php 
$conexao->close();
require_once '../footer.php'; 
?>