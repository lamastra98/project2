<?php include '../view/header.php';

$incompleteTask = array();
$completeTask = array();

foreach ($tasks as $task) : 

if($task['status'] == 0)
{
    $incompleteTask[] = $task;
}
else
{
    $completeTask[] = $task;
}

endforeach;
?>

<main>
    <section>
        <h2>Hello, <?php echo($name);?>!</h2>

        <h3>My Tasks</h3>
            <table>
                <tr>
                    <th>Task Name</th>
                    <th>Due Date</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>Complete</th>
                </tr>
                <?php foreach ($incompleteTask as $task) :?>
                <tr>
                    <td><?php echo $task['name']; ?></td>
                    <td><?php echo $task['dueDate']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_task">
                            <input type="hidden" name="task_id"
                           value="<?php echo $task['taskID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="show_edit_form">
                            <input type="hidden" name="task_id"
                           value="<?php echo $task['taskID']; ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="complete_task">
                            <input type="hidden" name="task_id"
                           value="<?php echo $task['taskID']; ?>">
                            <input type="submit" value="Complete">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <p class="last_paragraph"><a href="?action=show_add_form">Click here to make a new task.</a></p>
            <h3>Completed Tasks</h3>
            <table>
                <tr>
                    <th>Task Name</th>
                    <th>Due Date</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>Complete</th>
                </tr>
                <?php foreach ($completeTask as $task) :?>
                <tr>
                    <td><?php echo $task['name']; ?></td>
                    <td><?php echo $task['dueDate']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_task">
                            <input type="hidden" name="task_id"
                           value="<?php echo $task['taskID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="show_edit_form">
                            <input type="hidden" name="task_id"
                           value="<?php echo $task['taskID']; ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="incomplete_task">
                            <input type="hidden" name="task_id"
                           value="<?php echo $task['taskID']; ?>">
                            <input type="submit" value="Incomplete">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

        <p class="last_paragraph"><a href="?action=logout">Click here to log out.</a></p>       
    </section>
</main>
<?php include '../view/footer.php'; ?>