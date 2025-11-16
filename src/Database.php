<?php

class Database
{
    private static ?PDO $connection = null;
    private static string $dbPath;

    private function __construct()
    {
        // Construtor privado para impedir instanciação direta
    }

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            self::$dbPath = __DIR__ . '/../db/db.sqlite';
            self::$connection = new PDO("sqlite:" . self::$dbPath);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;
    }

    public static function getDbPath(): string
    {
        if (self::$dbPath === null) {
            self::$dbPath = __DIR__ . '/../db/db.sqlite';
        }
        return self::$dbPath;
    }
}

