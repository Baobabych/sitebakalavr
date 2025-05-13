let quiz = [];
let quizSubmitted = false;
let autoSubmitTimeout;
let timeLeft = 30 * 60; // 30 хв у секундах

const quizContainer = document.getElementById("quiz");

function loadQuiz() {
    const xhr = new XMLHttpRequest();
    const currentUrl = window.location.href;
    const url = new URL(currentUrl);
    const id = url.searchParams.get('id'); //отримуємо id вікторини
    xhr.open('GET', 'lib/get_quiz.php?id=' + id, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            quiz = JSON.parse(xhr.responseText);
            displayQuiz(quiz);
        }
    };

    xhr.send();
}

function displayQuiz(quiz) {
    const output = [];

    quiz.forEach((currentQuestion, questionNumber) => {
        const answers = [];

        if (currentQuestion.type === "text" || !currentQuestion.answers) {
            answers.push(`<input type="text" name="question${questionNumber}">`);
        } else {
            for (let i = 0; i < currentQuestion.answers.length; i++) {
                answers.push(
                    `<label>
                        <input type="${currentQuestion.type}" name="question${questionNumber}" value="${i}">
                        ${currentQuestion.answers[i].text}
                    </label>`
                );
            }
        }

        output.push(
            `<li>
                <div class="question"><strong>${currentQuestion.question}</strong></div>
                <div class="answers">${answers.join("")}</div>
            </li>`
        );

        output.push('<div style="margin-bottom:20px;"></div>');
    });

    if (quiz.length === 0) {
        document.getElementById("err").style.display = 'block';
        document.getElementById('quiz').style.display = 'none';
        document.getElementById('submit').style.display = 'none';
    }

    quizContainer.innerHTML = output.join("");
}

function updateTimer() {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    document.getElementById('timer').textContent =
        `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

    if (timeLeft > 0) {
        timeLeft--;
        setTimeout(updateTimer, 1000);
    }
}

function submitQuiz() {
    if (quizSubmitted) return;
    quizSubmitted = true;
    clearTimeout(autoSubmitTimeout);

    const answerContainers = quizContainer.querySelectorAll(".answers");
    let numCorrect = 0;

    quiz.forEach((currentQuestion, questionNumber) => {
        const answerContainer = answerContainers[questionNumber];
        const selector = `input[name=question${questionNumber}]:checked`;
        const userAnswerContainer = answerContainer.querySelector(selector);
        const userAnswer = userAnswerContainer ? userAnswerContainer.value : null;

        if (userAnswer !== null) {
            const selectedAnswerIndex = parseInt(userAnswer);

            const allAnswers = answerContainer.querySelectorAll("input[type=radio], input[type=checkbox]");
            for (let i = 0; i < allAnswers.length; i++) {
                if (currentQuestion.answers[i].correct == 1) {
                    allAnswers[i].parentNode.style.color = "green";
                } else {
                    allAnswers[i].parentNode.style.color = "red";
                }
            }

            if (currentQuestion.answers[selectedAnswerIndex].correct == 1) {
                numCorrect++;
            }
        } else if (currentQuestion.type === "text") {
            const userAnswer = answerContainer.querySelector(`input[type=text]`).value;
            if (userAnswer !== "") {
                const existingResult = answerContainer.querySelector("span");
                if (existingResult) existingResult.remove();

                const resultText = document.createElement('span');
                if (userAnswer.toUpperCase() === currentQuestion.correct.toUpperCase()) {
                    numCorrect++;
                    answerContainer.style.color = "green";
                    resultText.textContent = "Правильно";
                    resultText.style.color = "green";
                } else {
                    answerContainer.style.color = "red";
                    resultText.textContent = "Неправильно";
                    resultText.style.color = "red";
                }
                answerContainer.appendChild(resultText);
            }
        }
    });

    save(numCorrect, quiz.length);
    document.getElementById("res").innerHTML = `Ви вірно відповіли на ${numCorrect} із ${quiz.length} питань`;
}

function save(numCorrect, countQuest) {
    const currentUrl = window.location.href;
    const url = new URL(currentUrl);
    const id = url.searchParams.get('id');
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "lib/sendQuiz.php", true);
    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    const body = JSON.stringify({
        id: id,
        result: numCorrect,
        count_quest: countQuest
    });
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 201) {
            console.log(JSON.parse(xhr.responseText));
        } else {
            console.log(`Error: ${xhr.status}`);
        }
    };
    xhr.send(body);
}

// Завантаження вікторини і запуск таймера
window.onload = function () {
    loadQuiz();
    updateTimer();
    autoSubmitTimeout = setTimeout(() => {
        submitQuiz();
    }, 30 * 60 * 1000); // 30 хв
};
