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
        $username_err = "Vul uw gebruikersnaam in.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Vul uw wachtwoord in.";
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
                            $password_err = "Het wachtwoord is niet geldig";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Geen account gevonden met deze gebruikersnaam.";
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
    <title>Hello, world!</title>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
    function onSubmit(token) {
        document.getElementById("captcha").submit();
    }
</script>
</head>
<body class="bg-primary darken-grey-text">

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top " >
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/Logo.png" width="auto" height="50" class="d-inline-block align-top" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a class="nav-link" href="Blindtypen.php">Blindtypen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Ervaringen.php">Ervaringen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Dyslexie.php">Dyslexie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="DeCursus.php">De cursus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aanmelden.php">Aanmelden</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Contact.php">Contact</a>
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


<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-sm">
           <h4 class="mx-auto">Over ons</h4>
            <hr>
            <p>
                Cursus 10-vingerblind-computertypen voor kinderen en volwassenen.<br><br>
                Wij geven al vele jaren les en zijn zeer ervaren.<br><br>

                U kunt kiezen uit een klassikale cursus in groepsverband, maar ook uit een individuele cursus online met online coaching.<br><br>

                Huiswerk wordt automatisch nagekeken.<br><br>

                Door de kleine groepen is er veel persoonlijke aandacht, begeleiding en uitleg.
                <br><br>
                Wie eenmaal de cursus met succes heeft doorlopen, heeft hier de rest van zijn/haar leven profijt van.<br><br>

                Ook voor kinderen met dyslexie bent u bij ons aan het juiste adres.<br><br>

                Heeft u na het lezen van onze website nog vragen, neem dan gerust contact met ons op, wij zullen proberen al uw vragen te beantwoorden.
            </p>
            <br>
            <br>

        </div>
<?php   
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    //header("location: login.php");
    //exit;
    
   echo "
        <div class='col-sm'>
           <h4 class='mx-auto'>Hoi, " . $_SESSION['username'] . "</h4>
            <hr>
            <p>
                Leuk dat je er bent! De typcursus staat voor je klaar. Om te beginnen klik de knop hieronder. En voor vragen kun je altijd de online coach gebruiken.
            </p>
            <br>
            <button type='button' class='btn btn-outline-primary' href='DeCursus.php'>Cursus</button>
        </div>";
}else{
?>
        <div class="wrapper">
        <h2>Login</h2>
        <p>Vul hier je gebruikersnaam en wachtwoord in!</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group rounded-pill <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Gebruikersnaam</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group rounded-pill <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Wachtwoord</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
                <button class="g-recaptcha" class="btn btn-primary" data-sitekey="6Lcs1swZAAAAAC6EQaUBZMtU0wm58efdk5uR1vAT" data-callback='onSubmit' data-action='submit'>Submit</button>
            </div>
        </div>

<?php } ?>


</div>



<!-- Footer -->
<section id="footer" class="footer">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>links</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Aanmelden</a></li>
                    <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Blindtypen</a></li>
                    <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Dyslexie</a></li>
                    <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Over ons</a></li>
                    <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Ervaringen</a></li>
                    <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>De cursus</a></li>
                    <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Contact</a></li>

                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Contact</h5>
                <!-- Google Map -->
                <div style="width: 350px;position: relative;"><iframe width="350" height="170" src="https://maps.google.com/maps?width=350&amp;height=120&amp;hl=en&amp;q=Pinksterbloem%2026+(Typen%20Sneek)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
                        <small style="line-height: 1.8;font-size: 2px;background: #fff;">
                        </small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <br><br><br>
                Pinksterbloem 26 <br>
                8607 DV SNEEK<br>
                0515 - 419424<br>
                <br><br>
                <button type="button" class="btn btn-outline-primary" >Stuur een bericht</button>


            </div>
        </div>

    </div>
</section>

<!-- ./Footer -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
