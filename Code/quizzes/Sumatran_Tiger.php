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
            <h3 class="text-center mb-4">Sumatran Tiger Quiz</h3>
            <form action="submit_quiz.php" method="post">
              <input type="hidden" name="quiz" value="sumatran_tiger">
              <div class="mb-4">
                <p>1. Sumatran Tiger mainly live in:</p>
                <input type="radio" name="q1" value="a"> Deserts<br>
                <input type="radio" name="q1" value="b"> Tropical forests<br>
                <input type="radio" name="q1" value="c"> Arctic tundra<br>
                <input type="radio" name="q1" value="d"> Grass steppes only<br>
              </div>
              
              <div class="mb-4">
                <p>2. The Sumatran tiger is the:</p>
                <input type="radio" name="q2" value="a"> Largest tiger<br>
                <input type="radio" name="q2" value="b"> Smallest tiger subspecies<br>
                <input type="radio" name="q2" value="c"> Extinct tiger<br>
                <input type="radio" name="q2" value="d"> Marine tiger<br>
              </div>
              
              <div class="mb-4">
                <p>3. A major threat to tigers is:</p>
                <input type="radio" name="q3" value="a"> Overfishing<br>
                <input type="radio" name="q3" value="b"> Poaching and habitat loss<br>
                <input type="radio" name="q3" value="c"> Snowstorms<br>
                <input type="radio" name="q3" value="d"> Lack of sunlight<br>
              </div>
              
              <div class="mb-4">
                <p>4. Tigers are:</p>
                <input type="radio" name="q4" value="a"> Herbivores<br>
                <input type="radio" name="q4" value="b"> Carnivores<br>
                <input type="radio" name="q4" value="c"> Insectivores<br>
                <input type="radio" name="q4" value="d"> Omnivores only<br>
              </div>
              
              <div class="mb-4">
                <p>5. Tigers hunt mainly using:</p>
                <input type="radio" name="q5" value="a"> Speed in open plains only<br>
                <input type="radio" name="q5" value="b"> Stealth and camouflage<br>
                <input type="radio" name="q5" value="c"> Venom<br>
                <input type="radio" name="q5" value="d"> Flight<br>
              </div>
              
              <div class="mb-4">
                <p>6. Tigers are important because they:</p>
                <input type="radio" name="q6" value="a"> Pollinate flowers<br>
                <input type="radio" name="q6" value="b"> Maintain ecosystem balance<br>
                <input type="radio" name="q6" value="c"> Build reefs<br>
                <input type="radio" name="q6" value="d"> Spread coral<br>
              </div>
              
              <div class="mb-4">
                <p>7. Sumatran tigers are:</p>
                <input type="radio" name="q7" value="a"> Social pack animals<br>
                <input type="radio" name="q7" value="b"> Solitary predators<br>
                <input type="radio" name="q7" value="c"> Marine mammals<br>
                <input type="radio" name="q7" value="d"> Nocturnal birds<br>
              </div>
              
              <div class="mb-4">
                <p>8. Tigers communicate using:</p>
                <input type="radio" name="q8" value="a"> Songs only<br>
                <input type="radio" name="q8" value="b"> Roars and scent marks<br>
                <input type="radio" name="q8" value="c"> Electric signals<br>
                <input type="radio" name="q8" value="d"> Echolocation<br>
              </div>
              
              <div class="mb-4">
                <p>9. A protected tiger habitat is:</p>
                <input type="radio" name="q9" value="a"> Gunung Leuser National Park<br>
                <input type="radio" name="q9" value="b"> Sahara Desert<br>
                <input type="radio" name="q9" value="c"> Arctic Circle<br>
                <input type="radio" name="q9" value="d"> Alps<br>
              </div>
              
              <div class="mb-4">
                <p>10. Saving tigers requires:</p>
                <input type="radio" name="q10" value="a"> More hunting<br>
                <input type="radio" name="q10" value="b"> Habitat protection and anti-poaching<br>
                <input type="radio" name="q10" value="c"> Ocean cleanup only<br>
                <input type="radio" name="q10" value="d"> Glacier protection<br>
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
