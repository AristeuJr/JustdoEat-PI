<?php
require_once 'includes/funcoes.php';
verifica_acesso(); 

require_once 'header.php';
?>

<div class="container dashboard">
    <h1>Dashboard</h1>
    <p>Bem-vindo(a), <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</p>

    <div class="dashboard-menu">
        <?php if ($_SESSION['usuario_perfil'] == 'Admin'): ?>
            <h3>Menu do Administrador</h3>
            <ul>
                <li><a href="/justdoeat/admin/usuarios_listar.php">Gerenciar Usuários</a></li>
                <li><a href="/justdoeat/admin/produtos_listar.php">Ver Todos os Produtos</a></li>
            </ul>

       <?php elseif ($_SESSION['usuario_perfil'] == 'Restaurante'): ?>
            <h3>Menu do Restaurante</h3>
            <ul>
                <li><a href="/justdoeat/restaurante/cardapio_listar.php">Gerenciar meu Cardápio (Produtos)</a></li>
                <li><a href="#">Ver meus Pedidos</a></li>
                <li><a href="#">Configurações do Restaurante</a></li>
            </ul>

        <?php else: // Cliente ?>
            <h3>Menu do Cliente</h3>
            <ul>
                <li><a href="#">Ver meus Pedidos</a></li>
                <li><a href="#">Editar meu Perfil</a></li>
            </ul>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>