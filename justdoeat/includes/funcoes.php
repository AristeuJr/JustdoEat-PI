<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


function verifica_acesso($perfis_permitidos = []) {
    if (!isset($_SESSION['usuario_id'])) {

        header("Location: /justdoeat/login.php?erro=restrito");
        exit();
    }

    if (!empty($perfis_permitidos) && !in_array($_SESSION['usuario_perfil'], $perfis_permitidos)) {

        header("Location: /justdoeat/dashboard.php?erro=proibido");
        exit();
    }
}
?>