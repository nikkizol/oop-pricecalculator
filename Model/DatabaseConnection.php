<?php


class DatabaseConnection
{
    public function Connection(): PDO
    {
        // No bugs in this function, just use the right credentials.
        $dbhost = "localhost";
        $dbuser = "becode";
        $dbpass = "becode123";
        $db = "excercise2";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);
    }
}