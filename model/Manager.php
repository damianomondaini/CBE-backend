<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=remotemysql.com;dbname=I8HgIYD30I;charset=utf8', 'I8HgIYD30I', 'N9aV9AJQyB');
        
        return $db;
    }
}