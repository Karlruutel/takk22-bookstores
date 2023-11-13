<?php
require_once("config.php");
require_once("connect.php");

$stmt = $pdo->prepare("SELECT * FROM `books` WHERE `id`=:id");
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();
if (isset($_POST["ajax"])) { echo json_encode($results); }