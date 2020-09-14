<?php
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

<body>
  <a href="index.php">terug</a>
    <h3>Aanmelden: </h3>
    <form action="aanmelden.php" method="post">
        <input type="text" name="firstname" id="firstname" placeholder="Voornaam..."> <br>
        <input type="text" name="lastname" id="lastname" placeholder="Achternaam..."> <br>
        <input type="text" name="email" id="email" placeholder="Email..."> <br>
        <input type="text" name="phonenumber" id="phonenumber" placeholder="Telefoonnummer..."> <br>
        <input type="date" name="dateofbirth" id="dateofbirth" placeholder="Geboortedatum..."> <br>
        <input type="text" name="street" id="street" placeholder="Straat en huisnummer..."> <br>
        <input type="text" name="zipcode" id="zipcode" placeholder="Postcode..."><br>
        <input type="text" name="place" id="place" placeholder="Woonplaats..."><br>
        <input type="text" name="school" id="school" placeholder="School..."><br>
        <input type="text" name="command" id="command" placeholder="Opmerking..."><br>
        <input type="submit" value="Aanmaken" name="submit"><br>
        <!-- Gebruikerstype Admin of gebruiker -->
        <!-- Gemaakt op -->
        <!-- Gebruikersnaam -->
        <!-- Wachtwoord -->
        <!-- Aangemeld tinyint - 0 meegeven-->

    </form>
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
    $gemaaktop = date("d-m-Y");
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