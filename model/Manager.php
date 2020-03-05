<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=I8HgIYD30I;charset=utf8', 'root', '');

        return $db;
    }
}