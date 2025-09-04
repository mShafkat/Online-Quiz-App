<?php
include('../includes/db.php');

$stmt = $pdo->query("SELECT * FROM quizzes");
$quizzes = $stmt->fetchAll();
?>

<h2>Welcome to the Quiz App</h2>
<p>Select a quiz to start:</p>
<ul>
    <?php foreach ($quizzes as $quiz): ?>
        <li><a href="quiz.php?quiz_id=<?php echo $quiz['id']; ?>"><?php echo $quiz['title']; ?></a></li>
    <?php endforeach; ?>
</ul>
