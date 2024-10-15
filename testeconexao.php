<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo "Connected successfully to contact_db database!";
}

// Close connection (not strictly necessary here, but good practice)
mysqli_close($conn);

?>
