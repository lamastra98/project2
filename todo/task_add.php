<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>New Task</h1>
        <form action="index.php" method="post" id="add_task_form">
            <input type="hidden" name="action" value="add_task">

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
            <input type="submit" value="Create Task" />
            <br>
        </form>
        <p class="last_paragraph">
            <a href="index.php?action=list_tasks">Back to Tasks</a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>