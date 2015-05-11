<?php

namespace App\Model;

abstract class DbAbstract
{

    protected static $db;

    function __construct()
    {

        if (!self::$db) {
            global $pdo;
            self::$db = new \PDO("mysql:dbname={$pdo['db']}; host={$pdo['host']}", $pdo['user'], $pdo['pass']);
        }

        return self::$db;
    }

}
