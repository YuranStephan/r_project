<?php
include 'config.php';

$sql = "SELECT * FROM dishes";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Orders</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-5">
        <h2 class="mb-4">Menu de Pratos</h2>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4 mb-4'>
                            <div class='card animate__animated animate__fadeInUp'>
                                <div class='card-body'>
                                    <h5 class='card-title'>" . $row["name"] . "</h5>
                                    <p class='card-text'>" . $row["description"] . "</p>
                                    <p class='card-text'>R$ " . $row["price"] . "</p>
                                </div>
                            </div>
                          </div>";
                }
            } else {
                echo "<p class='text-center'>Nenhum prato encontrado</p>";
            }
            ?>
        </div>
    </div>
    <!-- order section starts  -->
    <section class="order" id="order">
        <h3 class="sub-heading"> Compre o seu Combo já </h3>
        <h1 class="heading"> free and fast no Stephs-Apetite </h1>

        <form id="orderForm">
            <div class="inputBox">
                <div class="input">
                    <span>Seu nome </span>
                    <input type="text" name="name" placeholder="Digite o seu nome" required>
                </div>
                <div class="input">
                    <span>Seu Numero </span>
                    <input type="number" name="number" placeholder="Digite o seu numero" required>
                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>Seu pedido</span>
                    <input type="text" name="order" placeholder="Digite o seu pedido" required>
                </div>
                <div class="input">
                    <span>adicionais </span>
                    <input type="text" name="extra" placeholder="Peça extras">
                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>quantidade</span>
                    <input type="number" name="quantity" placeholder="Numero de pedidos" required>
                </div>
                <div class="input">
                    <span>Data e hora</span>
                    <input type="datetime-local" name="datetime" required>
                </div>
            </div>
            <div class="inputBox">
                <div class="input">
                    <span>Seu endereço</span>
                    <textarea name="address" placeholder="Digite o seu endereço" cols="30" rows="10" required></textarea>
                </div>
                <div class="input">
                    <span>deixe intruçoe</span>
                    <textarea name="message" placeholder="Deixe instruçoes" cols="30" rows="10"></textarea>
                </div>
            </div>
            <input type="button" onclick="submitOrder()" value="Peça JÂ" class="btn">
        </form>
    </section>
    <!-- order section ends -->

    <!-- footer section starts  -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Nossas Franquias</h3>
                <a href="https://id.wikipedia.org/wiki/Indonesia">Zona Verde</a>
                <a href="https://en.wikipedia.org/wiki/Japan">Matola</a>
                <a href="https://en.wikipedia.org/wiki/Russia">Boane</a>
                <a href="https://en.wikipedia.org/wiki/United_States">USA</a>
                <a href="https://en.wikipedia.org/wiki/France">Xai-Xai</a>
            </div>

            <div class="box">
                <h3>links Rapidos</h3>
                <a href="#home">Inicio</a>
                <a href="#dishes">Pratos</a>
                <a href="#about">Acerca</a>
                <a href="#menu">menu</a>
                <a href="#review">deppimentos</a>
                <a href="#order">ordens</a>
            </div>

            <div class="box">
                <h3>Contactos</h3>
                <a>(021) 1234567</a>
                <a>0813 8591 2298</a>
                <a href="mailto:luqmandarmawan532@gmail.com">luqmandarmawan532@gmail.com</a>
                <a href="mailto:luqmanfn17@gmail.com">luqmanfn17@gmail.com</a>
                <a href="https://goo.gl/maps/PLf682NnDP5JX9p99">Tangerang, Indonesia - 15143</a>
            </div>

            <div class="box">
                <h3>Follow us</h3>
                <a href="https://facebook.com/luqman.darmawan.24">Facebook</a>
                <a href="https://instagram.com/luqman_lk8">Instagram</a>
                <a href="https://twitter.com/TheAlphaKnight">Twitter</a>
                <a href="https://id.linkedin.com/">Linkedin</a>
            </div>
        </div>

        <div class="credit"> Copyright @ 2024 by <span>Yuran Stephan</span> </div>
    </section>
    <!-- footer section ends -->

    <!-- loader part  -->
    <div class="loader-container">
        <img src="images/loader.gif" alt="">
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- custom js file link  -->
    <script src="js/script.js"></script>

    <script>
        function submitOrder() {
            const form = document.getElementById('orderForm');
            const formData = new FormData(form);

            fetch('order_process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire('Thank You!', data.message, 'success');
                    form.reset();
                } else {
                    Swal.fire('Error', data.message, 'error');
                }
            })
            .catch(error => Swal.fire('Error', 'Something went wrong', 'error'));
        }
    </script>
</body>
</html>
