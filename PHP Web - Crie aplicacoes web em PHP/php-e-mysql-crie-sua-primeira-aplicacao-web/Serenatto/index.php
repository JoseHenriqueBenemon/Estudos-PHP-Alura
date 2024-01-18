<?php 
    // Criando um array multidimensional para colocar os produtos
    $arrProdutos = [
        "breaskfast" => [
            [
                "img" => "img/cafe-cremoso.jpg",
                "title" => "Café Cremoso",
                "description" => "Café cremoso irresistivelmente suave e que envolve seu paladar.",
                "value" => "5.00"
            ],
            [
                "img" => "img/cafe-com-leite.jpg",
                "title" => "Café com Leite",
                "description" => "A harmonia perfeita do café e do leite, uma experiência reconfortante.",
                "value" => "2.00"
            ],
            [
                "img" => "img/cappuccino.jpg",
                "title" => "Cappuccino",
                "description" => "Café suave, leite cremoso e uma pitada de sabor adocicado.",
                "value" => "7.00"
            ],
            [
                "img" => "img/cafe-gelado.jpg",
                "title" => "Café Gelado",
                "description" => "Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.",
                "value" => "3.00"
            ]
        ],
        "lunch" => [
            [
                "img" => "img/bife.jpg",
                "title" => "Bife",
                "description" => "Bife, arroz com feijão e uma deliciosa batata frita.",
                "value" => "27.90"
            ],
            [
                "img" => "img/prato-peixe.jpg",
                "title" => "Filé de peixe",
                "description" => "Filé de peixe salmão assado, arroz, feijão verde e tomate.",
                "value" => "24.99"
            ],
            [
                "img" => "img/prato-frango.jpg",
                "title" => "Frango",
                "description" => "Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante.",
                "value" => "23.00"
            ],
            [
                "img" => "img/fettuccine.jpg",
                "title" => "Fettuccine",
                "description" => "Prato italiano autêntico da massa do fettuccine com peito de frango grelhado",
                "value" => "22.50"
            ]
        ]
    ];

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cardápio</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
            <?php foreach ($arrProdutos['breaskfast'] as $produto): ?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?=$produto["img"]?>">
                    </div>
                    <p><?=$produto["title"]?></p>
                    <p><?=$produto["description"]?></p>
                    <p>R$ <?=$produto["value"]?></p>
                </div>
            <?php endforeach; ?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-almoco-produtos">
                <?php foreach ($arrProdutos['lunch'] as $produto): ?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?=$produto['img']?>">
                    </div>
                    <p><?=$produto["title"]?></p>
                    <p><?=$produto["description"]?></p>
                    <p>R$ <?=$produto["value"]?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>