<?php
include('../includes/db.php');
session_start();

$user_id = $_SESSION['user_id'];
$quiz_id = $_GET['quiz_id'];

$stmt = $pdo->prepare("SELECT * FROM user_responses WHERE user_id = ? AND quiz_id = ?");
$stmt->execute([$user_id, $quiz_id]);
$responses = $stmt->fetchAll();

foreach ($responses as $response) {
    $question_id = $response['question_id'];
    $selected_answer = $response['selected_answer'];

    $stmt = $pdo->prepare("SELECT correct_answer FROM questions WHERE id = ?");
    $stmt->execute([$question_id]);
    $correct_answer = $stmt->fetchColumn();

    echo "Question: $question_id - Selected Answer: $selected_answer - Correct Answer: $correct_answer<br>";
}
?>
