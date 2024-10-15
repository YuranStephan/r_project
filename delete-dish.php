<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo 'id' do formulário foi enviado
    if(isset($_POST['id'])){
        // Limpa o valor do campo 'id' para evitar injeção de SQL
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        // Prepara e executa a consulta SQL para excluir o prato
        $sql = "DELETE FROM dishes WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            // Redireciona para o painel de administração após a exclusão bem-sucedida
            header("Location: admin-dashboard.php");
            exit; // Encerra o script após o redirecionamento
        } else {
            // Se ocorrer um erro na execução da consulta, exibe uma mensagem de erro
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Se o campo 'id' não foi enviado, exibe uma mensagem de erro
        echo "Erro: ID do prato não fornecido.";
    }
}
?>
