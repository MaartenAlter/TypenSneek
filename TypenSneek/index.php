<!--
#A64AC9
#FCCD04
#FFB48F
#F5E6CC
#17E9E0
-->
    <?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page

 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
//        $username_err = "Vul uw gebruikersnaam in.";
        $username_err = "<div class='alert alert-danger' role='alert'> fout! </div> ";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
//        $password_err = "Vul uw wachtwoord in.";
        $password_err = " <br> <div class='alert alert-danger' role='alert'> Vul uw wachtwoord in. </div> ";

    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT ID, Gebruikersnaam, Wachtwoord, GebruikerType  FROM gebruikers WHERE Gebruikersnaam = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $usertype);
                    if(mysqli_stmt_fetch($stmt)){
                        if($hashed_password === $_POST['password']){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            $_SESSION["usertype"] = $usertype;
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = " <br> <div class='alert alert-danger' role='alert'> Het wachtwoord is niet geldig </div> ";

                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
//                    $username_err = "Geen account gevonden met deze gebruikersnaam.";
                    $username_err = " <br> <div class='alert alert-danger' role='alert'> Geen account gevonden met deze gebruikersnaam. </div> ";
                }
            } else{
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
    <link rel="stylesheet" href="css/footer.css"
    <link rel="stylesheet" href="css/index.css"

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
    function onSubmit(token) {
        document.getElementById("captcha").submit();
    }
</script>
</head>
<body style="background: #17E9E0">

<nav class="navbar navbar-expand-lg navbar-light  shadow fixed-top  mx-auto rounded" style="max-width: 1150px; background: #F5E6CC"  >
    <div class="container mx-auto ">
        <a class="navbar-brand" href="index.php"><img src="img/Logo.png" width="auto" height="50" class="d-inline-block align-top" alt=""></a>
        <button class="navbar-toggler mx-auto " type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse mxt-4 pt-1" id="navbarResponsive">
            <ul class="navbar-nav ml-auto ">


                <li class="nav-item mx-1 pt-2 text-center">
                    <a class="nav-link bg-warning rounded-pill"  style="color: black" href="Blindtypen.php">Blindtypen</a>
                </li>
                <li class="nav-item mx-1 pt-2 text-center">
                    <a class="nav-link bg-success rounded-pill" style="color: black" href="Ervaringen.php">Ervaringen</a>
                </li>
                <li class="nav-item mx-1 pt-2 text-center">
                    <a class="nav-link bg-danger rounded-pill" style="color: black" href="Dyslexie.php">Dyslexie</a>
                </li>
                <li class="nav-item mx-1 pt-2 text-center ">
                    <a class="nav-link bg-success rounded-pill " style="color: black" href="lessen.php ">De cursus</a>
                </li>
                <li class="nav-item mx-1 pt-2 text-center">
                    <a class="nav-link bg-warning rounded-pill" style="color: black"  href="aanmelden.php">Aanmelden</a>
                </li>
                <li class="nav-item  mx-1 pt-2 text-center">
                    <a class="nav-link bg-danger rounded-pill" style="color: black" href="Contact.php">Contact</a>
                </li><?php
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){




                }
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    //header("location: login.php");
                    //exit;

                    echo "<form action='index.php' style='padding-left: 20px; margin-top: 8px' method='post'> <input type='submit' name='logout' value='Uitloggen' class='btn btn-primary bg-danger rounded-pill'> </form> ";

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
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    //header("location: login.php");
    //exit;



    echo "<div class='container'>
  <div class='row'>
    <div class='col-sm'>
              <div class='col-sm rounded p-3 ' style='margin-top:101px; background: #ffffff; max-width: 1100px' >
           <h4 class='mx-auto'>Hoi, " . $_SESSION['username'] . "</h4>
            <hr>
            <p>
                Leuk dat je er bent! De typcursus staat voor je klaar. Om te beginnen klik de knop hieronder. En voor vragen kun je altijd de online coach gebruiken.
            </p>
            <br>
            <button type='button' class='btn btn-outline-primary' href='DeCursus.php'>Cursus</button>

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
            <button type='button' class='btn btn-outline-primary' href='DeCursus.php'>HulpCoach</button>

        </div>
    </div>
</div>";
//2e rij
    echo"<div class='container'>
  <div class='row'>
    <div class='col-sm'>
              <div class='col-sm rounded p-3 ' style='margin-top:50px; background: #F5E6CC; max-width: 1100px' >
           <h4 class='mx-auto'>Coach Pagina</h4>
            <hr>
            <p>
                Voor het overzicht van alle cursisten en de nieuwe aanmeldingen <br>
                klik op de knop hieronder.
                  
            </p>
            
             .";if ($_SESSION["usertype"] == "admin"){
                       echo "<a class='nav-link' href='adminpage.php'>Coach Pagina</a>";
                        }; echo "

        </div>
    </div>
    <div class='col-sm'>
          <div class='col-sm'>
              <div class='col-sm rounded p-3 ' style='margin-top:50px; background: #F5E6CC; max-width: 1100px' >
           <h4 class='mx-auto'>Opties</h4>
            <hr>
<form method='post'>

</form>
            <br>
            <br>
            <button type='button' class='btn btn-outline-primary' href='DeCursus.php'>Voortgang</button>

        </div>
    </div>
</div>";

}else{
echo '<div class="container " style="margin-top: 101px">
    <div class="row">
        <div class="col-sm rounded mr-5 p-3" style="background: #F5E6CC; color: #05386B;" >
           <h4 class="mx-auto" >Over ons</h4>

            <hr>
            <p>
                Cursus 10-vingerblind-computertypen voor kinderen en volwassenen.<br>
                Wij geven al vele jaren les en zijn zeer ervaren.<br>

                U kunt kiezen uit een klassikale cursus in groepsverband, maar ook uit een individuele cursus online met online coaching.<br><br>

                Huiswerk wordt automatisch nagekeken.<br>

                Door de kleine groepen is er veel persoonlijke aandacht, begeleiding en uitleg.
                <br><br>
                Wie eenmaal de cursus met succes heeft doorlopen, heeft hier de rest van zijn/haar leven profijt van.<br>

                Ook voor kinderen met dyslexie bent u bij ons aan het juiste adres.<br>

                Heeft u na het lezen van onze website nog vragen, neem dan gerust contact met ons op, wij zullen proberen al uw vragen te beantwoorden.
            </p>
            <br>





            <p> U kunt de cursus ook online volgen.
                Succes is verzekerd. Tot nu toe hebben alle cursisten de cursus met goed resultaat afgerond.

                Deze cursus bestaat ook uit 9 lessen. Elke les heeft 8 dagen met opdrachten. Na de laatste opdracht volgt een toets. Aan het einde van de cursus volgt het examen.

                De cursist logt in met een persoonlijk wachtwoord.

                De cursist kan zelf het moment kiezen van de lestijd.

                Ook voor de online cursus is het nodig om 20 á 30 minuten per dag te typen.

                De toets wordt automatisch nagekeken.

                Direct na elke oefening ontvangt u terugkoppeling van de resultaten.

                Wij coachen de cursist online. De cursist kan online vragen stellen en deze worden ook online beantwoord. Ook is het mogelijk dat de online coach contact zoekt met de cursist.

                Lettergrootte van de tekst is aan te passen, speciaal voor dyslexie. </p>
            <br>
            <p>
                Wij werken met een beloningssysteem. Dit werkt erg motiverend.

                Op elke plaats waar internet is, kan gewerkt worden.

                De cursus wordt aangeboden voor
                € 125,00. Dit is inclusief examen.

                Het examen kan thuis gemaakt worden.
                Er is ook een mogelijkheid om het examen in ons eigen cursuslokaal te maken. U kunt hiervoor contact met ons opnemen.

                Oefening klaar, zoek de typespelletjes op!


                Probeer eens de onderstaande proefles!

                Het kan zijn dat het programma niet goed werkt met Internet Explorer.
                Installeer dan Google Chrome of Firefox voor een goede werking!

            </p>
            <br>
            <br>


            <div class="col-sm" >
                <button type="button" formaction="Contact.php" class="btn btn-warning btn-lg rounded-pill " style="color: black">Neem contact op!</button>
                <button type="button" formaction="Contact.php" class="btn btn-warning btn-lg rounded-pill" style="color: black">Doe een proefles</button>
            </div>
        </div>';
        require "Preindex.php";
        echo '<footer style="margin-top: 100px; background: #F5E6CC; margin-bottom: 10%;" class="rounded p-3">
        <div class="footer">
            <div class="container" style="color: #05386B;">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                        <h3>Menu</h3>
                        <hr>

                        <ul class="column list-unstyled" style="text-decoration: none;">
                            <li><a href=""><i class="fa fa-angle-double-right" style="text-decoration: none; color: black"></i>Aanmelden</a></li>
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
