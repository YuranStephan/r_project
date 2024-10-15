<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

// Execute
if ($stmt->execute()) {
    header("Location: login.html?status=success");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
