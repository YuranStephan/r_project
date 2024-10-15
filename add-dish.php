<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nome, descricao, preco FROM pratos";
$result = $conn->query($sql);

$pratos = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pratos[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

echo json_encode($pratos);
?>
