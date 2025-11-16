<?php

require_once __DIR__ . '/src/Database.php';

$pdo = Database::getConnection();
$pdo->exec('CREATE TABLE IF NOT EXISTS videos (id INTEGER PRIMARY KEY, url TEXT, title TEXT);');

echo "Banco de dados criado com sucesso!\n";