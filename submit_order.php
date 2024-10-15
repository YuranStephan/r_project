<?php
// Configuração da conexão com o banco de dados
$servername = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USERNAME') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$dbname = getenv('DB_DATABASE') ?: 'a';

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Criando a tabela se não existir
$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    order_details VARCHAR(255) NOT NULL,
    additional_food VARCHAR(255),
    quantity INT NOT NULL,
    datetime DATETIME NOT NULL,
    address TEXT NOT NULL,
    message TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
    die("Erro ao criar tabela: " . $conn->error);
}

// Obtendo os dados do formulário
$name = $_POST['name'];
$phone = $_POST['phone'];
$order = $_POST['order'];
$additional_food = $_POST['additional_food'];
$quantity = $_POST['quantity'];
$datetime = $_POST['datetime'];
$address = $_POST['address'];
$message = $_POST['message'];

// Preparando a query SQL para inserir os dados
$sql = "INSERT INTO orders (name, phone, order_details, additional_food, quantity, datetime, address, message) 
VALUES ('$name', '$phone', '$order', '$additional_food', '$quantity', '$datetime', '$address', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Novo pedido inserido com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
