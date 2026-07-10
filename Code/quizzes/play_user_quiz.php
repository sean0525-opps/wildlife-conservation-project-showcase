<?php
session_start();
include '../../database.php';

// All logic BEFORE navbar
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$quiz_id = intval($_GET['id']);

$quiz_data = mysqli_fetch_assoc(mysqli_query($connection,
    "SELECT * FROM user_quizzes WHERE id = $quiz_id"
));

if (!$quiz_data) {
    header("Location: ../quiz.php");
    exit;
}

$questions = mysqli_query($connection,
    "SELECT * FROM user_questions WHERE quiz_id = $quiz_id"
);

// NOW include navbar after all redirects are done
$home = "../../index.php";
$library = "../library.php";
$schools = "../schools.php";
$communities = "../communities.php";
$register = "../register.php";
$login = "../login.php";
$profile = "../profile.php";
$logout = "../logout.php";
$quiz = "../quiz.php";
$game = "../game.php";
$leaderboard = "../leaderboard.php";

$home_class = "nav-item";
$library_class = "nav-item";
$schools_class = "nav-item";
$communities_class = "nav-item";
$quiz_class = "nav-item active";
$game_class = "nav-item";
$leaderboard_class = "nav-item";

$title = "Play Quiz";

include '../../template/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body { background-color: #f2f2f2; }

body::before {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-image: url('<?= htmlspecialchars($quiz_data['background']) ?>');
    background-repeat: no-repeat;
    background-position: center top;
    background-size: cover;
    z-index: -1;
}

.card {
    border: 40px solid transparent;
    border-image: url('../../images/Quizzes/border.png') 120 round;
    background: rgba(255,255,255,0.95);
}

.card-body { background-color: #228B22; }

.back-btn {
    position: fixed;
    top: 120px;
    right: 20px;
    background-color: rgba(0,0,0,0.3);
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255,255,255,0.3);
    z-index: 1000;
}
.back-btn:hover { background-color: rgba(0,0,0,0.5); }

.question-text { color: white; }
label { color: white; }
</style>
</head>

<body>
<a href="../../pages/quizzes/view_quizzes.php" class="back-btn">Back to Quizzes</a>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center mb-4" style="color:white;">
                        <?= htmlspecialchars($quiz_data['title']) ?>
                    </h3>

                    <form method="POST" action="submit_user_quiz.php?id=<?= $quiz_id ?>">
                    <?php
                    $qNum = 1;
                    while ($q = mysqli_fetch_assoc($questions)):
                        $answers = mysqli_query($connection,
                            "SELECT * FROM user_answers WHERE question_id = {$q['id']}"
                        );
                    ?>
                        <div class="mb-4">
                            <p class="question-text">
                                <?= $qNum ?>. <?= htmlspecialchars($q['question']) ?>
                            </p>
                            <?php while ($a = mysqli_fetch_assoc($answers)): ?>
                                <label>
                                    <input type="radio" name="q<?= $q['id'] ?>" value="<?= $a['id'] ?>" required>
                                    <?= htmlspecialchars($a['answer']) ?>
                                </label><br>
                            <?php endwhile; ?>
                        </div>
                    <?php
                        $qNum++;
                    endwhile;
                    ?>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Submit Quiz</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../template/footer.php'; ?>
</body>
</html>
