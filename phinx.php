<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db_connection = $_ENV['DB_CONNECTION'];
$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_DATABASE'];
$port = $_ENV['DB_PORT'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

return
    [
        'paths' => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
            'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'development',
            'production' => [
                'adapter' => 'mysql',
                'host' => 'localhost',
                'name' => 'production_db',
                'user' => 'root',
                'pass' => '',
                'port' => '3306',
                'charset' => 'utf8',
            ],
            'development' => [
                'adapter' => $db_connection,
                'host' => $host,
                'name' => $dbname,
                'user' => $username,
                'pass' => $password,
                'port' => $port,
                'charset' => 'utf8',
            ],
            'testing' => [
                'adapter' => $db_connection,
                'host' => $host,
                'name' => $dbname,
                'user' => $username,
                'pass' => $password,
                'port' => $port,
                'charset' => 'utf8',
            ]
        ],
        'version_order' => 'creation'
    ];
