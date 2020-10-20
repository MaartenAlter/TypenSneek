<?php

session_start();


header('Content-Type: application/json'); 


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


if (isset($_POST['wpm'],$_POST['cpm'],$_POST['errors'],$_POST['accuracy'], $_POST['time'])) {

    $wpm = (int)$_POST['wpm'];
    $cpm = (int)$_POST['cpm'];
    $errors = $_POST['errors'];
    $accuracy = $_POST['accuracy'];
    $time = $_POST['time'];

    $les = $_POST['lesson'];
    $oefening = $_POST['exercise'];
    $user = $_SESSION["id"];
    

    $sql = "INSERT INTO progressie (apm, wpm, tijd, fouten, accuraatheid, userID, Les, Oefening)
    VALUES ('$cpm', '$wpm', '$time', '$errors', '$accuracy', '$user', '$les', '$oefening')";


    if (mysqli_query($conn, $sql)) {

        echo json_encode(Array('valid' => true));
         } else {
         
         echo json_encode(Array('valid' => false));
       }
     mysqli_close($conn);


exit;
}

echo json_encode(Array('valid' => false));


?>