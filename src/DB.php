<?php

declare(strict_types=1);

class DB
{
    public static function connect($config): PDO
    {
        $dsn = "{$config['db_connection']}:host={$config['db_host']};dbname={$config['db_name']};user={$config['username']};password={$config['password']}";
        return new PDO($dsn);
    }
}