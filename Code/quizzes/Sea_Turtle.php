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
    background-image:url('../../images/Quizzes/Ocean_background.png');
    background-repeat:no-repeat;
    background-position:center top;
    background-size:cover;
       
    z-index:-1;
  }    
       
  /* Jungle vine border around quiz */
  .card{
    border:40px solid transparent;
    border-image:url('../../images/Quizzes/border.png') 120 round;
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
            <h3 class="text-center mb-4">Sea Turtle Quiz</h3>
            <form action="submit_quiz.php" method="post">
              <input type="hidden" name="quiz" value="sea_turtle">
              <div class="mb-4">
                <p>1. Sea turtles return to land mainly to:</p>
                <input type="radio" name="q1" value="a"> Feed<br>
                <input type="radio" name="q1" value="b"> Lay eggs<br>
                <input type="radio" name="q1" value="c"> Sleep<br>
                <input type="radio" name="q1" value="d"> Hide from predators<br>
              </div>
              
              <div class="mb-4">
                <p>2. Sea turtles spend most of their lives:</p>
                <input type="radio" name="q2" value="a"> In forests<br>
                <input type="radio" name="q2" value="b"> In the ocean<br>
                <input type="radio" name="q2" value="c"> Underground<br>
                <input type="radio" name="q2" value="d"> In deserts<br>
              </div>
              
              <div class="mb-4">
                <p>3. A major threat to sea turtles is:</p>
                <input type="radio" name="q3" value="a"> Plastic pollution<br>
                <input type="radio" name="q3" value="b"> Snowstorms<br>
                <input type="radio" name="q3" value="c"> Deforestation only<br>
                <input type="radio" name="q3" value="d"> Lack of rocks<br>
              </div>
              
              <div class="mb-4">
                <p>4. Green sea turtles mainly eat:</p>
                <input type="radio" name="q4" value="a"> Jellyfish only<br>
                <input type="radio" name="q4" value="b"> Seagrass and algae<br>
                <input type="radio" name="q4" value="c"> Birds<br>
                <input type="radio" name="q4" value="d"> Mammals<br>
              </div>
              
              <div class="mb-4">
                <p>5. Hatchling turtles face danger from:</p>
                <input type="radio" name="q5" value="a"> Predators and light pollution<br>
                <input type="radio" name="q5" value="b"> Cold snow<br>
                <input type="radio" name="q5" value="c"> Lack of mountains<br>
                <input type="radio" name="q5" value="d"> Volcanoes<br>
              </div>
              
              <div class="mb-4">
                <p>6. Sea turtles help ecosystems by:</p>
                <input type="radio" name="q6" value="a"> Maintaining healthy seagrass beds<br>
                <input type="radio" name="q6" value="b"> Building nests for birds<br>
                <input type="radio" name="q6" value="c"> Digging tunnels<br>
                <input type="radio" name="q6" value="d"> Pollinating trees<br>
              </div>
              
              <div class="mb-4">
                <p>7. Sea turtles can:</p>
                <input type="radio" name="q7" value="a"> Fly long distances<br>
                <input type="radio" name="q7" value="b"> Migrate thousands of kilometres<br>
                <input type="radio" name="q7" value="c"> Live only in freshwater<br>
                <input type="radio" name="q7" value="d"> Hibernate underground<br>
              </div>
              
              <div class="mb-4">
                <p>8. A conservation method is:</p>
                <input type="radio" name="q8" value="a"> Protecting nesting beaches<br>
                <input type="radio" name="q8" value="b"> Destroying reefs<br>
                <input type="radio" name="q8" value="c"> Overfishing<br>
                <input type="radio" name="q8" value="d"> Increasing plastic use<br>
              </div>
              
              <div class="mb-4">
                <p>9. Sea turtles use Earth's magnetic field to:</p>
                <input type="radio" name="q9" value="a"> Hunt prey<br>
                <input type="radio" name="q9" value="b"> Navigate migrations<br>
                <input type="radio" name="q9" value="c"> Build nests<br>
                <input type="radio" name="q9" value="d"> Hide from predators<br>
              </div>
              
              <div class="mb-4">
                <p>10. Indonesia is important for sea turtles because:</p>
                <input type="radio" name="q10" value="a"> It has many nesting beaches<br>
                <input type="radio" name="q10" value="b"> It is covered in ice<br>
                <input type="radio" name="q10" value="c"> It has no predators<br>
                <input type="radio" name="q10" value="d"> It is desert climate<br>
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
