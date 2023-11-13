<?php

require_once("config.php");
require_once("connect.php");

$id = $_GET["id"];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

if ( isset($_POST["submit"]) && $_POST["submit"] == "save" ) {
    $stmt = $pdo->prepare('UPDATE books SET title = :title WHERE id = :id');
    $stmt->execute(['title' => $_POST["title"], "id" => $id]);

    header("Location: book.php?id={$id}");

}

?>

<h1>Muuda</h1> <?= $id;?> <?= $book["title"]; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="./edit.php?id=<?= $id; ?>" method="post">
   Pealkiri:  <input type="text" name="title" value="<?= $book["title"];?>">
   year:  <input type="number" name="year" value="<?= $book["release_date"];?>">
<select name="type">
  <option value="new" <?= $book["type"] == 'new' ? 'selected="selected="' : ''; ?>>uus</option>
  <option value="used" <?= $book["type"] == 'used' ? 'selected="selected="' : ''; ?>>kasutatud</option>
  <option value="ebooks" <?= $book["type"] == 'ebook' ? 'selected="selected="' : ''; ?>>e raamatud</option>
</select>
<button type="submit" name="submit"  value="save">Salvesta</button>
</form>

</body>
</html>