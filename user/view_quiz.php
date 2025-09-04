<?php
session_start();
include('../includes/db.php');

// Check if quiz_id is provided in the URL
if (!isset($_GET['quiz_id']) || empty($_GET['quiz_id'])) {
    echo "Quiz not found.";
    exit();
}

$quiz_id = $_GET['quiz_id'];

// Fetch quiz details
$stmt = $pdo->prepare("SELECT * FROM quizzes WHERE id = ?");
$stmt->execute([$quiz_id]);
$quiz = $stmt->fetch();

// If quiz doesn't exist
if (!$quiz) {
    echo "Quiz not found.";
    exit();
}

// Fetch questions and answers for the quiz
$stmt = $pdo->prepare("SELECT * FROM questions WHERE quiz_id = ?");
$stmt->execute([$quiz_id]);
$questions = $stmt->fetchAll();

?>

<h2><?php echo htmlspecialchars($quiz['title']); ?></h2>
<p><?php echo nl2br(htmlspecialchars($quiz['description'])); ?></p>

<form action="quiz.php" method="POST" id="quiz-form">
    <?php foreach ($questions as $question): ?>
        <div>
            <p><strong>Question: </strong><?php echo htmlspecialchars($question['question_text']); ?></p>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM answers WHERE question_id = ?");
            $stmt->execute([$question['id']]);
            $answers = $stmt->fetchAll();
            ?>
            <div>
                <?php foreach ($answers as $answer): ?>
                    <input type="radio" name="q<?php echo $question['id']; ?>" value="<?php echo htmlspecialchars($answer['answer_text']); ?>" id="q<?php echo $question['id']; ?>_answer_<?php echo $answer['id']; ?>">
                    <label for="q<?php echo $question['id']; ?>_answer_<?php echo $answer['id']; ?>"><?php echo htmlspecialchars($answer['answer_text']); ?></label><br>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <button type="submit">Submit Quiz</button>
</form>

