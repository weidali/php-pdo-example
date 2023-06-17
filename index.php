<?php

require_once __DIR__ . '/vendor/autoload.php';

// $pdo = include_once __DIR__ . '/db.php';
$pdo = require 'db.php';


$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

dump($users);
