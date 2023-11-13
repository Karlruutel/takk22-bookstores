<?php

require_once("connect.php");

$stmt = $pdo->query('SELECT * FROM books');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>
<body>

<form method="post" action="2-form.php">
  <input type="text" name="search" placeholder="Search..." required>
  <input type="submit" value="Search">
</form>

<?php
if (isset($_POST["search"])) {
  require "3-search.php";

  if (count($results) > 0) { foreach ($results as $r) {
    printf("<div>%s - %s</div>", $r["name"], $r["email"]);
  }} else { echo "No results found"; }
}
?>

<?php
while ($row = $stmt->fetch()) {
    ?> 
    <li>
        <a href="book.php?id=<?= $row["id"]; ?>">
        <?=$row['title']; ?>

    </a>

    </li>;

    <?php
}
?>

</body>
</html>