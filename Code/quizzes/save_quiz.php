<?php
session_start();
include '../../database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$title = mysqli_real_escape_string($connection, $_POST['title']);
$description = mysqli_real_escape_string($connection, $_POST['description']);
$background_path = "";

if (!empty($_POST['preset_background'])) {
    $background_path = $_POST['preset_background'];
}

if (!empty($_FILES['background']['name'])) {
    $target_dir = "../../images/Quizzes/uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $filename = time() . "_" . basename($_FILES["background"]["name"]);
    $target_file = $target_dir . $filename;
    if (move_uploaded_file($_FILES["background"]["tmp_name"], $target_file)) {
        $background_path = "/images/Quizzes/uploads/" . $filename;
    }
}

mysqli_query($connection, "
    INSERT INTO user_quizzes (user_id, title, description, background)
    VALUES ($user_id, '$title', '$description', '$background_path')
");
$quiz_id = mysqli_insert_id($connection);

foreach ($_POST['questions'] as $qIndex => $qData) {
    $question_text = mysqli_real_escape_string($connection, $qData['text']);
    mysqli_query($connection, "
        INSERT INTO user_questions (quiz_id, question)
        VALUES ($quiz_id, '$question_text')
    ");
    $question_id = mysqli_insert_id($connection);

    foreach ($qData['answers'] as $aIndex => $answer) {
        $answer = mysqli_real_escape_string($connection, $answer);
        $is_correct = ($_POST['correct'][$qIndex] == $aIndex) ? 1 : 0;
        mysqli_query($connection, "
            INSERT INTO user_answers (question_id, answer, is_correct)
            VALUES ($question_id, '$answer', $is_correct)
        ");
    }
}

header("Location: play_user_quiz.php?id=" . $quiz_id);
exit;
?>