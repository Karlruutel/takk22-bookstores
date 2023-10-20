<?php

require_once("connect.php");

$id = $_GET["id"];

$sql = "SELECT * FROm books WHERE id = {id}";

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(["id" => $id]);
$book = $stmt->fetch();

var_dump($book);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?$book["title"]?> </h1>    
    <span style="font-size 16px;">Aasta</span> <span style="font-size 24px;"><?=$book["release_date"] ?></span>

</body>
</html>