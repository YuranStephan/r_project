<?php
session_start();
include 'db.php'; // Assegure-se de que este arquivo exista e faça a conexão com o banco de dados

$username = $_POST['username'];
$password = $_POST['password'];

// Prepare statement
$stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);

// Execute
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['admin'] = $username;
    header("Location: admin-dashboard.html");
} else {
    header("Location: login.html?status=error");
}

$stmt->close();
$conn->close();
?>
