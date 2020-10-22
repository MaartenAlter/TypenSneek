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
<p hidden id="course">d d d d f f f f j j j j k k k k d d f f j j k k d f j k d f j
k k j j f f d d f f j j k k d f j k f k d j k f d f k j f d f

dddd ffff jjjj kkkk ddff jjkk dddf jjjk dfjk kjfd dddj dddk kd
ddff ddjj ddkk kkjj kkff kkdd dkfj kdjf kkdd jjff ffjj ddkk dk

dd ff jj kk ff dd kk jj df fd jk kj df jk kj fd jf fj dk kd kf
fk fj jd fk kd dk jf fj fd kj jk df jk jk df fd jj kk dd ff kk

dfk dfj kjf kjd dkf djf kdf kfj jdk jfk kdf jdf kfd jfd djk df
ddk ffk ddj ffj kkd kkf jjd jjf dkf djf fkd fjd jkd kfj fjd dk

dfj dk dfk kj fj kjf dk jf kd fjd kfj dd kk ff jj dfjk kjfd dj
kkf jf kdf dd kj fdk ff jk df fkj dkf ff dd kf jj dfdf ddkj kf</p>

<p hidden id="lesson">1</p>
<p hidden id="exercise">6</p>
<body>
<form action="" method="post" id="scoreForm" >
  <div class="container">
    <div class="heading">TypenSneek - Les 1 Oefening 6</div>
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
  <p>Vandaag hebben we een grote les, daarom maar één oefening.
We gaan de 4 geleerde letter door elkaar oefenen.
<br><br>
Denk erom: <br>
• Begin vanuit de beginpositie <br>
• Goed nadenken, zeg de letters evt. hardop <br>
• Niet op het toetsenbord kijken, typ blind</p>
    <img src="/TypenSneek/TypenSneek/TypenSneek/img/tienvingers.png" >
  </div>
</div>
  <script src="../script.js"></script>
</body>
</html>


