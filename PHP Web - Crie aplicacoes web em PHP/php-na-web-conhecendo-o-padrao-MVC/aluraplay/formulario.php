<?php 

$host = "localhost";
$dbName = "";
$user = "";
$pwd = "";

$pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $pwd);

$idVideo = filter_input(INPUT_GET, 'idVideo', FILTER_SANITIZE_NUMBER_INT);

$video = [
    'url' => '',
    'title' => ''
];

if ($idVideo !== false && !is_null($idVideo)) {
    $sql = "SELECT * FROM videos WHERE idVideo = :idVideo;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":idVideo", $idVideo, PDO::PARAM_INT);

    if ($stmt->execute() === false) {
        header("Location: ../");
        exit();
    } 

    $video = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<?php require_once 'inicio-html.php'; ?>
    <main class="container">
        <form class="container__formulario" action="<?= (!is_null($idVideo)) ? './editar-video' : './novo-video' ?>" method="POST">
            <h2 class="formulario__titulo">Edite este vídeo!</h3>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name="url" class="campo__escrita" required
                        placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" value="<?=$video['url']?>" />
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo"
                        value="<?=$video['title']?>"
                        id='titulo' />
                </div>
                <?php if ($idVideo !== false): ?>
                    <input type="hidden" name="idVideo" value="<?=$idVideo?>">
                <?php endif; ?>
                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>
<?php require_once 'fim-html.php' ?>