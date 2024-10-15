<?php
include 'db.php';
$result = $conn->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Orders List</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Order Item</th>
            <th>Extra</th>
            <th>Quantity</th>
            <th>Date and Time</th>
            <th>Address</th>
            <th>Message</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['number']; ?></td>
            <td><?php echo $row['order_item']; ?></td>
            <td><?php echo $row['extra']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['datetime']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['message']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
