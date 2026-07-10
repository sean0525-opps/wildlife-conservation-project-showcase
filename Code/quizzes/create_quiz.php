<?php
session_start();

$home = "../../index.php";
$library = "../library.php";
$schools = "../schools.php";
$communities = "../communities.php";
$register = "../register.php";
$login = "../login.php";
$profile = "../profile.php";
$logout= "../logout.php";
$quiz = "#";
$game = "../game.php";
$leaderboard = "../leaderboard.php";

$home_class = "nav-item";
$library_class = "nav-item";
$schools_class = "nav-item";
$communities_class = "nav-item";
$quiz_class = "nav-item active";
$game_class = "nav-item";
$leaderboard_class = "nav-item";

$title = "Quiz";

include '../../template/navbar.php';
include '../../database.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Create Quiz</title>

<style>
body {
    font-family: Arial, sans-serif;
    text-align: center;
}

input, textarea {
    width: 60%;
    padding: 8px;
    margin: 5px;
}

.question-block {
    margin: 20px auto;
    padding: 15px;
    border: 2px solid #333;
    width: 60%;
    background: #f4f4f4;
}

button {
    padding: 10px 15px;
    margin: 10px;
    cursor: pointer;
}

#preview {
    width: 300px;
    margin-top: 10px;
    border: 2px solid #333;
}

.bg-grid {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 20px;
}

.bg-card {
    border: 3px solid transparent;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
    transition: 0.2s;
    width: 150px;
}

.bg-card img {
    width: 100%;
    height: 100px;
    object-fit: cover;
}

.bg-card:hover {
    transform: scale(1.05);
}

.bg-card.selected {
    border: 3px solid lime;
}

.answers {
    width: 60%;
    margin: 10px auto;
}

.answer-row {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1px; 
    margin: 5px 0;
}

.answer-row input[type="text"] {
    width: 250px;
}

.answer-row input[type="text"] {
    flex: 1;
}
</style>

</head>

<body>

<h2>Create Your Quiz</h2>

<form action="save_quiz.php" method="POST" enctype="multipart/form-data">

<input type="text" name="title" placeholder="Quiz Title" required><br>

<textarea name="description" placeholder="Description"></textarea><br>

<h3>Select Background</h3>

<div class="bg-grid">

    <div class="bg-card" onclick="selectBg('/images/Quizzes/Jungle_background.png', this)">
        <img src="/images/Quizzes/Jungle_background.png">
        <p>Jungle</p>
    </div>

    <div class="bg-card" onclick="selectBg('/images/Quizzes/Island_background.png', this)">
        <img src="/images/Quizzes/Island_background.png">
        <p>Island</p>
    </div>

    <div class="bg-card" onclick="selectBg('/images/Quizzes/Ocean_background.png', this)">
        <img src="/images/Quizzes/Ocean_background.png">
        <p>Ocean</p>
    </div>

</div>

<input type="hidden" name="preset_background" id="selectedBg">

<br><br>

<label>Or Upload Your Own:</label><br>
<input type="file" name="background" id="upload"><br>

<br>
<img id="preview" src="" alt="Background preview will appear here">

<hr>

<div id="questions"></div>

<button type="button" onclick="addQuestion()">Add Question</button><br>

<button type="submit">Save Quiz</button>

</form>

<script>
let qCount = 0;

// Add first question automatically (prevents empty submit)
addQuestion();

function addQuestion() {
    let div = document.createElement("div");
    div.className = "question-block";

    let index = document.querySelectorAll(".question-block").length;

    div.innerHTML = `
    <h4>Question ${index + 1}</h4>

    <input name="questions[${index}][text]" placeholder="Enter question" required><br>

    <div class="answers">
      <div class="answer-row">
        <input type="radio" name="correct[${index}]" value="0" required>
        <input type="text" name="questions[${index}][answers][]" placeholder="Answer 1" required>
      </div>
      <div class="answer-row">
        <input type="radio" name="correct[${index}]" value="1">
        <input type="text" name="questions[${index}][answers][]" placeholder="Answer 2" required>
      </div>
      <div class="answer-row">
        <input type="radio" name="correct[${index}]" value="2">
        <input type="text" name="questions[${index}][answers][]" placeholder="Answer 3" required>
      </div>
      <div class="answer-row">
        <input type="radio" name="correct[${index}]" value="3">
        <input type="text" name="questions[${index}][answers][]" placeholder="Answer 4" required>
      </div>
    </div>

    <button type="button" onclick="removeQuestion(this)" style="background:red;color:white;">
      Remove Question
    </button>
    `;

    document.getElementById("questions").appendChild(div);
    qCount = document.querySelectorAll(".question-block").length; 
}
function removeQuestion(button) {
    if (document.querySelectorAll(".question-block").length <= 1) {
        alert("You must have at least one question!");
        return;
    }
    button.parentElement.remove();
    updateQuestionNumbers();
}

function updateQuestionNumbers() {
    const questionBlocks = document.querySelectorAll(".question-block");
    qCount = 0;

    questionBlocks.forEach((block, index) => {
        block.querySelector("h4").innerText = "Question " + (index + 1);

        const questionInput = block.querySelector("input[placeholder='Enter question']");
        if (questionInput) questionInput.name = `questions[${index}][text]`;

        const rows = block.querySelectorAll(".answer-row");
        rows.forEach((row, i) => {
            row.querySelector("input[type='radio']").name = `correct[${index}]`;
            row.querySelector("input[type='radio']").value = i;
            row.querySelector("input[type='text']").name = `questions[${index}][answers][]`;
        });

        qCount++;
    });
}

// Background selection
function selectBg(path, element) {

    document.getElementById("selectedBg").value = path;

    document.querySelectorAll(".bg-card").forEach(card => {
        card.classList.remove("selected");
    });

    element.classList.add("selected");

    document.getElementById("preview").src = path;
}

// Upload preview
document.getElementById("upload").addEventListener("change", function(e) {
    const file = e.target.files[0];
    if (file) {
        document.getElementById("preview").src = URL.createObjectURL(file);
    }
});

// Prevent empty quiz submit
document.querySelector("form").addEventListener("submit", function(e) {
    if (qCount === 0) {
        alert("Add at least one question!");
        e.preventDefault();
        return;
    }

    const presetSelected = document.getElementById("selectedBg").value !== "";
    const fileSelected = document.getElementById("upload").files.length > 0;

    if (!presetSelected && !fileSelected) {
        alert("Please select a background image or upload your own!");
        e.preventDefault();
        return;
    }
});
</script>

</body>
</html>