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
            <h3 class="text-center mb-4">Komodo Dragons Quiz</h3>
            <form action="submit_quiz.php" method="post">
              <input type="hidden" name="quiz" value="komodo_dragon">
              <div class="mb-4">
                <p>1. Komodos Dragons mainly live in:</p>
                <input type="radio" name="q1" value="a"> Indonesian islands<br>
                <input type="radio" name="q1" value="b"> Antarctica<br>
                <input type="radio" name="q1" value="c"> Europe<br>
                <input type="radio" name="q1" value="d"> North America<br>
              </div>
              
              <div class="mb-4">
                <p>2. Komodo Dragons are classified as:</p>
                <input type="radio" name="q2" value="a"> Mammals<br>
                <input type="radio" name="q2" value="b"> Amphibians<br>
                <input type="radio" name="q2" value="c"> Lizards<br>
                <input type="radio" name="q2" value="d"> Birds<br>
              </div>
              
              <div class="mb-4">
                <p>3. Their hunting success is aided by:</p>
                <input type="radio" name="q3" value="a"> Venom and bacteria<br>
                <input type="radio" name="q3" value="b"> Flight<br>
                <input type="radio" name="q3" value="c"> Web spinning<br>
                <input type="radio" name="q3" value="d"> Echolocation<br>
              </div>
              
              <div class="mb-4">
                <p>4. Komodo dragons mainly eat:</p>
                <input type="radio" name="q4" value="a"> Plants only<br>
                <input type="radio" name="q4" value="b"> Large prey and carrion<br>
                <input type="radio" name="q4" value="c"> Algae<br>
                <input type="radio" name="q4" value="d"> Tree bark<br>
              </div>
              
              <div class="mb-4">
                <p>5. A key threat is:</p>
                <input type="radio" name="q5" value="a"> Glacier melting<br>
                <input type="radio" name="q5" value="b"> Habitat change and tourism pressure<br>
                <input type="radio" name="q5" value="c"> Sandstorms<br>
                <input type="radio" name="q5" value="d"> Polar predators<br>
              </div>
              
              <div class="mb-4">
                <p>6. Komodo dragons detect prey using:</p>
                <input type="radio" name="q6" value="a"> Smell via tongue<br>
                <input type="radio" name="q6" value="b"> Echolocation<br>
                <input type="radio" name="q6" value="c"> Infrared eyes<br>
                <input type="radio" name="q6" value="d"> Hearing only<br>
              </div>
              
              <div class="mb-4">
                <p>7. Komodo dragons can grow up to:</p>
                <input type="radio" name="q7" value="a"> 50 cm<br>
                <input type="radio" name="q7" value="b"> 1 m<br>
                <input type="radio" name="q7" value="c"> 3 m<br>
                <input type="radio" name="q7" value="d"> 10 m<br>
              </div>
              
              <div class="mb-4">
                <p>8. Young Komodo dragons spend time:</p>
                <input type="radio" name="q8" value="a"> In trees<br>
                <input type="radio" name="q8" value="b"> Underwater<br>
                <input type="radio" name="q8" value="c"> Underground caves only<br>
                <input type="radio" name="q8" value="d"> Flying<br>
              </div>
              
              <div class="mb-4">
                <p>9. Komodo dragons are:</p>
                <input type="radio" name="q9" value="a"> Herbivores<br>
                <input type="radio" name="q9" value="b"> Carnivores<br>
                <input type="radio" name="q9" value="c"> Omnivores only<br>
                <input type="radio" name="q9" value="d"> Filter feeders<br>
              </div>
              
              <div class="mb-4">
                <p>10. Conservation occurs strongly in:</p>
                <input type="radio" name="q10" value="a"> Komodo National Park<br>
                <input type="radio" name="q10" value="b"> Sahara Desert<br>
                <input type="radio" name="q10" value="c"> Amazon River<br>
                <input type="radio" name="q10" value="d"> Himalayas<br>
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
