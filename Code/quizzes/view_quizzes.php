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
$title = "Community Quizzes";
include '../../template/navbar.php';
include '../../database.php';

$result = mysqli_query($connection, "SELECT * FROM user_quizzes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<br>
<center><h2>Community Quizzes</h2></center>
<center><p style="font-size:20px">Quizzes created by teachers and the community.</p></center>

<div class="container-fluid">
    <?php
    $quizzes = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $quizzes[] = $row;
    }

    // Split into rows of 8
    $chunks = array_chunk($quizzes, 8);

    foreach ($chunks as $chunk) {
        echo '<div class="card-group" style="margin-bottom: 20px;">';

        foreach ($chunk as $row) { ?>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top"
                     src="<?= htmlspecialchars($row['background']) ?>"
                     alt="<?= htmlspecialchars($row['title']) ?>"
                     style="height:180px; object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
                    <center>
                        <a href="play_user_quiz.php?id=<?= $row['id'] ?>" class="btn btn-primary">Play</a>
                    </center>
                </div>
            </div>
        <?php }

        // Fill remaining slots with blank cards
        $remaining = 8 - count($chunk);
        for ($i = 0; $i < $remaining; $i++) {
            echo '<div class="card" style="width: 18rem; background: transparent; border: none;"></div>';
        }

        echo '</div>';
    }
    ?>
</div>

<br>
<?php include '../../template/footer.php'; ?>
</body>
</html>