<?php
session_start();
include('../includes/db.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $stmt = $pdo->prepare("INSERT INTO quizzes (title, description, created_by) VALUES (?, ?, ?)");
    $stmt->execute([$title, $description, $_SESSION['user_id']]);
    header('Location: dashboard.php');
}
?>

<h2>Manage Quizzes</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Quiz Title" required>
    <textarea name="description" placeholder="Quiz Description" required></textarea>
    <button type="submit">Add Quiz</button>
</form>
