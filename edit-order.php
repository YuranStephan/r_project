<?php
// Iniciando a sessão e conexão com o banco de dados
session_start();
include 'db_connection.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}

// Obter dados do pedido
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM orders WHERE id=$id") or die($conn->error);
$order = $result->fetch_assoc();

// Atualizar pedido
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $order_details = $_POST['order_details'];
    $additional_food = $_POST['additional_food'];
    $quantity = $_POST['quantity'];
    $datetime = $_POST['datetime'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    $conn->query("UPDATE orders SET name='$name', phone='$phone', order_details='$order_details', additional_food='$additional_food', quantity='$quantity', datetime='$datetime', address='$address', message='$message' WHERE id=$id") or die($conn->error);

    header("Location: view-orders.php");
}
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
            background-image: url('images/home-bg.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.75);
            padding: 20px;
            margin-top: 20px;
            max-width: 600px;
            animation: fadeIn 1s;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .form-group {
            margin-bottom: 1.5rem;
            transition: all 0.3s ease-in-out;
        }
        .form-group:hover {
            transform: scale(1.02);
        }
        .btn-custom {
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }
        .btn-custom:hover {
            transform: scale(1.05);
            background-color: #0056b3;
            color: #fff;
        }
        .text-center h2 {
            animation: bounceInDown 1s;
        }
        @keyframes bounceInDown {
            0%, 20%, 40%, 60%, 80%, 100% {
                -webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
            }

            0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -3000px, 0);
                transform: translate3d(0, -3000px, 0);
            }

            60% {
                opacity: 1;
                -webkit-transform: translate3d(0, 25px, 0);
                transform: translate3d(0, 25px, 0);
            }

            75% {
                -webkit-transform: translate3d(0, -10px, 0);
                transform: translate3d(0, -10px, 0);
            }

            90% {
                -webkit-transform: translate3d(0, 5px, 0);
                transform: translate3d(0, 5px, 0);
            }

            100% {
                -webkit-transform: none;
                transform: none;
            }
        }
        .btn-back {
            display: block;
            margin: 20px auto;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }
        .btn-back:hover {
            transform: scale(1.05);
            background-color: #6c757d;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container animate__animated animate__fadeIn">
        <h2 class="text-center mt-4 animate__animated animate__bounceInDown">Editar Pedido</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $order['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $order['phone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="order_details">Detalhes do Pedido</label>
                <textarea name="order_details" id="order_details" class="form-control" required><?php echo $order['order_details']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="additional_food">Comida Adicional</label>
                <textarea name="additional_food" id="additional_food" class="form-control" required><?php echo $order['additional_food']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="quantity">Quantidade</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="<?php echo $order['quantity']; ?>" required>
            </div>
            <div class="form-group">
                <label for="datetime">Data e Hora</label>
                <input type="datetime-local" name="datetime" id="datetime" class="form-control" value="<?php echo $order['datetime']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Endereço</label>
                <input type="text" name="address" id="address" class="form-control" value="<?php echo $order['address']; ?>" required>
            </div>
            <div class="form-group">
                <label for="message">Mensagem</label>
                <textarea name="message" id="message" class="form-control"><?php echo $order['message']; ?></textarea>
            </div>
            <button type="submit" name="update" class="btn btn-primary btn-block btn-custom">
                Atualizar Pedido
            </button>
            <a href="index.html" class="btn btn-secondary btn-block btn-back mt-3">
                Voltar para a Página Principal
            </a>
        </form>
    </div>
</body>
</html>