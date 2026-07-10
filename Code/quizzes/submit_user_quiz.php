<?php
session_start();

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

$title = "Quiz Results";

include '../../template/navbar.php';
include '../../database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$quiz_id = intval($_GET['id']);
$score = 0;
$total = 0;

foreach ($_POST as $question => $answer_id) {
    $answer_id = intval($answer_id);
    $result = mysqli_query($connection,
        "SELECT is_correct FROM user_answers WHERE id = $answer_id"
    );
    $row = mysqli_fetch_assoc($result);
    if ($row['is_correct']) $score++;
    $total++;
}

$check = mysqli_query($connection, "
    SELECT score FROM user_quiz_scores 
    WHERE user_id = $user_id AND quiz_id = $quiz_id
");

if (mysqli_num_rows($check) > 0) {
    // update ONLY if higher
    mysqli_query($connection, "
        UPDATE user_quiz_scores
        SET score = $score
        WHERE user_id = $user_id 
        AND quiz_id = $quiz_id 
        AND score < $score
    ");
} else {
    // insert first score
    mysqli_query($connection, "
        INSERT INTO user_quiz_scores (user_id, quiz_id, score)
        VALUES ($user_id, $quiz_id, $score)
    ");
}

$quiz_data = mysqli_fetch_assoc(mysqli_query($connection,
    "SELECT * FROM user_quizzes WHERE id = $quiz_id"
));

$percentage = $total > 0 ? round(($score / $total) * 100) : 0;

if ($percentage == 100) {
    $message = "Perfect score! Amazing!";
} elseif ($percentage >= 60) {
    $message = "Good effort! Keep it up!";
} else {
    $message = "Better luck next time!";
}
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

.leaderboard {
    border-collapse: collapse;
    width: 100%;
    margin: 20px auto;
    font-family: Arial, sans-serif;
}
.leaderboard th {
    background-color: #333;
    color: white;
    padding: 10px;
}
.leaderboard td {
    padding: 10px;
    border-bottom: 1px solid black;
    color: black;
}
.leaderboard tr:nth-child(even) { background-color: Lime; }
.leaderboard tr:nth-child(odd)  { background-color: Green; }
.leaderboard tr:nth-child(2)    { background-color: #FFD700; }
.leaderboard tr:nth-child(3)    { background-color: #C1C1C1; }
.leaderboard tr:nth-child(4)    { background-color: #CD8946; }

.card {
    border: 40px solid transparent;
    border-image: url('../../images/Quizzes/border.png') 120 round;
    background: rgba(255,255,255,0.95);
}
.card-body { background-color: #228B22; color: white; }

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

.score-circle {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: rgba(0,0,0,0.3);
    border: 5px solid white;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px auto;
    font-size: 2.5rem;
    font-weight: bold;
    color: white;
}
</style>
</head>

<body>
<a href="../quiz.php" class="back-btn">Back to Quizzes</a>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body text-center">

                    <h3 class="mb-2"><?= htmlspecialchars($quiz_data['title']) ?></h3>

                    <div class="score-circle">
                        <?= $score ?>/<?= $total ?>
                    </div>

                    <h4><?= $percentage ?>%</h4>
                    <p><?= $message ?></p>

                    <div class="mt-3 mb-4">
                        <a href="play_user_quiz.php?id=<?= $quiz_id ?>" class="btn btn-light me-2">Try Again</a>
                        <a href="../quiz.php" class="btn btn-primary">Back to Quizzes</a>
                    </div>

                    <h4>Leaderboard</h4>
                    <table class="leaderboard">
                        <tr>
                            <th>Rank</th>
                            <th>Username</th>
                            <th>Score</th>
                        </tr>
                        <?php
                        $lb = mysqli_query($connection, "
                            SELECT users.username, user_quiz_scores.score
                            FROM user_quiz_scores
                            JOIN users ON user_quiz_scores.user_id = users.id
                            WHERE user_quiz_scores.quiz_id = $quiz_id
                            ORDER BY user_quiz_scores.score DESC
                            LIMIT 10
                        ");
                        $rank = 1;
                        while ($row = mysqli_fetch_assoc($lb)):
                            $suffix = match($rank) { 1 => "st", 2 => "nd", 3 => "rd", default => "th" };
                        ?>
                        <tr>
                            <td><?= $rank . $suffix ?></td>
                            <td><?= htmlspecialchars($row['username']) ?></td>
                            <td><?= $row['score'] ?></td>
                        </tr>
                        <?php
                            $rank++;
                        endwhile;
                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../template/footer.php'; ?>
</body>
</html>