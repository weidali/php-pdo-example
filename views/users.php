<h1>Users</h1>

<?php

$pdo = require 'db.php';


$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $userId = 1;
// $sql = "SELECT * FROM users WHERE id = ?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$userId]);
// $user = $stmt->fetch(PDO::FETCH_ASSOC);

dump($users);
