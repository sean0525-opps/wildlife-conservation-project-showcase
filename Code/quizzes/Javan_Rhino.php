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
            <h3 class="text-center mb-4"> Javan Rhino Quiz</h3>
            <form action="submit_quiz.php" method="post">
              <input type="hidden" name="quiz" value="javan_rhino">
              <div class="mb-4">
                <p>1. Javan rhinos are found mainly in:</p>
                <input type="radio" name="q1" value="a"> Africa<br>
                <input type="radio" name="q1" value="b"> One protected park in Java<br>
                <input type="radio" name="q1" value="c"> Europe<br>
                <input type="radio" name="q1" value="d"> Australia<br>
              </div>
              
              <div class="mb-4">
                <p>2. Javan rhinos are:</p>
                <input type="radio" name="q2" value="a"> Common animals<br>
                <input type="radio" name="q2" value="b"> Among the rarest mammals<br>
                <input type="radio" name="q2" value="c"> Marine mammals<br>
                <input type="radio" name="q2" value="d"> Birds<br>
              </div>
              
              <div class="mb-4">
                <p>3. A historical threat was:</p>
                <input type="radio" name="q3" value="a"> Fur trade<br>
                <input type="radio" name="q3" value="b"> Horn poaching<br>
                <input type="radio" name="q3" value="c"> Coral bleaching<br>
                <input type="radio" name="q3" value="d"> Oil spills<br>
              </div>
              
              <div class="mb-4">
                <p>4. Rhinos mainly eat:</p>
                <input type="radio" name="q4" value="a"> Meat<br>
                <input type="radio" name="q4" value="b"> Plants<br>
                <input type="radio" name="q4" value="c"> Fish<br>
                <input type="radio" name="q4" value="d"> Insects only<br>
              </div>
              
              <div class="mb-4">
                <p>5. Rhinos help ecosystems by:</p>
                <input type="radio" name="q5" value="a"> Digging water holes and shaping vegetation<br>
                <input type="radio" name="q5" value="b"> Flying seeds<br>
                <input type="radio" name="q5" value="c"> Pollinating flowers only<br>
                <input type="radio" name="q5" value="d"> Pollinating flowers only<br>
              </div>
              
              <div class="mb-4">
                <p>6. Javan rhinos are usually:</p>
                <input type="radio" name="q6" value="a"> Herd animals<br>
                <input type="radio" name="q6" value="b"> Solitary<br>
                <input type="radio" name="q6" value="c"> Marine<br>
                <input type="radio" name="q6" value="d"> Burrowing rodents<br>
              </div>
              
              <div class="mb-4">
                <p>7. A danger to rhino populations is:</p>
                <input type="radio" name="q7" value="a"> Too much food<br>
                <input type="radio" name="q7" value="b"> Disease and natural disasters<br>
                <input type="radio" name="q7" value="c"> Ice formation<br>
                <input type="radio" name="q7" value="d"> Snow predators<br>
              </div>
              
              <div class="mb-4">
                <p>8. Conservation includes:</p>
                <input type="radio" name="q8" value="a"> Desert expansion<br>
                <input type="radio" name="q8" value="b"> Strict habitat protection<br>
                <input type="radio" name="q8" value="c"> Overfishing<br>
                <input type="radio" name="q8" value="d"> Ice monitoring<br>
              </div>
              
              <div class="mb-4">
                <p>9. Javan rhinos have:</p>
                <input type="radio" name="q9" value="a"> Two horns always<br>
                <input type="radio" name="q9" value="b"> A small single horn<br>
                <input type="radio" name="q9" value="c"> No horn<br>
                <input type="radio" name="q9" value="d"> Antlers<br>
              </div>
              
              <div class="mb-4">
                <p>10. Their protected habitat is:</p>
                <input type="radio" name="q10" value="a"> Ujung Kulon National Park<br>
                <input type="radio" name="q10" value="b"> Amazon Basin<br>
                <input type="radio" name="q10" value="c"> Sahara<br>
                <input type="radio" name="q10" value="d"> Yellowstone<br>
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
