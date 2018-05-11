<?php
    $dsn = 'mysql:host=sql2.njit.edu;dbname=agl24';
    $username = 'agl24';
    $password = 'tb6BD9iC';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>