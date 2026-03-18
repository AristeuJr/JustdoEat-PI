<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'justdoeat_db'); 

$conexao = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}


$conexao->set_charset("utf8");
?>