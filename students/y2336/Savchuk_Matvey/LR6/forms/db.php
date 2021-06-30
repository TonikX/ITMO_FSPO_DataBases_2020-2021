<?php

class Db
{
    public function dbconnect(): PDO
    {
        $user = "root";
        $password = "fusemi88";
        $database = "library";
        return new PDO("mysql:host=localhost;dbname=$database;IDENTIFIED WITH mysql_native_password", $user, $password);
    }
}
