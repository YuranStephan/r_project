<?php
include 'config.php';

// Create
if (isset($_POST['action']) && $_POST['action'] == 'create') {
    $nome = $_POST['name'];
    $descricao = $_POST['description'];
    $preco = $_POST['price'];
    $sql = "INSERT INTO pratos (nome, descricao, preco) VALUES ('$nome', '$descricao', '$preco')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    exit;
}

// Read
if (isset($_GET['action']) && $_GET['action'] == 'read') {
    $sql = "SELECT * FROM pratos";
    $result = $conn->query($sql);
    $dishes = [];
    while ($row = $result->fetch_assoc()) {
        $dishes[] = $row;
    }
    echo json_encode($dishes);
    exit;
}

// Update
if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $nome = $_POST['name'];
    $descricao = $_POST['description'];
    $preco = $_POST['price'];
    $sql = "UPDATE pratos SET nome='$nome', descricao='$descricao', preco='$preco' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    exit;
}

// Delete
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $sql = "DELETE FROM pratos WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    exit;
}
?>
