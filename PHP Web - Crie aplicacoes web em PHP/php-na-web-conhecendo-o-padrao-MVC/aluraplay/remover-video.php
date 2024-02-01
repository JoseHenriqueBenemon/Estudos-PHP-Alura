<?php 

$host = "localhost";
$dbName = "";
$user = "";
$pwd = "";

$pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $pwd);

$idVideo = filter_input(INPUT_GET, 'idVideo', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM videos WHERE idVideo = :idVideo;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":idVideo", $idVideo, PDO::PARAM_INT);

if ($stmt->execute()) {
    header("Location: ./?msg=success");
} else {
    header("Location: ./?msg=fail");
}

die("Página inexistente!");
