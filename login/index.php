<?php
require('../model/database.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'login';
    }
}

if ($action == 'login')
{
    include('login.php');
}
else if ($action == 'signup')
{
    include('signup.php');
}
else if ($action == 'newUser')
{
    $fName = filter_input(INPUT_POST, 'fName');
    $lName = filter_input(INPUT_POST, 'lName');
    $eMail = filter_input(INPUT_POST, 'eMail');
    $phone = filter_input(INPUT_POST, 'phone');
    $birthday = filter_input(INPUT_POST, 'birthday');
    $gender = filter_input(INPUT_POST, 'gender');
    $password = filter_input(INPUT_POST, 'password');
    if ($fName == NULL || $lName == NULL || $eMail == NULL || $phone == NULL || $birthday == NULL || $gender == NULL || $password == NULL)
    {
        $error = "Invalid user data. Check all fields and try again.";
        include('../errors/error.php');
    }
    else
    { 
        add_user($fName, $lName, $eMail, $phone, $birthday, $gender, $password);
        $userID = get_userID($eMail);
        setcookie("user", $userID, time() + (86400 * 5), "/");
        header('Location: ../todo/index.php');
    }
}
else if($action =='checkPassword')
{
    $eMail = filter_input(INPUT_POST, 'eMail');
    $password = filter_input(INPUT_POST, 'password');
    $passwordCorrect = checkPassword($eMail, $password);
    if($passwordCorrect != 0)
    {
        $userID = get_userID($eMail);
        setcookie("user", $userID, time() + (86400 * 5), "/");
        header('Location: ../todo/index.php');
    }
    else
    {
        $error = "Invalid user data. Check all fields and try again.";
        include('../errors/error.php');
    }
}
?>