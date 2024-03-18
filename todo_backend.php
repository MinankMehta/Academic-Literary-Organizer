<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    echo "User is not logged in";
    exit();
}

// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle AJAX requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['action'] == 'addTask') {
        $info = $_POST['info'];
        $date = $_POST['date'];
        $title = $_POST['title'];

        // Insert task into database
        $stmt = $conn->prepare("INSERT INTO todolist (info, date, title, username) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $info, $date, $title, $username);
        $stmt->execute();
        $stmt->close();
    } elseif ($_POST['action'] == 'getTasks') {
        // Get tasks from database
        $result = $conn->query("SELECT * FROM todolist WHERE username = '$username'");

        // Output tasks as JSON
        $tasks = array();
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
        echo json_encode($tasks);
    }
}

$conn->close();
