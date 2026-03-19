<?php
require_once '../includes/funcoes.php';
require_once '../includes/conexao.php';
verifica_acesso(['Admin']);

$usuario = [
    'id' => '', 'nome' => '', 'email' => '', 'perfil' => ''
];
$titulo = "Adicionar Novo Usuário";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $titulo = "Editar Usuário";
    }
    $stmt->close();
}

require_once '../header.php';
?>

<div class="container">
    <h2><?php echo $titulo; ?></h2>
    <form action="usuarios_action.php" method="post">
        <input type="hidden" name="acao" value="<?php echo isset($usuario['id']) && !empty($usuario['id']) ? 'editar' : 'adicionar'; ?>">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
        </div>
        <div class="form-group">
            <label for="perfil">Perfil</label>
            <select name="perfil" id="perfil" class="form-control" required>
                <option value="Cliente" <?php echo ($usuario['perfil'] == 'Cliente' ? 'selected' : ''); ?>>Cliente</option>
                <option value="Restaurante" <?php echo ($usuario['perfil'] == 'Restaurante' ? 'selected' : ''); ?>>Restaurante</option>
                <option value="Admin" <?php echo ($usuario['perfil'] == 'Admin' ? 'selected' : ''); ?>>Admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="senha">Nova Senha (deixe em branco para não alterar)</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="usuarios_listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once '../footer.php'; ?>