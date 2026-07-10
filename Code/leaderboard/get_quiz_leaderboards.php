<?php
include '../../database.php';

$quiz_names = [
    "General" => "General Knowledge",
    "Orangutan" => "Sumatran Orangutan",
    "Komodo_Dragon" => "Komodo Dragon",
    "Tiger" => "Sumatran Tiger",
    "Rhino" => "Javan Rhino",
    "Bali_Myna" => "Bali Myna",
    "Turtle" => "Sea Turtle",
    "Anoa" => "Anoa"
];

foreach($quiz_names as $col => $title) {

  echo "<h3 style='text-align:center;'>$title</h3>";
  echo "<table class='leaderboard'>";
  echo "<tr><th>Rank</th><th>Username</th><th>Score</th></tr>";

  $query = mysqli_query($connection,
    "SELECT users.username, quiz_scores.$col AS score
     FROM quiz_scores
     JOIN users ON quiz_scores.id = users.id
     WHERE quiz_scores.$col IS NOT NULL
     ORDER BY score DESC
     LIMIT 5");

  $rank = 1;

  while($row = mysqli_fetch_assoc($query)) {
    $rank_text = "";
    if ($rank == 1) {
      $rank_text = "1st";
    } elseif ($rank == 2) {
      $rank_text = "2nd";
    } elseif ($rank == 3) {
      $rank_text = "3rd";
    } else {
      $rank_text = $rank . "th";
    }
    
    echo "<tr>";
    echo "<td>$rank_text</td>";
    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
    echo "<td>{$row['score']}</td>";
    echo "</tr>";
    $rank++;
  }

  echo "</table>";
}
?>