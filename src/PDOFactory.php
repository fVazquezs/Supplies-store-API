<?php

class PDOFactory
{
    private static $pdo;

    public static function getConnection()
    {
        if (!isset($pdo)) {
            $pdo = new PDO("mysql:host=us-cdbr-iron-east-02.cleardb.net;dbname=heroku_60d4b49d28d0f61", "b0de910d8ab6f3", "31876c1b");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        return $pdo;
    }
}
