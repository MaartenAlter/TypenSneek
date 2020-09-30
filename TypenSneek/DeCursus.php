<?php
session_start();
?>
<html lang="en">
<head>
  <title>Simple Speed Typer</title>
  <link rel="stylesheet" href="stylecursus.css">
</head>
<body>
  <div class="container">
    <div class="heading">Simple Speed Typing</div>
    <div class="header">
      <div class="wpm">
        <div class="header_text">WPM</div>
        <div class="curr_wpm">100</div>
      </div>
      <div class="cpm">
        <div class="header_text">CPM</div>
        <div class="curr_cpm">100</div>
      </div>
      <div class="errors">
        <div class="header_text">Errors</div>
        <div class="curr_errors">0</div>
      </div>
      <div class="timer">
        <div class="header_text">Time</div>
        <div class="curr_time">60s</div>
      </div>
      <div class="accuracy">
        <div class="header_text">% Accuracy</div>
        <div class="curr_accuracy">100</div>
      </div>
    </div>

    <div class="quote">Click on the area below to start the game.</div>
    <textarea class="input_area" placeholder="start typing here..." oninput="processCurrentText()"
      onfocus="startGame()"></textarea>
    <button class="restart_btn" onclick="resetValues()">Restart</button>
  </div>
  <script src="script.js"></script>
</body>
</html>