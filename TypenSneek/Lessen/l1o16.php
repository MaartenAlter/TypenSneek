<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "typensneek";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<html lang="en">
<head>
  <title>TypenSneek</title>
  <link rel="stylesheet" href="../stylecursus.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<p hidden id="course">f f f f f f j j j j j j f j f j f j fj fj fj fj fj fjjf jffjf
j j j j j j f f f f f f j f j f j f jf jf jf jf jf jfjf fjjfj
f j j f j j f j j f j j j f f f j j fj jf fj fj jf jjff ffjjf

d d d d d d k k k k k k d k d k d k dk dk dk dk dk dkdk kdkdk
k k k k k k d d d d d d k d k d k d kd kd kd kd kd kdkd dkdkd
d k k d k k d k k d k k k d d d k k dk kd dk dk kd kkdd ddkkd

fj fj dk dk fj fj dk dk fj fj dk dk fj fj dk dk fj dkfj dkfjd
jf jf dk dk jf jf kd kd jf jf kd kd jf jf kd kd jf kdjf kdjfk
df jk df jk df jk kj fd kj fd kj fd df jk kj fd df kfdj dkjfd

dfjk dfjk dfjk dfjk dfjk dfjk dfjk dfjk dfjk dfjk dfjk dfjk df
kjfd kjfd kjfd kjfd kjfd kjfd kjfd kjfd kjfd kjfd kjfd kjfd kj
fdkj fdkj fdkj fdkj jkdf jkdf jkdf fdkj dfjk kjfd kfjd dkjf dj

dd ff jj kk dd ff jj kk dd ff jj kk dd ff jj kk dd ff jj kk dd
df fj jk kj jf fd df fj jk kj jf fd df fj jk kj jf df fj jk kj
df kf dj kf dj kf dj kf dj kf fk jd fk jd fk jd kj df kf dj kf
</p>

<p hidden id="lesson">1</p>
<p hidden id="exercise">16</p>
<body>
<form action="" method="post" id="scoreForm" >
  <div class="container">
    <div class="heading">TypenSneek - Les 1 Oefening 16</div>
    <div class="header">
      <div class="wpm">
        <div class="header_text">WPM</div>
        <div class="curr_wpm"> 100 </div>
      </div>
      <div class="cpm">
        <div class="header_text">APM</div>
        <div  class="curr_cpm" name="apm"> 100 </div>
      </div>
      <div class="errors">
        <div class="header_text">Fouten</div>
        <div  class="curr_errors" name="fouten"> 0 </div>
      </div>
      <div class="timer">
        <div class="header_text">Tijd</div>
        <div  class="curr_time" name="tijd"> 0s </div>
      </div>
      <div class="accuracy">
        <div class="header_text">% Accuraatheid</div>
        <div  class="curr_accuracy" name="accuraatheid"> 0 </div>
      </div>
    </div>

    <div class="quote">Klik hieronder om te beginnen.</div>
    <textarea class="input_area" placeholder="start met typen..." oninput="processCurrentText()"
      onfocus="startGame()" onkeydown="return (event.keyCode!=8);"></textarea>
    <button  name="next" class="restart_btn"><a href="/TypenSneek/TypenSneek/TypenSneek/lessen.php"> Volgende </a></button>
 
     </form>
  </div>
  <div class="container3">
  <div class="container2">
  <h1>Aanwijzingen</h1>
  <p>We gaan nu alle letters van de grondstelling oefenen. Denk erom dat je rustig typt en niet op je vingers kijkt!</p>
    <img src="/TypenSneek/TypenSneek/TypenSneek/img/tienvingers.png" >
  </div>
</div>
  <script src="../script.js"></script>
</body>
</html>


