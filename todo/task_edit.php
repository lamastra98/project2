<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Edit Task</h1>
        <form action="index.php" method="post" id="edit_task_form">
            <input type="hidden" name="action" value="edit_task">

            <label>Name:</label>
            <input type="text" name="name" />
            <br>

            <label>Description:</label>
            <input type="text" name="description" />
            <br>

            <label>Due Date:</label>
            <input type="date" name="dueDate" />
            <br>

            <label>Due Time:</label>
            <input type="time" name="dueTime" />
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Edit Task" />

            <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
            <br>
        </form>
        <p class="last_paragraph">
            <a href="index.php?action=list_tasks">Back to Tasks</a>
        </p>
    </section>

</main>
<?php include '../view/footer.php'; ?>