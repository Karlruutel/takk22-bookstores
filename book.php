<?php

require_once("config.php");

$id = $_GET["id"];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

$id = $_GET["id"];

$sql = "SELECT * FROm books WHERE id = {id}";

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(["id" => $id]);
$book = $stmt->fetch();

var_dump($book);