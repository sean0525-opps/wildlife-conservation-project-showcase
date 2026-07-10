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
  }    
  .card-body{background-color: #228B22;}
  
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
            <h3 class="text-center mb-4">Anoa Quiz</h3>
            <form action="submit_quiz.php" method="post">
              <input type="hidden" name="quiz" value="anoa">
              <div class="mb-4">
                <p>1. The anoa is native to:</p>
                <input type="radio" name="q1" value="a"> Bali<br>
                <input type="radio" name="q1" value="b"> Sulawesi<br>
                <input type="radio" name="q1" value="c"> Java<br>
                <input type="radio" name="q1" value="d"> Sumatra<br>
              </div>
              
              <div class="mb-4">
                <p>2. The anoa is often called a:</p>
                <input type="radio" name="q2" value="a"> Dwarf buffalo<br>
                <input type="radio" name="q2" value="b"> Small deer<br>
                <input type="radio" name="q2" value="c"> Mini elephant<br>
                <input type="radio" name="q2" value="d"> Wild horse<br>
              </div>
              
              <div class="mb-4">
                <p>3. Anoa live mainly in:</p>
                <input type="radio" name="q3" value="a"> Tropical forests<br>
                <input type="radio" name="q3" value="b"> Arctic tundra<br>
                <input type="radio" name="q3" value="c"> Deserts<br>
                <input type="radio" name="q3" value="d"> Oceans<br>
              </div>
              
              <div class="mb-4">
                <p>4. A major threat to anoa is:</p>
                <input type="radio" name="q4" value="a"> Snowstorms<br>
                <input type="radio" name="q4" value="b"> Hunting and habitat loss<br>
                <input type="radio" name="q4" value="c"> Coral bleaching<br>
                <input type="radio" name="q4" value="d"> Oil spills<br>
              </div>
              
              <div class="mb-4">
                <p>5. Anoa are:</p>
                <input type="radio" name="q5" value="a"> Carnivores<br>
                <input type="radio" name="q5" value="b"> Herbivores<br>
                <input type="radio" name="q5" value="c"> Insectivores<br>
                <input type="radio" name="q5" value="d"> Omnivores only<br>
              </div>
              
              <div class="mb-4">
                <p>6. Anoa help forests by:</p>
                <input type="radio" name="q6" value="a"> Spreading seeds<br>
                <input type="radio" name="q6" value="b"> Hunting predators<br>
                <input type="radio" name="q6" value="c"> Building dams<br>
                <input type="radio" name="q6" value="d"> Polluting rivers<br>
              </div>
              
              <div class="mb-4">
                <p>7. Anoa are generally:</p>
                <input type="radio" name="q7" value="a"> Solitary and shy<br>
                <input type="radio" name="q7" value="b"> Large herd animals<br>
                <input type="radio" name="q7" value="c"> Marine mammals<br>
                <input type="radio" name="q7" value="d"> Flying mammals<br>
              </div>
              
              <div class="mb-4">
                <p>8. The anoa's small size helps it:</p>
                <input type="radio" name="q8" value="a"> Fly<br>
                <input type="radio" name="q8" value="b"> Move through dense forest<br>
                <input type="radio" name="q8" value="c"> Swim oceans<br>
                <input type="radio" name="q8" value="d"> Climb cliffs only<br>
              </div>
              
              <div class="mb-4">
                <p>9. Conservation requires:</p>
                <input type="radio" name="q9" value="a"> Habitat protection and hunting control<br>
                <input type="radio" name="q9" value="b"> Glacier monitoring<br>
                <input type="radio" name="q9" value="c"> Ocean cleanup only<br>
                <input type="radio" name="q9" value="d"> Desert expansion<br>
              </div>
              
              <div class="mb-4">
                <p>10. The anoa is classified as:</p>
                <input type="radio" name="q10" value="a"> Domesticated livestock<br>
                <input type="radio" name="q10" value="b"> Endangered wildlife<br>
                <input type="radio" name="q10" value="c"> Extinct species<br>
                <input type="radio" name="q10" value="d"> Invasive species<br>
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
