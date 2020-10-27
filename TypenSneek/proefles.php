<html lang="en">
<head>
  <title>TypenSneek</title>
  <link rel="stylesheet" href="stylecursus.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<p hidden id="course">jf jf jf fj fj fj jfj jfj jfj fjf fjf fjf ffj jjf fjj jff fj f fj fj fj jf jf jf fjf jfj fjf jfj jfj jfj jjf ffj jff fjj jf j fjfj jfjfj ffjj jffj fjjf jjff fffj jjjf fjjf jffj jfjf fjjf f</p>
<body>
<form action="" method="post" id="scoreForm" >
  <div class="container">
    <div class="heading">TypenSneek - Proefles</div>
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
    <button  name="next" class="restart_btn"><a href="index.php"> Volgende </a></button>
 
     </form>
  </div>
  <div class="container3">
  <div class="container2">
  <h1>Tips</h1>
  <p>In deze oefening gaan we de letters f en j door elkaar doen.
Weet je het nog: de f met je linker wijsvinger en de j met je rechter wijsvinger.
Type rustig en blind.</p>
    <img src="img/tienvingers.png" >
  </div>
</div>
  <script src="script.js"></script>
</body>
</html>


