<?php
// Definir as credenciais do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rt_db";

// Tentar criar uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se ocorreu algum erro na conexão
if ($conn->connect_error) {
    // Se houver um erro, exibir uma mensagem de erro e encerrar o script
    die("Erro de conexão: " . $conn->connect_error);
}

// Definir o conjunto de caracteres para UTF-8 para garantir suporte a caracteres especiais
if (!$conn->set_charset("utf8")) {
    // Se não for possível definir o conjunto de caracteres, exibir uma mensagem de erro e encerrar o script
    die("Erro ao definir o conjunto de caracteres: " . $conn->error);
}
?>
