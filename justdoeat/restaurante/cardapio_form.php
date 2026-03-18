<?php
require_once '../includes/funcoes.php';
require_once '../includes/conexao.php';
verifica_acesso(['Restaurante']);

$produto = [
    'id' => '', 'nome' => '', 'descricao' => '', 'preco' => '', 'categoria' => ''
];
$titulo = "Adicionar Novo Produto";

if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];
    $id_restaurante = $_SESSION['usuario_id'];
    
    $sql = "SELECT * FROM produtos WHERE id = ? AND usuario_id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ii", $id_produto, $id_restaurante);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if($resultado->num_rows > 0) {
        $produto = $resultado->fetch_assoc();
        $titulo = "Editar Produto";
    }
    $stmt->close();
}

require_once '../header.php';
?>

<div class="container admin-page">
    <h2><?php echo $titulo; ?></h2>
    <form action="cardapio_action.php" method="post">
        <input type="hidden" name="acao" value="<?php echo !empty($produto['id']) ? 'editar' : 'adicionar'; ?>">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

        <div class="form-group">
            <label for="nome">Nome do Produto</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="preco">Preço (ex: 19.90)</label>
            <input type="number" step="0.01" name="preco" id="preco" class="form-control" value="<?php echo htmlspecialchars($produto['preco']); ?>" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" id="categoria" class="form-control" value="<?php echo htmlspecialchars($produto['categoria']); ?>" placeholder="Ex: Lanches, Bebidas, Sobremesas">
        </div>
        
        <button type="submit" class="btn btn-primary">Salvar Produto</button>
        <a href="cardapio_listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once '../footer.php'; ?>