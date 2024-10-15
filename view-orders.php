<?php
// Iniciando a sessão e conexão com o banco de dados
session_start();
include 'db_connection.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}

// Deletar pedido
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM orders WHERE id=$id") or die($conn->error);
    header("Location: view-orders.php");
}

// Obter pedidos
$result = $conn->query("SELECT * FROM orders") or die($conn->error);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Pedidos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/home-bg.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.75);
            padding: 20px;
            margin-top: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .btn-custom {
            margin-bottom: 10px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4">Pedidos</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Detalhes do Pedido</th>
                    <th>Quantidade</th>
                    <th>Data/Hora</th>
                    <th>Endereço</th>
                    <th>Mensagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['order_details']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['datetime']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td>
                        <a href="edit-order.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="view-orders.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Apagar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete() {
            return Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, apagar!',
                cancelButtonText: 'Não, cancelar!'
            }).then((result) => {
                return result.isConfirmed;
            });
        }
    </script>
</body>
</html>
<?php
// Iniciando a sessão e conexão com o banco de dados
session_start();
include 'db_connection.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}

// Deletar pedido
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM orders WHERE id=$id") or die($conn->error);
    header("Location: view-orders.php");
}

// Obter pedidos
$result = $conn->query("SELECT * FROM orders") or die($conn->error);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Pedidos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/home-bg.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.75);
            padding: 20px;
            margin-top: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .btn-custom {
            margin-bottom: 10px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4">Pedidos</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Detalhes do Pedido</th>
                    <th>Quantidade</th>
                    <th>Data/Hora</th>
                    <th>Endereço</th>
                    <th>Mensagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['order_details']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['datetime']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td>
                        <a href="edit-order.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="view-orders.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirmDelete()">Apagar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete() {
            return Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, apagar!',
                cancelButtonText: 'Não, cancelar!'
            }).then((result) => {
                return result.isConfirmed;
            });
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
<?php
$conn->close();
?>
