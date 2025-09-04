<?php
session_start();
include('../includes/db.php');

if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

$quiz_id = $_GET['quiz_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question_text = $_POST['question_text'];
    $correct_answer = $_POST['correct_answer'];
    
    $stmt = $pdo->prepare("INSERT INTO questions (quiz_id, question_text, correct_answer) VALUES (?, ?, ?)");
    $stmt->execute([$quiz_id, $question_text, $correct_answer]);

    $question_id = $pdo->lastInsertId();
    $answers = $_POST['answers'];
    
    foreach ($answers as $answer) {
        $stmt = $pdo->prepare("INSERT INTO answers (question_id, answer_text) VALUES (?, ?)");
        $stmt->execute([$question_id, $answer]);
    }
    header('Location: manage_quizzes.php');
}

?>

<h2>Manage Questions for Quiz</h2>
<form method="POST">
    <input type="text" name="question_text" placeholder="Question" required>
    <input type="text" name="correct_answer" placeholder="Correct Answer" required>
    <input type="text" name="answers[]" placeholder="Answer 1" required>
    <input type="text" name="answers[]" placeholder="Answer 2" required>
    <input type="text" name="answers[]" placeholder="Answer 3" required>
    <input type="text" name="answers[]" placeholder="Answer 4" required>
    <button type="submit">Add Question</button>
</form>
