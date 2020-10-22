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
<p hidden id="course">dd ff jj kk jj ff dd kk jj dd ff kk jj dd ff jj dd kk ff jj dd
dfjk kjfd dkfj kdjf fdkj dfjk jdkf jdjd kfkf ddfj kkdf kdjf dk
ddkk ffjj ddkk kkdd jjdd kkff kkdd jjff kkff kkdd jjff jjkk dd

dkk ddj ddk ddf kkd kkf kkj jjk jjf jjd ddk jjd ffk kkd jjf kk
kdd kjj kff dff dff dkk fdd fkk fjj kdd jff kjj djj fkk fdd kk
dkf jfk dfj kjd fjk ddf kfj fjf kfj kfk dfd fkf jdf kfj djk jd

dd kk ff jj dk jf dk fj dk jj kk dd ff jj kd fj kd jd kj dj kd
ff kk jj dd ff kk dd fj dk kd jf kf jj dk kk dd jf kd jk dj kj
jd kj df jk fd dk fj kd jf df jk kj fd dk dj fk jf fd jf jd jk

dfk dfj kjf kjf dkf djf kdf kjf jdf kdj kdd jkk fjj dkk fjj dk
ddd fff jjj kkk ddd fff kkk jjj ddd kkk jjj fff ddd jjj kkk dd
dkj fjf kdk djd kjd kjf kdf jfk jdk fjd kjj dkk djf kdj kkj dd
</p>

<p hidden id="lesson">1</p>
<p hidden id="exercise">15</p>
<body>
<form action="" method="post" id="scoreForm" >
  <div class="container">
    <div class="heading">TypenSneek - Les 1 Oefening 15</div>
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


