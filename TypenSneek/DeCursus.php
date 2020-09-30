<?php 
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="stylecursus.css">
  <script src="script.js" defer></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <title>TypenSneek</title>
</head>
<body>
<header>
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
</header>


  <div class="cursus bg-light" >
    <div class="quote-display" id="quoteDisplay"></div>
    <textarea id="quoteInput" class="quote-input" autofocus></textarea>
  </div>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>