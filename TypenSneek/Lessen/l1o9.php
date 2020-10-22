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
<p hidden id="course">s s s s s ss ss ss ss ss sss sss sss sss sss s ss sss s ss sss
s s s ss ss ss sss sss sss ss ss ss s s s ss sss s ss s sss ss
s ss sss ss s s s ss ss sss sss sss ss ss sss sss ss ss s s ss
</p>

<p hidden id="lesson">1</p>
<p hidden id="exercise">9</p>
<body>
<form action="" method="post" id="scoreForm" >
  <div class="container">
    <div class="heading">TypenSneek - Les 1 Oefening 9</div>
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
  <p>De tweede letter van deze les is de s. Deze letter doe je met je linker ringvinger.

Zet je vingers in de grondstelling. Aan het eind van de regel met je rechter pink de enterknop aanslaan.</p>
    <img src="/TypenSneek/TypenSneek/TypenSneek/img/tienvingers.png" >
  </div>
</div>
  <script src="../script.js"></script>
</body>
</html>


