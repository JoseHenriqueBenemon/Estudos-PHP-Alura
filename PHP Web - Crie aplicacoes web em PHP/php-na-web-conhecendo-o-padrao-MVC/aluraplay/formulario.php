<?php 

$host = "localhost";
$dbName = "";
$user = "";
$pwd = "";

$pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $pwd);

$idVideo = filter_input(INPUT_GET, 'idVideo', FILTER_SANITIZE_NUMBER_INT);

if ($idVideo !== false) {
    $sql = "SELECT * FROM videos WHERE idVideo = :idVideo;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":idVideo", $idVideo, PDO::PARAM_INT);

    if ($stmt->execute() === false) {
        header("Location: ../index.php");
        exit();
    } 

    $video = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['action'])) {
        
        $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
        $title = filter_input(INPUT_POST, "titulo");

        if ($url === false || $title === false) {
            header("Location: ./formulario.php?idVideo=$idVideo&msg=warning");
            exit();
        }

        $sql = "UPDATE videos SET url = :url, title = :title WHERE idVideo = :idVideo;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":url", $url);
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":idVideo", $idVideo);

        if ($stmt->execute()) {
            header("Location: ../index.php?msg=success");
            exit();
        } else {
            header("Location: ./formulario.php?idVideo=$idVideo&msg=fail");
            exit();
        }
    }
}

if (empty($video)) {
    $video = [
        'url' => '',
        'title' => ''
    ];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos-form.css">
    <link rel="stylesheet" href="../css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>

    <!-- Cabecalho -->
    <header>

        <nav class="cabecalho">
            <a class="logo" href="../"></a>

            <div class="cabecalho__icones">
                <a href="./formulario.php" class="cabecalho__videos"></a>
                <a href="../pages/login.html" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>

    <main class="container">
        <form class="container__formulario" action="<?= (!is_null($idVideo)) ? '' : './novo-video.php' ?>" method="POST">
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
                    <input type="hidden" name="action" value="update">
                <?php endif; ?>
                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>

</body>

</html>