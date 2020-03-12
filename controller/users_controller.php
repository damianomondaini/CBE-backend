<?php

require_once('./model/UsersManager.php');

function showSignUpPage()
{
    require('./view/main/signUpPage.php');
}

function showSignInPage()
{
    require('./view/main/signInPage.php');
}

function addAccount($role, $name, $surname, $email, $password)
{
    $userManager = new UserManager();
    $user = $userManager->checkIfUserExists($email);
    if ($user === true)
    {
        throw new Exception('Error: email already used');
    }
    else
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $affectedLines = $userManager->addAccountDb($role, $name, $surname, $email, $hashedPassword);
        if ($affectedLines === false)
        {
            throw new Exception("Unable to create your account");
        }
        else
        {
            header('Location: index.php');
        }
    }
}

function signIn($email, $password)
{
    $userManager = new UserManager();
    $user = $userManager->getUserByEmail($email);
    if ($user != false)
    {
        if (password_verify($password, $user['password']))
        {
            $_SESSION['id'] = $user['id_user'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['idx_role'];
            header('Location: index.php');
        }
        else
        {
            throw new Exception('Error: Email, password or both are wrong');
        }
    }
    else
    {
        throw new Exception('Error: Email, password or both are wrong');
    }
}

function signOut()
{
    session_destroy();
    header("Location: index.php");
}