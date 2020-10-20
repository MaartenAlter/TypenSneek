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
  <link rel="stylesheet" href="stylecursus.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<p hidden id="course">j j j j j jj jj jj jj jj jjj jjj jjj jjj jjj j jj jjj j jj jjj 
j j j jj jj jj jjj jjj jjj jj jj jj j j j jj jjj j jj j jjj jj
j jj jjj jj j j j jj jj jjj jjj jjj jj jj jjj jjj jj jj j j jj</p>

<p hidden id="lesson">1</p>
<p hidden id="exercise">1</p>
<body>
<form action="" method="post" id="scoreForm" >
  <div class="container">
    <div class="heading">TypenSneek - Les 1 Oefening 1</div>
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
    <button  name="next" class="restart_btn"><a href="lessen.php"> Volgende </a></button>
 
     </form>
  </div>
  <script src="script.js"></script>
</body>
</html>


