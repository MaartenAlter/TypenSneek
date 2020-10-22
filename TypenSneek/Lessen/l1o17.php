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
<p hidden id="course">aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aaa aa
dad dad dad dad dad dad dad dad dad dad dad dad dad dad dad da
faf faf faf faf faf faf faf faf faf faf faf faf faf faf faf fa

jaj jaj jaj jaj jaj jaj jaj fak jaj jaj jaj jaj jaj jaj jaj ja
kak kak kak kak kak daf kak kak kak kak kak kak kak kak kak ka
lal lal lal kaf lal lal lal lal lal lal jad lal lal lal lal la

daf daf daf daf jaj daf daf daf daf daf daf daf daf daf daf da
fad fad fad fad fad fad fad fad fad fad jad fad fak fad fad fa
jak jak jak jak jak jak lal jak jak jak jak jak jak jak jak ja

jad jad jad jad jad jad jad jad jad jad lal jad jad jad jad ja
fak fak fak fak fak kak fak fak fak fak fak fak fad fak fak fa
kaf kaf kaf kaf kaf kaf kaf kaf daf kaf kaf kaf kaf kaf kaf ka

aad aaf aaj aak daa faa jaa kaa ada afa aja aka ada aad aaf aa
fad daf jak kaj dak kad jaf faj afj ajf adk akd adk fad daf ja
kaa jaa faa daa kak jaj faf dad dak faj jad kad kaf kaa jaa fa
</p>

<p hidden id="lesson">1</p>
<p hidden id="exercise">17</p>
<body>
<form action="" method="post" id="scoreForm" >
  <div class="container">
    <div class="heading">TypenSneek - Les 1 Oefening 17</div>
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


