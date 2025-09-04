<?php
include('../includes/db.php');

$quiz_id = $_GET['quiz_id'];

$stmt = $pdo->prepare("SELECT * FROM quizzes WHERE id = ?");
$stmt->execute([$quiz_id]);
$quiz = $stmt->fetch();

$stmt = $pdo->prepare("SELECT * FROM questions WHERE quiz_id = ?");
$stmt->execute([$quiz_id]);
$questions = $stmt->fetchAll();
?>

<h2><?php echo $quiz['title']; ?></h2>
<p><?php echo $quiz['description']; ?></p>

<form action="submit_quiz.php" method="POST" id="quiz-form">
    <?php foreach ($questions as $question): ?>
        <div>
            <p><?php echo $question['question_text']; ?></p>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM answers WHERE question_id = ?");
            $stmt->execute([$question['id']]);
            $answers = $stmt->fetchAll();
            ?>
            <?php foreach ($answers as $answer): ?>
                <input type="radio" name="q<?php echo $question['id']; ?>" value="<?php echo $answer['answer_text']; ?>">
                <?php echo $answer['answer_text']; ?><br>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    <button type="submit">Submit</button>
</form>
