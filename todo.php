<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>
<body>
    <header>
        <div class="logo">
            <div class="logo_text">
                <div style="font-family: 'argue_demo'; font-size: 32px; color:white;">Academic Literary Organizer</div>
            </div>
        </div>
    </header>

    <section class="home">
        <div class="form_container">
            <div class="form todo_form">
                <h2 style="margin-top: 0px;">Todo List</h2>
                <form id="addTaskForm">
                    <div class="input_box">
                        <input type="text" id="info" placeholder="Task Description" required>
                    </div>
                    <div class="input_box">
                        <input type="date" id="date" required>
                    </div>
                    <div class="input_box">
                        <input type="text" id="title" placeholder="Task Title" required>
                    </div>
                    <div class="button_container">
                        <button type="submit" class="loginbtn">Add Task</button>
                    </div>
                </form>
                <div id="todoList" class="todo_list">
    <!-- Tasks will be displayed here -->
    <?php
    // Fetch and display tasks
    $stmt = $conn->prepare("SELECT * FROM todolist WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    // Display tasks
    while ($row = $result->fetch_assoc()) {
        $info = $row['info'];
        $date = $row['date'];
        $title = $row['title'];
        $id = $row['id'];

        // Determine due date color
        $dueDate = strtotime($date);
        $currentDate = time();
        $daysDifference = ($dueDate - $currentDate) / (60 * 60 * 24);
        $color = '';
        if ($daysDifference <= 1) {
            $color = 'red';
        } elseif ($daysDifference <= 3) {
            $color = 'yellow';
        } elseif ($daysDifference <= 5) {
            $color = 'green';
        } else {
            $color = 'inherit';
        }

        // Output task with due date color and delete button
        echo "<div id='task_$id' class='draggable' style='border-left: 5px solid $color; padding-left: 10px; margin-bottom: 10px;'>";
        echo "<strong>Title:</strong> $title<br>";
        echo "<strong>Description:</strong> $info<br>";
        echo "<strong>Due Date:</strong> $date<br>";
        echo "<button class='deleteTaskBtn' data-id='$id' style='margin-top: 5px;'>Delete</button>";
        echo "</div>";
    }
    ?>
</div>

            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="todo_script.js"></script>
</body>
</html>
