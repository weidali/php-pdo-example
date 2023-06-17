<!DOCTYPE html>
<html>

<head>
	<title>PHP-PDO</title>
	<style>
		#menu {
			display: flex;
			width: 50%;
			background-color: gray;
		}

		#menu a {
			color: white;
			text-decoration: none;
			width: 100%;
		}
	</style>
</head>

<body>
	<nav id="menu">
		<?php
		require 'menu.php';
		foreach ($items as $item) {
			echo "<a href='" . $item['link'] . "'>";
			echo $item['text'];
			echo "<a></a>";
		}
		?>
	</nav>
</body>

</html>

<?php

require_once __DIR__ . '/vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

	case '':
		require __DIR__ . '/views/index.php';
		break;
	case '/':
		require __DIR__ . '/views/index.php';
		break;
	case '/about':
		require __DIR__ . '/views/about.php';
		break;
	case '/users-list':
		require __DIR__ . '/views/users.php';
		break;

	default:
		http_response_code(404);
		require __DIR__ . '/views/404.php';
		break;
}
