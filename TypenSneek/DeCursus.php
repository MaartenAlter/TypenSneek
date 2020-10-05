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
      
</head>

<body>
<form action="" method="post" >
  <div class="container">
    <div class="heading">TypenSneek - Les 1 Oefening 1</div>
    <div class="header">
      <div class="wpm">
        <div class="header_text">WPM</div>
        <div class="curr_wpm" name="wpm"> 100 </div>
      </div>
      <div class="cpm">
        <div class="header_text">APM</div>
        <div  class="curr_cpm"> 100 </div>
      </div>
      <div class="errors">
        <div class="header_text">Fouten</div>
        <div  class="curr_errors"> 0 </div>
      </div>
      <div class="timer">
        <div class="header_text">Tijd</div>
        <div  class="curr_time"> 0s </div>
      </div>
      <div class="accuracy">
        <div class="header_text">% Accuraatheid</div>
        <div  class="curr_accuracy"> 0 </div>
      </div>
    </div>

    <div class="quote">Klik hieronder om te beginnen.</div>
    <textarea class="input_area" placeholder="start met typen..." oninput="processCurrentText()"
      onfocus="startGame()"></textarea>
    <button  name="next" class="restart_btn" onclick="resetValues()" >Volgende</button>
     </form>
  </div>
  <script src="script.js"></script>
</body>
</html>


<?php



if(isset($_POST['next'])){
  
    //$wpm = $_POST['wpm'];
    $apm = $_POST['apm'];
    $fouten = $_POST['fouten'];
    $tijd = $_POST['tijd'];
    $accuraatheid = $_POST['accuraatheid'];
  

   // $userID = $_SESSION['ID'];
    $les = '1';
    $oefening = '1';

    $sql = "INSERT INTO progressie (apm, wpm, tijd, fouten, accuraatheid, Les, Oefening)
    VALUES ('$apm', '$wpm', '$tijd', '$fouten', '$accuraatheid', '$les', '$oefening')";
     if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    mysqli_close($conn);

}
?>
