<?php
session_start();
?>
<html lang="en">
<head>
  <title>TypenSneek</title>
  <link rel="stylesheet" href="stylecursus.css">
</head>
<body>
  <div class="container">
    <div class="heading">TypenSneek - Les 1 Oefening 1</div>
    <div class="header">
      <div class="wpm">
        <div class="header_text">WPM</div>
        <div class="curr_wpm">100</div>
      </div>
      <div class="cpm">
        <div class="header_text">APM</div>
        <div class="curr_cpm">100</div>
      </div>
      <div class="errors">
        <div class="header_text">Fouten</div>
        <div class="curr_errors">0</div>
      </div>
      <div class="timer">
        <div class="header_text">Tijd</div>
        <div class="curr_time">60s</div>
      </div>
      <div class="accuracy">
        <div class="header_text">% Accuraatheid</div>
        <div class="curr_accuracy">100</div>
      </div>
    </div>

    <div class="quote">Klik hieronder om te beginnen.</div>
    <textarea class="input_area" placeholder="start met typen..." oninput="processCurrentText()"
      onfocus="startGame()"></textarea>
    <button class="restart_btn" onclick="resetValues()">Opnieuw</button>
  </div>
  <script src="script.js"></script>
</body>
</html>