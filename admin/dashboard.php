<?php
session_start();
include('../includes/db.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

$stmt = $pdo->query("SELECT * FROM quizzes");
$quizzes = $stmt->fetchAll();
?>

<h2>Welcome, Admin</h2>
<a href="manage_quizzes.php">Manage Quizzes</a>
<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($quizzes as $quiz): ?>
        <tr>
            <td><?php echo $quiz['title']; ?></td>
            <td><?php echo $quiz['description']; ?></td>
            <td><a href="manage_questions.php?quiz_id=<?php echo $quiz['id']; ?>">Manage Questions</a></td>
        </tr>
    <?php endforeach; ?>
</table>
