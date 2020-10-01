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
    <title>Hello, world!</title>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
    function onSubmit(token) {
        document.getElementById("captcha").submit();
    }
</script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-primary purple shadow fixed-top mx-auto " >
    <div class="container mx-auto ">
        <a class="navbar-brand" href="index.php"><img src="img/Logo.png" width="auto" height="50" class="d-inline-block align-top" alt=""></a>
        <button class="navbar-toggler mx-auto " type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse mxt-4 pt-1" id="navbarResponsive">
            <ul class="navbar-nav ml-auto ">


                <li class="nav-item mx-1 pt-2 text-center">
                    <a class="nav-link bg-warning rounded-pill" href="Blindtypen.php">Blindtypen</a>
                </li>
                <li class="nav-item mx-1 pt-2 text-center">
                    <a class="nav-link bg-success rounded-pill" href="Ervaringen.php">Ervaringen</a>
                </li>
                <li class="nav-item mx-1 pt-2 text-center">
                    <a class="nav-link bg-danger rounded-pill" href="Dyslexie.php">Dyslexie</a>
                </li>
                <li class="nav-item mx-1 pt-2 text-center ">
                    <a class="nav-link bg-success rounded-pill " href="DeCursus.php ">De cursus</a>
                </li>
                <li class="nav-item mx-1 pt-2 text-center">
                    <a class="nav-link bg-warning rounded-pill"  href="aanmelden.php">Aanmelden</a>
                </li>
                <li class="nav-item  mx-1 pt-2 text-center">
                    <a class="nav-link bg-danger rounded-pill" href="Contact.php">Contact</a>
                </li><?php
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

                    if($_SESSION["usertype"] == "admin"){
                        echo "<li class='nav-item'>
                            <a class='nav-link' href='adminpage.php'>Coach Pagina</a>
                            </li>";

                    }


                }
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    //header("location: login.php");
                    //exit;

                    echo "<form action='index.php' method='post'> <input type='submit' name='logout' value='Uitloggen' class='btn btn-primary'> </form> ";

                    if(isset($_POST['logout'])){
                        // Initialize the session
                        session_start();

                        // Unset all of the session variables
                        $_SESSION = array();

                        // Destroy the session.
                        session_destroy();

                        // Redirect to login page
                        header("location: index.php");
                        exit;
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>


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
    
    <input type="submit" value="Aanmaken" name="submit" class="btn btn-primary">
        <!-- Gebruikerstype Admin of gebruiker -->
        <!-- Gemaakt op -->
        <!-- Gebruikersnaam -->
        <!-- Wachtwoord -->
        <!-- Aangemeld tinyint - 0 meegeven-->
   
    </form>
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
