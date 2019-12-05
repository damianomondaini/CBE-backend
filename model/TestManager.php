<?php
require_once('Manager.php');

class TestManager extends Manager
{
    public function getTest()
    {
        $db = $this->dbConnect();
        $tests = $db->query('SELECT * FROM cates_visite');

        return $tests;
    }
}