<?php

$host = "localhost";
$dbName = "";
$user = "";
$pwd = "";

$pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $pwd);

$idVideo = filter_input(INPUT_POST, 'idVideo', FILTER_SANITIZE_NUMBER_INT);
$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, "titulo");

if ($url === false || $title === false) {
    header("Location: ./formulario?idVideo=$idVideo&msg=warning");
    exit();
}


$sql = "UPDATE videos SET url = :url, title = :title WHERE idVideo = :idVideo;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":url", $url);
$stmt->bindValue(":title", $title);
$stmt->bindValue(":idVideo", $idVideo);

if ($stmt->execute()) {
    header("Location: ../?msg=success");
    exit();
} else {
    header("Location: ./formulario?idVideo=$idVideo&msg=fail");
    exit();
}