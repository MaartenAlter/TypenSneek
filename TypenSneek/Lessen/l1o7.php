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
<p hidden id="course">dddddd ffffff jjjjjj kkkkkk d f j k dd ff jj kk dfjk dfjk dfjk
ffffff dddddd kkkkkk jjjjjj k j f d ff jj kk dd jdkf fkdj jdkf

df df fd fd jk jk kj kj df jk dj kf jf fj dk kd kf dj kd fj kd
dd ff jj kk dd ff jj kk dd ff jj kk dd ff jj kk dd ff jj kk dd

fd kj fd kj fd jk fd jk df jk kj fd dk fj dj fk dk jk fd jk fd
dd ff jj kk dk kd fj jf df jk kj fd dk fj jd kf dj dk kf kd dj

jjk ffd jkj fdf kjk dfd jfj jjf fjj kdk ddk kkd kjf fdk fkd jk
kdj fjd kdf fjd kfd ddk ffj jfd kfj ddf kjj kjk fjf fjk kfd kd

ddd fff jjj kkk d d d f f f j j j k k k dfjk dfjk dfjk dfjk dj
fff ddd kkk jjj f f f d d d k k k j j j kjfd kjfd kjfd kjfd fk</p>

<p hidden id="lesson">1</p>
<p hidden id="exercise">7</p>
<body>
<form action="" method="post" id="scoreForm" >
  <div class="container">
    <div class="heading">TypenSneek - Les 1 Oefening 7</div>
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
  <p>We gaan nog een keer de geleerde letters door elkaar oefenen. <br><br>

* Begin vanuit de grondstelling <br>
* Denk goed na, zeg de letters eventueel hardop <br>
* Type blind!</p>
    <img src="/TypenSneek/TypenSneek/TypenSneek/img/tienvingers.png" >
  </div>
</div>
  <script src="../script.js"></script>
</body>
</html>


