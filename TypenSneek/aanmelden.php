<?php 
session_start();
?> 
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--    external css -->
    <link rel="stylesheet" href="css/footer.css">
    <title>Typensneek</title>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
    function onSubmit(token) {
        document.getElementById("captcha").submit();
    }
</script>
</head>
<?php
include "include/navbar.php";
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
<html>

<body style="background: #17E9E0 ">
<br><br><br><br><br>
<div class="container">
    <h3>Aanmelden: </h3>
    <form action="aanmelden.php" method="post">
    
    <div class="form-group">
        <label for="exampleInputEmail1">Voornaam: </label>
        <input type="text" name="firstname" id="firstname" placeholder="Voornaam... " class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Achternaam: </label>
        <input type="text" name="lastname" id="lastname" placeholder="Achternaam..." class="form-control"> 
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email: </label>
        <input type="text" name="email" id="email" placeholder="Email..." class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Telefoonnummer: </label>
        <input type="text" name="phonenumber" id="phonenumber" placeholder="Telefoonnummer..." class="form-control"> 
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Geboortedatum: </label>
        <input type="date" name="dateofbirth" id="dateofbirth" placeholder="Geboortedatum..." class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Straat en huisnummer: </label>
        <input type="text" name="street" id="street" placeholder="Straat en huisnummer..." class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Postcode: </label>
        <input type="text" name="zipcode" id="zipcode" placeholder="Postcode..." class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Woonplaats: </label>
        <input type="text" name="place" id="place" placeholder="Woonplaats..." class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">School: </label>
        <input type="text" name="school" id="school" placeholder="School..." class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Opmerking: </label>
        <input type="text" name="command" id="command" placeholder="Opmerking..." class="form-control">
    </div>
        <div>
            <input type="checkbox" name="AVG" required >
            <label for="exampleInputEmail1">Ik ga akkoord  met de AVG wet. </label>
        </div>
    <br>
    <input type="submit" value="Aanmaken" name="submit" class="btn btn-primary">
        <!-- Gebruikerstype Admin of gebruiker -->
        <!-- Gemaakt op -->
        <!-- Gebruikersnaam -->
        <!-- Wachtwoord -->
        <!-- Aangemeld tinyint - 0 meegeven-->
   
    </form>

    <?php
    require "include/footer.php";
    ?>

<div>
</body>
</html>


<?php



if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $dateofbirth = $_POST['dateofbirth'];
    $street = $_POST['street'];
    $zipcode = $_POST['zipcode'];
    $place = $_POST['place'];
    $school = $_POST['school'];
    $command = $_POST['command'];
    $usertype = 'user';
    $gemaaktop = date("Y-m-d");
    $aanmelding = 0;

   
      
      

    $sql = "INSERT INTO gebruikers (Voornaam, Achternaam, Email, Telefoonnummer, GeboorteDatum, Straat, Postcode, Woonplaats, School, Opmerking, GebruikerType, GemaaktOp, Aangemeld)
    VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$dateofbirth', '$street', '$zipcode', '$place', '$school', '$command', '$usertype', '$gemaaktop', '$aanmelding' )";
     if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    mysqli_close($conn);
}


?>
