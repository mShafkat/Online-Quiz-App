// Example: Countdown Timer for Quiz
let timer = 600; // 10 minutes
let countdown = setInterval(function() {
    if (timer <= 0) {
        clearInterval(countdown);
        alert('Time is up!');
        document.getElementById('quiz-form').submit();  // Auto submit the quiz
    }
    let minutes = Math.floor(timer / 60);
    let seconds = timer % 60;
    document.getElementById('timer').innerText = `${minutes}:${seconds}`;
    timer--;
}, 1000);
