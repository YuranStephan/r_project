<?php
include 'config.php';

$sql = "SELECT * FROM dishes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Pratos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            background-image: url('../images/fundo.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .container {
            padding-top: 50px;
        }
        .card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
            overflow: hidden;
        }
        .table {
            background-color: #fff;
            border-radius: 10px;
        }
        th, td {
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        td {
            color: #000;
        }
        .no-data {
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4 shadow-lg animate__animated animate__fadeIn">
                    <div class="card-body text-center">
                        <h2 class="card-title mb-4 animate__animated animate__bounceInDown">Todos os Pratos</h2>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr><td>" . htmlspecialchars($row["name"]). "</td><td>" . htmlspecialchars($row["description"]). "</td><td>" . htmlspecialchars($row["price"]). "</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3' class='no-data'>Nenhum prato encontrado</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
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
