<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM orders WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Pedido não encontrado.");
    }
} else {
    die("ID de pedido não fornecido.");
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../images/fundo.1.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .card {
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            border: none;
            border-radius: 15px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
        }
        .card-title {
            color: #fff;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: none;
            border-radius: 10px;
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-lg animate__animated animate__fadeIn">
                    <div class="card-body text-center">
                        <h2 class="card-title mb-4">Editar Pedido</h2>
                        <form action="check_orders.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Nome" value="<?php echo $row['name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="Telefone" value="<?php echo $row['phone']; ?>" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="order_details" placeholder="Detalhes do Pedido" rows="3" required><?php echo $row['order_details']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="additional_food" placeholder="Comida Adicional" value="<?php echo $row['additional_food']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="quantity" placeholder="Quantidade" value="<?php echo $row['quantity']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="datetime-local" class="form-control" name="datetime" placeholder="Data e Hora" value="<?php echo date('Y-m-d\TH:i', strtotime($row['datetime'])); ?>" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="address" placeholder="Endereço" rows="3" required><?php echo $row['address']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Mensagem"><?php echo $row['message']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Salvar Alterações</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
