<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=i8hgiyd30i;charset=utf8', 'root', '');
        return $db;
    }
}