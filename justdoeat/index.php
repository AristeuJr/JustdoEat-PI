<?php require_once "header.php"; ?>

        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Componente de Contribuição?</title>
            <link rel="stylesheet" href="css/style.css">

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        </head>
        <body>
                <section class="categorias">
                <h2>Categorias:</h2>
                    <div class="categoria-boxes">
                        <div class="categoria">
                            <a href="#"><img src="images/icons/lanche_icon.png" alt="Lanches"></a>
                            <p>Lanches</p>
                        </div>
                        <div class="categoria">
                            <a href="#"><img src="images/icons/marmita_icon.png" alt="Marmitas"></a>
                            <p>Marmitas</p>
                        </div>
                        <div class="categoria">
                            <a href="#"><img src="images/icons/bebida_icon.png" alt="Bebidas"></a>
                            <p>Bebidas</p>
                        </div>
                    </div>
                </section>
            <section class="cta-section">
                <div class="cta-text">
                    <h2>GOSTARIA DE<br>CONTRIBUIR CONOSCO?</h2>
                    <p>
                        Saiba mais pelo botão abaixo!
                    </p>
                    <a href="quemsomos.php" class="sb btn-primary">Saiba mais!</a>
                </div>
                <img src="images/icons/colaboradores.png" alt="Colaboradores">
            </section>
        </body>
        </html>

<?php require "footer.php"; ?>