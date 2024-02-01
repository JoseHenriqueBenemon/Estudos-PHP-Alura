<?php
$host = "localhost";
$dbName = "";
$user = "";
$pwd = "";

$pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $pwd);

$sql = "SELECT * FROM videos;";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$arrVideoList = $stmt->fetchAll();
?>
<?php require_once 'inicio-html.php' ?>
    <ul class="videos__container" alt="videos alura">
        <?php foreach ($arrVideoList as $video) : ?>
            <li class="videos__item">
                <iframe width="100%" height="72%" src="<?=$video['url']?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="descricao-video">
                    <img src="./img/logo.png" alt="logo canal alura">
                    <h3><?=$video['title']?></h3>
                    <div class="acoes-video">
                        <a href="./editar-video?idVideo=<?=$video['idVideo']?>">Editar</a>
                        <a href="./remover-video?idVideo=<?=$video['idVideo']?>">Excluir</a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php require_once 'fim-html.php' ?>