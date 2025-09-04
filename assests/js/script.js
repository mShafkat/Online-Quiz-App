let timer = 600; 
let countdown = setInterval(function() {
    if (timer <= 0) {
        clearInterval(countdown);
        alert('Time is up!');
        document.getElementById('quiz-form').submit();  
    }
    let minutes = Math.floor(timer / 60);
    let seconds = timer % 60;
    document.getElementById('timer').innerText = `${minutes}:${seconds}`;
    timer--;
}, 1000);
