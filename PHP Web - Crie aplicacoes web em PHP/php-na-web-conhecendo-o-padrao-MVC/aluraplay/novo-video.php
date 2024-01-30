<?php 

$host = "localhost";
$dbName = "";
$user = "";
$pwd = "";

$pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $pwd);

$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, 'titulo');

if ($url === false || $title === false) {
    header("Location: ./pages/enviar-video.php");
    exit();
}

$sql = "INSERT INTO videos (url, title) VALUES (:url, :title)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);

if ($stmt->execute()) {
    header("Location: ./index.php");
} else {
    header("Location: ./pages/enviar-video.php");
}

die("Página inexistente!");

