<?php

require_once("connect.php");

$id = $_GET["id"];

if ( isset($_POST["submit"]) && $_POST["submit"] == "save" )  {
    $stmt = $pdo->prepare('UPDATE books SET tirle = :title WHERE id = :id');
    $stmt->execute(["title" => $_POST["title"], "id" => $id]);
    
    header("Location: book.php?id=($id)");
}

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(["id" => $id]);
$book = $stmt->fetch();

?>

~<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muuda</title>
</head>
<body>
    <form action="edit.php$id=<?=$id ;?>" method="post">
        Pealkiri:<input type="text" name="title" value="<?= $book["title"] ;?>">
        <br><br>
        <button type="submit">Salvesta</button>
    </form>
</body>
</html>