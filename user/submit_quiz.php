<?php
include('includes/db.php');
session_start();

$quiz_id = $_POST['quiz_id'];  // Assuming you pass quiz_id from quiz.php
foreach ($_POST as $key => $value) {
    if (strpos($key, 'q') === 0) {
        $question_id = substr($key, 1);
        $stmt = $pdo->prepare("INSERT INTO user_responses (user_id, quiz_id, question_id, selected_answer) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_SESSION['user_id'], $quiz_id, $question_id, $value]);
    }
}
header('Location: result.php');
?>
