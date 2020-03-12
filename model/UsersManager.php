<?php

require_once('Manager.php');

class UserManager extends Manager
{
    public function checkIfUserExists($email)
    {
        $db = $this->dbConnect();
        $checkUser = $db->prepare('SELECT email FROM users WHERE email = ?');
        $checkUser->execute(array($email));
        $user = $checkUser->fetch();

        if(isset($user['email']))
        {
            $user = true;
            return $user;
        }
        else
        {
            $user = false;
            return $user;
        }
    }

    public function addAccountDb($role, $name, $surname, $email, $hashedPassword)
    {
        $db = $this->dbConnect();
        $user = $db->prepare("INSERT INTO users (name, surname, password, email, idx_role) VALUE (?, ?, ?, ?, ?)");
        $affectedLines = $user->execute(array($name, $surname, $hashedPassword, $email, $role));

        return $affectedLines;
    }

    public function getUserByEmail($email)
    {
        $db = $this->dbConnect();
        $getUser = $db->prepare("SELECT * FROM users WHERE email = ?");
        $getUser->execute(array($email));
        $user = $getUser->fetch();

        if(isset($user['email']))
        {
            return $user;
        }
        else
        {
            $user = false;
            return $user;
        }
    }
}
