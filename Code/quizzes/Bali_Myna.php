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
            <h3 class="text-center mb-4">Bali Myna Quiz</h3>
            <form action="submit_quiz.php" method="post">
              <input type="hidden" name="quiz" value="bali_myna">
              <div class="mb-4">
                <p>1. The Bali myna is native to:</p>
                <input type="radio" name="q1" value="a"> Java<br>
                <input type="radio" name="q1" value="b"> Bali<br>
                <input type="radio" name="q1" value="c"> Sumatra<br>
                <input type="radio" name="q1" value="d"> Borneo<br>
              </div>
              
              <div class="mb-4">
                <p>2. The Bali myna is easily recognised by its:</p>
                <input type="radio" name="q2" value="a"> Green feathers<br>
                <input type="radio" name="q2" value="b"> Bright white plumage<br>
                <input type="radio" name="q2" value="c"> Blue wings only<br>
                <input type="radio" name="q2" value="d"> Long tail<br>
              </div>
              
              <div class="mb-4">
                <p>3. A major threat to Bali Myna is:</p>
                <input type="radio" name="q3" value="a"> Climate freezing<br>
                <input type="radio" name="q3" value="b"> Illegal pet trade<br>
                <input type="radio" name="q3" value="c"> Overfishing<br>
                <input type="radio" name="q3" value="d"> Flooding<br>
              </div>
              
              <div class="mb-4">
                <p>4. The Bali Myna mainly eat:</p>
                <input type="radio" name="q4" value="a"> Fruits and insects<br>
                <input type="radio" name="q4" value="b"> Fish only<br>
                <input type="radio" name="q4" value="c"> Grass only<br>
                <input type="radio" name="q4" value="d"> Large mammals<br>
              </div>
              
              <div class="mb-4">
                <p>5. The Bali myna lives mostly in:</p>
                <input type="radio" name="q5" value="a"> Desert habitats<br>
                <input type="radio" name="q5" value="b"> Forest and savanna areas<br>
                <input type="radio" name="q5" value="c"> Arctic tundra<br>
                <input type="radio" name="q5" value="d"> Deep ocean<br>
              </div>
              
              <div class="mb-4">
                <p>6. The Bali myna is considered:</p>
                <input type="radio" name="q6" value="a"> Least concern<br>
                <input type="radio" name="q6" value="b"> Critically endangered<br>
                <input type="radio" name="q6" value="c"> Extinct<br>
                <input type="radio" name="q6" value="d"> Invasive<br>
              </div>
              
              <div class="mb-4">
                <p>7. Conservation includes:</p>
                <input type="radio" name="q7" value="a"> Captive breeding programs<br>
                <input type="radio" name="q7" value="b"> Increased hunting<br>
                <input type="radio" name="q7" value="c"> Deforestation<br>
                <input type="radio" name="q7" value="d"> Ocean cleanup only<br>
              </div>
              
              <div class="mb-4">
                <p>8. Bali mynas are important because they:</p>
                <input type="radio" name="q8" value="a"> Spread seeds and control insects<br>
                <input type="radio" name="q8" value="b"> Hunt large prey<br>
                <input type="radio" name="q8" value="c"> Build reefs<br>
                <input type="radio" name="q8" value="d"> Dig burrows<br>
              </div>
              
              <div class="mb-4">
                <p>9. A protected habitat for Bali mynas is:</p>
                <input type="radio" name="q9" value="a"> West Bali National Park<br>
                <input type="radio" name="q9" value="b"> Sahara Desert<br>
                <input type="radio" name="q9" value="c"> Amazon River<br>
                <input type="radio" name="q9" value="d"> Alps<br>
              </div>
              
              <div class="mb-4">
                <p>10. The Bali myna is an example of a species that is:</p>
                <input type="radio" name="q10" value="a"> Widely distributed worldwide<br>
                <input type="radio" name="q10" value="b"> Endemic to one island<br>
                <input type="radio" name="q10" value="c"> Marine only<br>
                <input type="radio" name="q10" value="d"> Arctic adapted<br>
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
