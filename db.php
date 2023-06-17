<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db_connection = $_ENV['DB_CONNECTION'];
$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_DATABASE'];
$port = $_ENV['DB_PORT'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

if (!in_array($db_connection, PDO::getAvailableDrivers())) {
	echo "Error: Driver for db connection is not define";
}

try {
	$pdo = new PDO("$db_connection:host=$host;dbname=$dbname;port=$port;", $username, $password);
	return $pdo;
} catch (PDOException $exception) {
	echo "Error DB connection: {$exception->getMessage()}";
	return null;
}
