<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=dmondaini;charset=utf8', 'dmondaini', '6520p4dFVvGY');
        
        return $db;
    }
}