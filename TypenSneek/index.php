<?php
/**
 * Copyright (c) 2020.
 * Alexander Riemersma
 * Maarten Alter
 */

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page


// Include config file
require_once "include/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
//        $username_err = "Vul uw gebruikersnaam in.";
        $username_err = "<div class='alert alert-danger' role='alert'> fout! </div> ";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
//        $password_err = "Vul uw wachtwoord in.";
        $password_err = " <br> <div class='alert alert-danger' role='alert'> Vul uw wachtwoord in. </div> ";

    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT ID, Gebruikersnaam, Wachtwoord, GebruikerType  FROM gebruikers WHERE Gebruikersnaam = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $usertype);
                    if (mysqli_stmt_fetch($stmt)) {
                        if ($hashed_password === $_POST['password']) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["usertype"] = $usertype;
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = " <br> <div class='alert alert-danger' role='alert'> Het wachtwoord is niet geldig </div> ";

                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
//                    $username_err = "Geen account gevonden met deze gebruikersnaam.";
                    $username_err = " <br> <div class='alert alert-danger' role='alert'> Geen account gevonden met deze gebruikersnaam. </div> ";
                }
            } else {
                echo "Oeps! Er is wat fout gegaan.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}


?>
<!--cms-->
<?php
$databaseHost = 'localhost';
$databaseName = 'typensneek';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$result = mysqli_query($mysqli, "SELECT Title, Text FROM cms where id=1 ");

while ($user_data = mysqli_fetch_array($result)) {
  $title =  $user_data['Title'];
  $text = $user_data['Text'];
}
?>
<!--/cms-->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--    external css -->
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("captcha").submit();
        }
    </script>
<!--    css-->
    <link rel="stylesheet" href="style.css">
    <title>TypenSneek</title>
</head>
<body>
<!--<style>-->
<!--    html body{-->
<!--        background: rgb(34,159,195);-->
<!--       background:  linear-gradient(0deg, rgba(34,159,195,1) 18%, rgba(13,23,198,1) 94%);-->
<!--    }-->
<!--</style>-->
<?php

include "include/navbar.php";
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    //header("location: login.php");
    //exit;
    $location = "lessen.php";
    echo "<div class='container'>
  <div class='row'>
    <div class='col-sm'>
              <div class='col-sm rounded p-3 ' style='margin-top:101px; background: #ffffe6; max-width: 1100px' >
           <h4 class='mx-auto'>Hoi, " . $_SESSION['username'] . "</h4>
            <hr>
            <p>
                Leuk dat je er bent! De typcursus staat voor je klaar. Om te beginnen klik de knop hieronder. En voor vragen kun je altijd de online coach gebruiken.
            </p>
            <br>
         
            <button type='button' class='btn btn-outline-primary' onclick=window.location.href='lessen.php'>Cursus</button>

        </div>
    </div>
    <div class='col-sm'>
          <div class='col-sm'>
              <div class='col-sm rounded p-3 ' style='margin-top:101px; background: #F5E6CC; max-width: 1100px' >
           <h4 class='mx-auto'>Vragen?</h4>
            <hr>
            <p>
              Als je vragen of een opmerking hebt, kun je die stellen via de HulpCoach. klik op de knop hier onder!<br><br>
            </p>
            <br>
            <button type='button' class='btn btn-outline-primary'><a href='#'> De cursus</a></button>

        </div>
    </div>
</div>";
//2e rij
    echo "<div class='container'>
  <div class='row'>
    <div class='col-sm'>
              <div class='col-sm rounded p-3 ' style='margin-top:50px; background: #F5E6CC; max-width: 1100px' >
           <h4 class='mx-auto'>Aanmeldingen beheer</h4>
            <hr>
            <p>
                Voor het overzicht van alle cursisten en de nieuwe aanmeldingen <br>
                klik op de knop hieronder.
                  
            </p>
            
             ";
    if ($_SESSION["usertype"] == "admin") {
        echo "<button type='button' class='btn-outline-danger btn border-2'><a class='nav-link' style='color: black' href='adminpage.php'>Beheer</a></button>";
    };
    echo "
                

        </div>
    </div>
    <div class='col-sm'>
          <div class='col-sm'>
              <div class='col-sm rounded p-3 ' style='margin-top:50px; background: #F5E6CC; max-width: 1100px' >
           <h4 class='mx-auto'>CMS (pagina veranderen)</h4>
            <hr>
                <p>Verander de inhoud van pagina's</p>
                <br>
            <button type='button' class='btn-outline-danger btn border-2'><a class='nav-link' style='color: black' href='CMS/read.php'>CMS</a></button>

        </div>
    </div>
</div>";

} else {
    $databaseHost = 'localhost';
    $databaseName = 'typensneek';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    $result = mysqli_query($mysqli, "SELECT Title, Text FROM cms where id=1 ");

    while ($user_data = mysqli_fetch_array($result)) {
        $title =  $user_data['Title'];
        $text = $user_data['Text'];
    }
    echo '<div class="container " style="margin-top: 101px">
    <div class="row">
        <div class="col-sm rounded mr-5 p-3" style="background: #fca62a; color: black; font-size: larger; " >
          <h4 class="mx-auto" >';echo $title;'';echo '</h4>

          <hr>
            <p>';echo "$text";'';echo '<p>
            <br>
            <br>
            <div class="col-sm" >
                <button type="button" formaction="Contact.php" class="btn btn-lg rounded-pill " style="color: black; background-color: #23a5ed;"><a style="color: black" href="Contact.php">Neem contact op!</a></button>
                <button type="button" formaction="Contact.php"  class="btn btn-lg rounded-pill" style="color: black; background-color: #23a5ed;"><a style="color: black" href="proefles.php">Doe een proefles</a></button>
            </div>
        </div>';
    require "include/Preindex.php";
    echo '<footer style="margin-top: 70px; background: #8ac246; margin-bottom: 10%;" class="rounded p-3" >
        <div class="footer">
            <div class="container" style="color: black;">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                        <h3>Menu</h3>
                        <hr>

                        <ul class="column list-unstyled">
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Aanmelden</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Blindtypen</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Dyslexie</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Over ons</a></li>

                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                        <h3>Menu</h3>
                        <hr>
                        <ul class="column list-unstyled">

                            <ul class="column list-unstyled" style="margin-top: 50px">

                                <li><a href=""><i class="fa fa-angle-double-right"></i>Ervaringen</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i>De cursus</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i>Contact</a></li>
                            </ul>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                        <h3>Contact</h3>
                        <hr>
                        <ul class="column list-unstyled">
                            <li>Pinksterbloem 26</li>
                            <li>8607 DV SNEEK</li>
                            <li>0515 - 419424</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ikonlar">
            <div class="container">
                <div class="row text-center">
<br>
                    <p>Copyright © 2020. Typensneek.nl</p>
                </div>
            </div>
        </div>
    </footer>';
}
?>
</body>
</html>
