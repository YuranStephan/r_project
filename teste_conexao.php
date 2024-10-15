<?php

// **Error Handling:**
// - Consider using a try-catch block for more robust error handling

try {
  // **Database Credentials:**
  // - Obtain credentials securely from environment variables or a configuration file
  //   (avoid hardcoding in production)
  $servername = getenv('DB_HOST') ?: 'localhost';
  $username = getenv('DB_USERNAME') ?: 'root';
  $password = getenv('DB_PASSWORD') ?: '';
  $dbname = getenv('DB_DATABASE') ?: 'rt_db';

  // **Create Connection:**
  $conn = new mysqli($servername, $username, $password, $dbname);

  // **Verify Connection:**
  if ($conn->connect_error) {
    throw new PDOException("Connection failed: " . $conn->connect_error);
  }

  // **Connection Established:**
  // - Your application logic interacting with the database goes here
  echo "Connected successfully!";

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  // Log the error for further troubleshooting
  error_log("MySQL connection error: " . $e->getMessage());
} finally {
  // **Close Connection (optional, but recommended in some scenarios):**
  // Uncomment this line if you want to explicitly close the connection after use
  // $conn->close();
}

?>
