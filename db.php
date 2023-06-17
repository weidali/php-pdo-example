<?php

require_once __DIR__ . '/vendor/autoload.php';

function dbConnect(): PDO|null
{
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
		return null;
	}

	try {
		$dsn = "$db_connection:host=$host;dbname=$dbname;port=$port;";
		$pdo = new PDO(
			$dsn,
			$username,
			$password,
			[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
		);

		if ($pdo) {
			echo "Connected to the $dbname database successfully!";
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	return $pdo;
}
return dbConnect();
