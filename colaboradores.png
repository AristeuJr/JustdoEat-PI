<?php
// Inicia a sessão para podermos usar as variáveis de sessão
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF--8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Do Eat</title>
    <link rel="stylesheet" href="/justdoeat/css/style.css">
    
    <?php if (basename($_SERVER['PHP_SELF']) == 'login.php' || basename($_SERVER['PHP_SELF']) == 'registro.php'): ?>
        <link rel="stylesheet" href="/justdoeat/css/form.css">
    <?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="<?php echo (basename($_SERVER['PHP_SELF']) == 'login.php' || basename($_SERVER['PHP_SELF']) == 'registro.php') ? 'form-page' : ''; ?>">
    <header>
        <div class="container">
            <a href="/justdoeat/index.php"><img src="/justdoeat/images/icons/logo_justdoeat.png" alt="Logo Just Do Eat" class="logo"></a>
            <nav>
                <ul>
                    <li><a href="/justdoeat/index.php">Início</a></li>
                    <li><a href="#">Restaurantes</a></li>
                    <li><a href="#">Comidas</a></li>
                    <li><a href="#">Bebidas</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <form action="#" method="get" class="search-form">
                    <input type="search" name="q" placeholder="🔍">
                </form>
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <a href="/justdoeat/dashboard.php" class="btn btn-primary">Dashboard</a>
                    <a href="/justdoeat/logout.php" class="btn btn-secondary">Sair</a>
                <?php else: ?>
                    <a href="/justdoeat/login.php" class="btn btn-secondary">Logar</a>
                    <a href="/justdoeat/registro.php" class="btn btn-primary">Registre-se</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <main>