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
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

  body{background-color:#f2f2f2;}

  /* transparent background image layer */
  body::before{
    content:"";
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-image:url('../../images/Quizzes/Island_background.png');
    background-repeat:no-repeat;
    background-position:center top;
    background-size:cover;
  
    z-index:-1;
  }
  
  /* Jungle vine border around quiz */
  .card{
    border:40px solid transparent;
    border-image:url('../../images/Quizzes/border.png') 120 round;
    background:rgba(255,255,255,0.95);
  }
  
  .card-body {background-color: #228B22;}
  
  /* back button */
  .back-btn {
    position: fixed;
    top: 120px;
    right: 20px;
    background-color: rgba(0, 0, 0, 0.3);
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
  .back-btn:hover{background-color: rgba(0, 0, 0, 0.5);}
</style>

</head>

<body>
  <a href="../quiz.php" class="back-btn"> Back to Quizzes </a>
  <div class="container mt-5 pt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
      
        <div class="card shadow">
          <div class="card-body">
            <h3 class="text-center mb-4">General Quiz</h3>
            <form action="submit_quiz.php" method="post">
          
              <input type="hidden" name="quiz" value="general">
              
              
              <div class="mb-4">
                <p>1. Which critically endangered species is the smallest of all living rhinoceros species and is native to Indonesia?</p>
                <input type="radio" name="q1" value="a"> Indian Rhinoceros<br>
                <input type="radio" name="q1" value="b"> Sumatran Rhinoceros<br>
                <input type="radio" name="q1" value="c"> White Rhinoceros<br>
                <input type="radio" name="q1" value="d"> Black Rhinoceros<br>
              </div>
              
              <div class="mb-4">
                <p>2. The Javan rhinoceros currently survives in only one wild population. Where is this population located?</p>
                <input type="radio" name="q2" value="a"> Komodo National Park<br>
                <input type="radio" name="q2" value="b"> Gunung Leuser National Park<br>
                <input type="radio" name="q2" value="c"> Ujung Kulon National Park<br>
                <input type="radio" name="q2" value="d"> Way Kambas National Park<br>
              </div>
              
              <div class="mb-4">
              <p>3. Which endangered Indonesian species has the scientific name <i>Pongo abelii</i>?</p>
                <input type="radio" name="q3" value="a"> Bornean orangutan<br>
                <input type="radio" name="q3" value="b"> Sumatran orangutan<br>
                <input type="radio" name="q3" value="c"> Proboscis monkey<br>
                <input type="radio" name="q3" value="d"> Silvery gibbon<br>
              </div>
              
              <div class="mb-4">
                <p>4. The Komodo dragon hunts large prey using which biological adaptation?</p>
                <input type="radio" name="q4" value="a"> Heat-detecting pits<br>
                <input type="radio" name="q4" value="b"> Venom glands and bacteria in its bite<br>
                <input type="radio" name="q4" value="c"> Echolocation<br>
                <input type="radio" name="q4" value="d"> Electric shocks<br>
              </div>
              
              <div class="mb-4">
                <p>5. Which Indonesian island is home to the critically endangered Sumatran tiger?</p>
                <input type="radio" name="q5" value="a"> Borneo<br>
                <input type="radio" name="q5" value="b"> Sumatra<br>
                <input type="radio" name="q5" value="c"> Java<br>
                <input type="radio" name="q5" value="d"> Sulawesi<br>
              </div>
              
              <div class="mb-4">
              <p>6. What major economic activity has significantly contributed to habitat loss for many Indonesian endangered species?</p>
                <input type="radio" name="q6" value="a"> Tea farming<br>
                <input type="radio" name="q6" value="b"> Palm oil plantation expansion<br>
                <input type="radio" name="q6" value="c"> Rice terrace farming<br>
                <input type="radio" name="q6" value="d"> Coffee plantations<br>
              </div>
              
              <div class="mb-4">
                <p>7. Which endangered marine species often nests on Indonesian beaches and is threatened by plastic pollution and egg poaching?</p>
                <input type="radio" name="q7" value="a"> Dugong<br>
                <input type="radio" name="q7" value="b"> Blue whale<br>
                <input type="radio" name="q7" value="c"> Green sea turtle<br>
                <input type="radio" name="q7" value="d"> Giant manta ray<br>
              </div>
              
              <div class="mb-4">
                <p>8. Gunung Leuser National Park is important because it is one of the few places where which four endangered mammals coexist?</p>
                <input type="radio" name="q8" value="a"> Tiger, orangutan, elephant, rhinoceros<br>
                <input type="radio" name="q8" value="b"> Leopard, panda, elephant, gorilla<br>
                <input type="radio" name="q8" value="c"> Tiger, leopard, panda, orangutan<br>
                <input type="radio" name="q8" value="d"> Elephant, zebra, rhinoceros, lion<br>
              </div>
              
              <div class="mb-4">
                <p>9. Why are small isolated populations of endangered species at greater risk of extinction?</p>
                <input type="radio" name="q9" value="a"> They grow too quickly<br>
                <input type="radio" name="q9" value="b"> They have limited genetic diversity and are vulnerable to disease<br>
                <input type="radio" name="q9" value="c"> They eat too much food<br>
                <input type="radio" name="q9" value="d"> They migrate too often<br>
              </div>
              
              <div class="mb-4">
                <p>10. Which conservation strategy helps protect endangered animals by setting aside protected natural areas?</p>
                <input type="radio" name="q10" value="a"> Urban expansion<br>
                <input type="radio" name="q10" value="b"> National parks and wildlife reserves<br>
                <input type="radio" name="q10" value="c"> Industrial farming<br>
                <input type="radio" name="q10" value="d"> Ocean mining<br>
              </div>
              
              <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Submit Quiz</button>
              </div>
              
            </form>
          
          </div>
        </div>
      
      </div>
    </div>
  </div>
  <?php
    include '../../template/footer.php';
  ?>
</body>
</html>
