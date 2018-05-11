<?php
require('../model/database.php');
require('../model/user_db.php');
require('../model/task_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_tasks';
    }
}

if ($action == 'list_tasks')
{
    $tasks = get_tasks($_COOKIE["user"]);
    $name = get_userName($_COOKIE["user"]);
    include('task_list.php');
}
else if ($action == 'delete_task')
{
    $task_id = filter_input(INPUT_POST, 'task_id', 
            FILTER_VALIDATE_INT);
    if ($task_id == NULL || task_id == FALSE)
    {
        $error = "Missing or incorrect task id.";
        include('../errors/error.php');
    }
    else
    { 
        delete_task($task_id);
        header("Location: .");
    }
}
else if ($action == 'show_add_form')
{
    include('task_add.php');    
}
else if ($action == 'add_task')
{
    $userID = $_COOKIE["user"];
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    $dueDate = filter_input(INPUT_POST, 'dueDate');
    $dueTime = filter_input(INPUT_POST, 'dueTime');
    if ($name == NULL || $description == NULL || $dueDate == NULL || $dueDate == FALSE || $dueTime == NULL || $dueTime == FALSE)
    {
        $error = "Invalid task data. Check all fields and try again.";
        include('../errors/error.php');
    }
    else
    { 
        add_task($userID, $name, $description, $dueDate, $dueTime);
        header("Location: .");
    }
}
else if ($action == 'show_edit_form')
{
    $task_id = filter_input(INPUT_POST, 'task_id', 
            FILTER_VALIDATE_INT);
    if ($task_id == NULL || task_id == FALSE)
    {
        $error = "Missing or incorrect task id.";
        include('../errors/error.php');
    }
    else
    { 
        include('task_edit.php');
    }
}
else if ($action == 'edit_task')
{
    $task_id = filter_input(INPUT_POST, 'task_id', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    $dueDate = filter_input(INPUT_POST, 'dueDate');
    $dueTime = filter_input(INPUT_POST, 'dueTime');
    if ($task_id == NULL || $task_id == FALSE || $name == NULL || $description == NULL || $dueDate == NULL || $dueDate == FALSE || $dueTime == NULL || $dueTime == FALSE)
    {
        $error = "Invalid task data. Check all fields and try again.";
        include('../errors/error.php');
    }
    else
    { 
        edit_task($task_id, $name, $description, $dueDate, $dueTime);
        header("Location: .");
    }
}
else if ($action == 'complete_task')
{
    $task_id = filter_input(INPUT_POST, 'task_id', 
            FILTER_VALIDATE_INT);
    if ($task_id == NULL || task_id == FALSE)
    {
        $error = "Missing or incorrect task id.";
        include('../errors/error.php');
    }
    else
    { 
        complete_task($task_id);
        header("Location: .");
    }
}
else if ($action == 'incomplete_task')
{
    $task_id = filter_input(INPUT_POST, 'task_id', 
            FILTER_VALIDATE_INT);
    if ($task_id == NULL || task_id == FALSE)
    {
        $error = "Missing or incorrect task id.";
        include('../errors/error.php');
    }
    else
    { 
        incomplete_task($task_id);
        header("Location: .");
    }
}
else if ($action == 'logout')
{
    if(isset($_COOKIE["user"]))
    {
        setcookie("user", "", time() - 3600);
    }
    header("Location: ../login/index.php");
}
?>