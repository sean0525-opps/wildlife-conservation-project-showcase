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
    background-image:url('../../images/Quizzes/Jungle_background.png');
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
            <h3 class="text-center mb-4">Sumatran Orangutan Quiz</h3>
            <form action="submit_quiz.php" method="post">
              <input type="hidden" name="quiz" value="sumatran_orangutan">
              <div class="mb-4">
                <p>1. Orangutans mainly live in:</p>
                <input type="radio" name="q1" value="a"> Grasslands<br>
                <input type="radio" name="q1" value="b"> Trees<br>
                <input type="radio" name="q1" value="c"> Oceans<br>
                <input type="radio" name="q1" value="d"> Deserts<br>
              </div>
              
              <div class="mb-4">
                <p>2. Orangutans are classified as:</p>
                <input type="radio" name="q2" value="a"> Reptiles<br>
                <input type="radio" name="q2" value="b"> Birds<br>
                <input type="radio" name="q2" value="c"> Great apes<br>
                <input type="radio" name="q2" value="d"> Fish<br>
              </div>
              
              <div class="mb-4">
                <p>3. A major threat to orangutans is:</p>
                <input type="radio" name="q3" value="a"> Snowstorms<br>
                <input type="radio" name="q3" value="b"> Deforestation<br>
                <input type="radio" name="q3" value="c"> Volcanoes<br>
                <input type="radio" name="q3" value="d"> Floods<br>
              </div>
              
              <div class="mb-4">
                <p>4. Orangutans mainly eat:</p>
                <input type="radio" name="q4" value="a"> Meat<br>
                <input type="radio" name="q4" value="b"> Fruits and plants<br>
                <input type="radio" name="q4" value="c"> Sand<br>
                <input type="radio" name="q4" value="d"> Fish<br>
              </div>
              
              <div class="mb-4">
                <p>5. Baby orangutans stay with their mothers for:</p>
                <input type="radio" name="q5" value="a"> Weeks<br>
                <input type="radio" name="q5" value="b"> Years<br>
                <input type="radio" name="q5" value="c"> Days<br>
                <input type="radio" name="q5" value="d"> Months<br>
              </div>
              
              <div class="mb-4">
                <p>6. Orangutans are known for their:</p>
                <input type="radio" name="q6" value="a"> Flight<br>
                <input type="radio" name="q6" value="b"> Intelligence<br>
                <input type="radio" name="q6" value="c"> Swimming<br>
                <input type="radio" name="q6" value="d"> Digging<br>
              </div>
              
              <div class="mb-4">
                <p>7. Orangutans build nests to:</p>
                <input type="radio" name="q7" value="a"> Catch prey<br>
                <input type="radio" name="q7" value="b"> Sleep in trees<br>
                <input type="radio" name="q7" value="c"> Swim<br>
                <input type="radio" name="q7" value="d"> Hide food<br>
              </div>
              
              <div class="mb-4">
                <p>8. Orangutans help forests by:</p>
                <input type="radio" name="q8" value="a"> Spreading seeds<br>
                <input type="radio" name="q8" value="b"> Hunting deer<br>
                <input type="radio" name="q8" value="c"> Digging tunnels<br>
                <input type="radio" name="q8" value="d"> Polluting rivers<br>
              </div>
              
              <div class="mb-4">
                <p>9. Orangutans are mostly:</p>
                <input type="radio" name="q9" value="a"> Pack hunters<br>
                <input type="radio" name="q9" value="b"> Solitary animals<br>
                <input type="radio" name="q9" value="c"> Marine mammals<br>
                <input type="radio" name="q9" value="d"> Nocturnal birds<br>
              </div>
              
              <div class="mb-4">
                <p>10. Conservation mainly involves:</p>
                <input type="radio" name="q10" value="a"> Desert protection<br>
                <input type="radio" name="q10" value="b"> Forest protection<br>
                <input type="radio" name="q10" value="c"> Ice protection<br>
                <input type="radio" name="q10" value="d"> Dam building<br>
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
