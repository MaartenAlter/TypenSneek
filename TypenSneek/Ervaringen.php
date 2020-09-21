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
    <title>Hello, world!</title>
</head>
<body>

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



<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h4>Ervaringen</h4>
                    We hebben al vele cursisten gehad op les. <br>
                    Iedereen kan een reactie sturen. Deze worden dan op deze plaats gezet.

                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <p>Hartelijk bedankt voor alle goede zorgen, leuke lessen en super begeleiding.
                    Groeten van Susan (en haar ouders)</p>

                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">

                    <p class="card-text">Bedankt voor de goede zorgen en fantastische resultaten die jullie hebben weten te behalen voor onze dochter Sanne-Rixt.</p>

                </div>
            </div>
        </div>


    </div>
</div>
<!--row #2-->
<div class="container" style="margin-top: 70px">
    <div class="row">
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">

                    <p class="card-text">Omdat ik nu blind kan typen had ik veel meer tijd voor mijn werkstuk. De eerste keer een 5,5 en nu had ik een 8. Hier ben ik heel blij mee. Ruben</p>

                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">

                    <p class="card-text">Ik moest van mijn ouders op typeles. Het huiswerk was niet altijd even leuk, maar ik ben nu toch heel blij dat ik blind kan typen. Bedankt. Maarten</p>

                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">

                    <p class="card-text">Bedankt dat jullie toch nog een mogelijkheid hebben gevonden dat Sanne de lessen kon volgen. Fantastisch! Sanne kan nu goed typen en wij zijn heel trots. Anneke en Marco de Boer
                    </p>

                </div>
            </div>
        </div>


    </div>
</div>




<!--    footer-->
<!-- Grid row -->
<div class="footer" id="footer">

    <!-- Grid column -->
    <div class="col-md-12 mb-4">

        <!--Footer-->
        <footer class="page-footer blue text-center text-md-left mt-0">

            <!--Footer Links-->
            <div class="container-fluid">
                <div class="row">

                    <!--First column-->
                    <div class="col-md-6">
                        <h5 class="title mb-3">TypenSneek</h5>
                        <p>               Pinksterbloem 26 <br>
                            8607 DV SNEEK<br>
                            0515 - 419424<br>
                            <br><br> </p>
                    </div>
                    <!--/.First column-->

                    <!--Second column-->
                    <div class="col-md-3">
                        <h5 class="list-unstyled quick-links">Links</h5>
                        <ul>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Aanmelden</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Blindtypen</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Dyslexie</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Over ons</a></li>

                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h5 class="list-unstyled quick-links"><br></h5>
                        <ul>

                            <li><a href=""><i class="fa fa-angle-double-right"></i>Ervaringen</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>De cursus</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Contact</a></li>
                        </ul>
                    </div>
                    <!--/.Second column-->
                </div>
            </div>
            <!--/.Footer Links-->

            <!--Copyright-->
            <div class="footer-copyright">
                <div class="container-fluid">
                    © 2020 Copyright: <a href="index.php"> TypenSneek.nl </a>

                </div>
            </div>
            <!--/.Copyright-->

        </footer>
        <!--/.Footer-->

    </div>
    <!-- Grid column -->
</div>
<!-- Grid row -->
<!-- ./Footer -->

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
