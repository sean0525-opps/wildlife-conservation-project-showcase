<?php
session_start();
include '../../database.php';

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

$quiz = $_POST['quiz'];

$answers = [

"general" => [
"q1"=>"b","q2"=>"b","q3"=>"c","q4"=>"c","q5"=>"b",
"q6"=>"a","q7"=>"b","q8"=>"b","q9"=>"a","q10"=>"b"
],

"sumatran_orangutan" => [
"q1"=>"b","q2"=>"c","q3"=>"b","q4"=>"b","q5"=>"b",
"q6"=>"b","q7"=>"b","q8"=>"a","q9"=>"b","q10"=>"b"
],

"komodo_dragon" => [
"q1"=>"a","q2"=>"c","q3"=>"a","q4"=>"b","q5"=>"b",
"q6"=>"a","q7"=>"c","q8"=>"a","q9"=>"b","q10"=>"a"
],

"sumatran_tiger" => [
"q1"=>"b","q2"=>"b","q3"=>"b","q4"=>"b","q5"=>"b",
"q6"=>"b","q7"=>"b","q8"=>"b","q9"=>"a","q10"=>"b"
],

"javan_rhino" => [
"q1"=>"b","q2"=>"b","q3"=>"b","q4"=>"b","q5"=>"a",
"q6"=>"b","q7"=>"b","q8"=>"b","q9"=>"b","q10"=>"a"
],

"bali_myna" => [
"q1"=>"b","q2"=>"b","q3"=>"b","q4"=>"a","q5"=>"b",
"q6"=>"b","q7"=>"a","q8"=>"a","q9"=>"a","q10"=>"b"
],

"sea_turtle" => [
"q1"=>"b","q2"=>"b","q3"=>"a","q4"=>"b","q5"=>"a",
"q6"=>"a","q7"=>"b","q8"=>"a","q9"=>"b","q10"=>"a"
],

"anoa" => [
"q1"=>"b","q2"=>"a","q3"=>"a","q4"=>"b","q5"=>"b",
"q6"=>"a","q7"=>"a","q8"=>"b","q9"=>"a","q10"=>"b"
]

];

$score = 0;

foreach($answers[$quiz] as $question=>$correct){
  if(isset($_POST[$question]) && $_POST[$question] == $correct){
    $score++;
  }
}

$total = count($answers[$quiz]);
$percentage = round(($score / $total) * 100);

if ($percentage == 100) {
  $message = "Perfect score! Amazing!";
} elseif ($percentage >= 60) {
  $message = "Good effort! Keep it up!";
} else {
  $message = "Better luck next time!";
}

if (!isset($_SESSION['username']))
  {
    echo '
    <div style="text-align:center;">
      <p style="color:white; text-shadow:1px 1px 3px black;"><strong>Sign in to save your score!</strong></p>
      <a href="../login.php" class="btn btn-primary">Login</a>
      <a href="../register.php" class="btn btn-success">Sign Up</a>
    </div>
    ';
  }

#Get ID from session username
$user_id_request = mysqli_prepare($connection, "SELECT `id` FROM `users` WHERE `username` = ?");
mysqli_stmt_bind_param($user_id_request, "s", $_SESSION['username']);
mysqli_stmt_execute($user_id_request);
$user_id_result = mysqli_stmt_get_result($user_id_request);
$user_id_undone = mysqli_fetch_assoc($user_id_result);
$user_id = $user_id_undone['id'];

$table_column = "";
if ($quiz == "general") {
  $table_column = "General";
} elseif ($quiz == "sumatran_orangutan") {
  $table_column = "Orangutan";
} elseif ($quiz == "komodo_dragon") {
  $table_column = "Komodo_Dragon";
} elseif ($quiz == "sumatran_tiger") {
  $table_column = "Tiger";
} elseif ($quiz == "javan_rhino") {
  $table_column = "Rhino";
} elseif ($quiz == "bali_myna") {
  $table_column = "Bali_Myna";
} elseif ($quiz == "sea_turtle") {
  $table_column = "Turtle";
} elseif ($quiz == "anoa") {
  $table_column = "Anoa";
}

$backgrounds = [
  "general"            => "../../images/Quizzes/Island_background.png",
  "sumatran_orangutan" => "../../images/Quizzes/Jungle_background.png",
  "komodo_dragon"      => "../../images/Quizzes/Island_background.png",
  "sumatran_tiger"     => "../../images/Quizzes/Jungle_background.png",
  "javan_rhino"        => "../../images/Quizzes/Jungle_background.png",
  "bali_myna"          => "../../images/Quizzes/Ocean_background.png",
  "sea_turtle"         => "../../images/Quizzes/Ocean_background.png",
  "anoa"               => "../../images/Quizzes/Jungle_background.png"
];

$bg = $backgrounds[$quiz] ?? "../../images/Quizzes/Island_background.png";

#overwrite saved score with new score if higher than saved score
$update_score_query = mysqli_prepare($connection,
"UPDATE `quiz_scores` SET `$table_column` = ? WHERE `id` = ? AND `$table_column` < ?");
  
mysqli_stmt_bind_param($update_score_query, "iii", $score, $user_id, $score);
mysqli_stmt_execute($update_score_query);

$quiz_names = [
    "general" => "General Knowledge",
    "sumatran_orangutan" => "Sumatran Orangutan",
    "komodo_dragon" => "Komodo Dragon",
    "sumatran_tiger" => "Sumatran Tiger",
    "javan_rhino" => "Javan Rhino",
    "bali_myna" => "Bali Myna",
    "sea_turtle" => "Sea Turtle",
    "anoa" => "Anoa"
];
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
        background-image: url('<?= $bg ?>');
        background-repeat: no-repeat;
        background-position: center top;
        background-size: cover;
        z-index: -1;
      }

      .leaderboard {
        border-collapse: collapse;
        width: 60%;
        margin: 20px auto;
        font-family: Arial, sans-serif;
      }
      .leaderboard th {
        background-color: #333;
        color: lime;
        padding: 10px;
      }
      .leaderboard td {
        padding: 10px;
        border-bottom: 1px solid black;
      }
      .leaderboard tr:nth-child(even) {
        background-color: Lime;
      }
      .leaderboard tr:nth-child(odd) {
        background-color: Green;
      }
      .leaderboard tr:nth-child(2) {
        background-color: #FFD700;
      }
      .leaderboard tr:nth-child(3) {
        background-color: #C1C1C1;
      }
      .leaderboard tr:nth-child(4) {
        background-color: #CD8946;
      }
    </style>
  </head>

  <body>

    <h2 style="text-align:center; color:white; text-shadow:2px 2px 4px black;">
      <?php echo $quiz_names[$quiz]; ?>
    </h2>

    <h2 style="text-align:center; color:white; text-shadow:2px 2px 4px black;">
      Your Score: <?php echo $score; ?> / <?php echo $total; ?> (<?php echo $percentage; ?>%)
    </h2>

    <p style="text-align:center; color:white; font-size:20px; text-shadow:1px 1px 3px black;">
      <?php echo $message; ?>
    </p>

    <div style="text-align:center; margin:15px;">
      <a href="javascript:history.back()" class="btn btn-light me-2">Try Again</a>
      <a href="../quiz.php" class="btn btn-primary">Back to Quizzes</a>
    </div>

    <h2 style="text-align:center; color:white; text-shadow:2px 2px 4px black;">
      Leaderboard - <?php echo $quiz_names[$quiz]; ?>
    </h2>

    <table class="leaderboard">
      <tr>
        <th>Rank</th>
        <th>Username</th>
        <th>Score</th>
      </tr>
      
      <?php
        $leaderboard_query = mysqli_prepare($connection,
        "SELECT users.username, quiz_scores.$table_column AS score
         FROM quiz_scores
         JOIN users ON quiz_scores.id = users.id
         ORDER BY score DESC
         LIMIT 10");
        mysqli_stmt_execute($leaderboard_query);
        $result = mysqli_stmt_get_result($leaderboard_query);
        
        $rank = 1;
        
        while($row = mysqli_fetch_assoc($result)) 
        {
          ?>
              <tr>
                  <td>
                      <?php
                      if ($rank == 1) { echo "1st"; }
                      elseif ($rank == 2) { echo "2nd"; }
                      elseif ($rank == 3) { echo "3rd"; }
                      else { echo $rank . "th"; }
                      ?>
                  </td>
                  <td><?php echo htmlspecialchars($row['username']); ?></td>
                  <td><?php echo $row['score']; ?></td>
              </tr>
          <?php
          $rank++;
        }
      ?>
    </table>

    <?php include '../../template/footer.php'; ?>
  </body>
</html>