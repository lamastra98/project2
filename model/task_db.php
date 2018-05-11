<?php

function get_tasks($userID)
{
    global $db;
    $query = 'SELECT * FROM todo_task WHERE userID = :userID
              ORDER BY dueDate';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->execute();
    return $statement;    
}

function delete_task($task_id)
{
    global $db;
    $query = 'DELETE FROM todo_task
              WHERE taskID = :task_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':task_id', $task_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_task($userID, $name, $description, $dueDate, $dueTime) {
    global $db;
    $query = 'INSERT INTO todo_task
                 (userID, name, description, dueDate, dueTime)
              VALUES
                 (:userID, :name, :description, :dueDate, :dueTime)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':dueDate', $dueDate);
    $statement->bindValue(':dueTime', $dueTime);
    $statement->execute();
    $statement->closeCursor();
}

function edit_task($task_id, $name, $description, $dueDate, $dueTime) {
    global $db;
    $query = 'UPDATE todo_task SET name = :name, description = :description, dueDate = :dueDate, dueTime = :dueTime WHERE taskID = :task_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':dueDate', $dueDate);
    $statement->bindValue(':dueTime', $dueTime);
    $statement->bindValue(':task_id', $task_id);
    $statement->execute();
    $statement->closeCursor();
}

function complete_task($task_id)
{
    global $db;
    $query = 'UPDATE todo_task SET status = 1 WHERE taskID = :task_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':task_id', $task_id);
    $statement->execute();
    $statement->closeCursor();
}

function incomplete_task($task_id)
{
    global $db;
    $query = 'UPDATE todo_task SET status = 0 WHERE taskID = :task_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':task_id', $task_id);
    $statement->execute();
    $statement->closeCursor();
}
?>