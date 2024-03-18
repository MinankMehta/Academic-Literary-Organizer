<?php
session_start(); // Start session to access $_SESSION['username']

// Include your database connection file using academic_records.sql
$servername = "127.0.0.1";
$username = "root";
$password = " ";
$database = "academic_records";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch and display tasks
$stmt = $conn->prepare("SELECT * FROM todolist WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']); // Use $_SESSION['username']
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
