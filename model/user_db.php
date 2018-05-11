<?php

function add_user($fName, $lName, $eMail, $phone, $birthday, $gender, $password) {
    global $db;
    $query = 'INSERT INTO todo_user
                 (fName, lName, eMail, phone, birthday, gender, password)
              VALUES
                 (:fName, :lName, :eMail, :phone, :birthday, :gender, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':fName', $fName);
    $statement->bindValue(':lName', $lName);
    $statement->bindValue(':eMail', $eMail);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':birthday', $birthday);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

function checkPassword($eMail, $password)
{
    global $db;
    $query = 'SELECT * FROM todo_user WHERE eMail = :eMail AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':eMail', $eMail);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $result = $statement->rowCount();
    $statement->closeCursor();
    return $result;
}

function get_userID($eMail)
{
    global $db;
    $query = 'SELECT id FROM todo_user WHERE eMail = :eMail';
    $statement = $db->prepare($query);
    $statement->bindValue(':eMail', $eMail);
    $statement->execute();
    $f = $statement->fetch();
    $result = $f['id'];
    $statement->closeCursor();
    return $result;
}

function get_userName($id)
{
    global $db;
    $query = 'SELECT fName, lName FROM todo_user WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $f = $statement->fetch();
    $result = $f['fName']." ".$f['lName'];
    $statement->closeCursor();
    return $result;
}

?>