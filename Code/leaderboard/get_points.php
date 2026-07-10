<?php
include '../../database.php';

$query = "
  SELECT username, points
  FROM users
  ORDER BY points DESC
";

$result = mysqli_query($connection, $query);
$rank = 1;

while($row = mysqli_fetch_assoc($result)) {
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
  echo "<td>{$row['points']}</td>";
  echo "</tr>";
  $rank++;
}
?>