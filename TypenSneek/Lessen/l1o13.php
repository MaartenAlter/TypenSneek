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
<p hidden id="course">aaa sss lll ;;; lll sss aaa sss lll ;;; lll sss aaa ;;; aaa ll
al sl l; ;l ls sa aas s ll ;; aas s ll ;; ;l sa as l; ;l a; ;a

asl; ;lsa sl ;a a; ls al as ;s la ;s la ;s la sl ;a sl ;l l;;l
aaaa ssss llll ;;;; asl; asl; ;lsa ;lsa asl; aa ss ll ;; ss ll

asdf jkl; asdf jkl; ;lkj fdsa ;lkj fdsa a;sl dkfj aldj asdf jl
aldk alsk als; alsk ;ass laks sldk akdj flal ksfl klas aldk al

lsks lasd lksd fjsk fkla fjka dfkj sksj aksj lfdf ;fkd laks la
aakj akss kkas llkd kksd ;;sd jjds ffls sskd llds ddks aakj ak

as df jk l; aj af as al a; ak al aa as ad af a jak al a; ;a ;s
sa sd sf sj sk sl s; ss da ds dd df dj dj dk dl d; da ds ;a ;d
</p>

<p hidden id="lesson">1</p>
<p hidden id="exercise">13</p>
<body>
<form action="" method="post" id="scoreForm" >
  <div class="container">
    <div class="heading">TypenSneek - Les 1 Oefening 13</div>
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


