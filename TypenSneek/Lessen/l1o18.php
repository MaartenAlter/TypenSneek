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
<p hidden id="course">laaf kaal faal kaas daal faal daas kaas laaf kaal faal fal jal
jaja fafa kaka dada sasa lala alal asas adad afaf ajaj akak as

ka kaas la laas ja jaas fa faas sa saas da daas kaak laal saas
las al la asla sla asla al sla asla al sla asla al sla asla al

lak ka fa la ka ja as sas las dal kak kal kas kad lak laf laj
laal alla kaak akka ajja jaaj faaf affa assa saas daad adda da

jaka fala kala faja daja saja jada lada kaja jasa fala salsa
al; as; ad; af; aj; ak; aa; la; ka; ja; fa; da; sa; aa; daad;
aad aas aal aak aaj aaf saad faad jaad kaad laad dada jaja la

slaak sla slaak slak als as al asla slaak als slak sla as sla
lalla kakka jajja faffa dadda sassa alla akka affa adda assa

aa; ad; af; aj; ak; al; aa; as; ad; af; aj; al; ak; aa; laal;
kaas slak las lak klad das jas ja aas als laf kaf daf ja asla
</p>

<p hidden id="lesson">1</p>
<p hidden id="exercise">18</p>
<body>
<form action="" method="post" id="scoreForm" >
  <div class="container">
    <div class="heading">TypenSneek - Les 1 Oefening 18</div>
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
  <p>Dit is de laatste oefening van deze les. Doe goed je best en verbeter je record.</p>
    <img src="/TypenSneek/TypenSneek/TypenSneek/img/tienvingers.png" >
  </div>
</div>
  <script src="../script.js"></script>
</body>
</html>


