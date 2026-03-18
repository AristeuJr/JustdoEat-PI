<?php
require_once 'includes/conexao.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao'])) {

    $acao = $_POST['acao'];

    if ($acao == 'registrar') {
        // Lógica de Registro COMPLETA
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $perfil = $_POST['perfil'];
        $telefone = $_POST['telefone'] ?? null;

        // Campos específicos de restaurante (ou nulos se for cliente)
        $cpf_cnpj = ($perfil == 'Restaurante') ? ($_POST['cpf_cnpj'] ?? null) : null;
        $endereco = ($perfil == 'Restaurante') ? ($_POST['endereco'] ?? null) : null;
        $numero = ($perfil == 'Restaurante') ? ($_POST['numero'] ?? null) : null;
        $cidade = ($perfil == 'Restaurante') ? ($_POST['cidade'] ?? null) : null;
        $cep = ($perfil == 'Restaurante') ? ($_POST['cep'] ?? null) : null;
        $horario_abertura = ($perfil == 'Restaurante' && !empty($_POST['horario_abertura'])) ? $_POST['horario_abertura'] : null;
        $horario_fechamento = ($perfil == 'Restaurante' && !empty($_POST['horario_fechamento'])) ? $_POST['horario_fechamento'] : null;

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha, perfil, telefone, cpf_cnpj, endereco, numero, cidade, cep, horario_abertura, horario_fechamento) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conexao->prepare($sql);
        // 's' para string, 's' para string, ... (12 no total)
        $stmt->bind_param("ssssssssssss", 
            $nome, $email, $senha_hash, $perfil, $telefone, $cpf_cnpj, 
            $endereco, $numero, $cidade, $cep, $horario_abertura, $horario_fechamento
        );

        if ($stmt->execute()) {
            header("Location: login.php?sucesso=cadastro");
        } else {
            header("Location: registro.php?erro=db");
        }
        $stmt->close();

    } elseif ($acao == 'login') {
        // Lógica de Login FUNCIONAL
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $conexao->prepare("SELECT id, nome, email, senha, perfil FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 1) {
            $usuario = $resultado->fetch_assoc();
            if (password_verify($senha, $usuario['senha'])) {
                // Login bem-sucedido
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_perfil'] = $usuario['perfil'];
                header("Location: dashboard.php");
                exit();
            }
        }
        
        // Se chegou aqui, o login falhou
        header("Location: login.php?erro=login");
        $stmt->close();
    }
}

$conexao->close();
?>