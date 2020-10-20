<nav class="navbar navbar-expand-lg navbar-light  shadow fixed-top  mx-auto rounded " style="max-width: 1150px; background: #F5E6CC"  >
    <div class="container mx-auto ">
        <a class="navbar-brand" href="index.php"><img src="img/Logo.png" width="auto" height="60" class="d-inline-block align-top" alt=""></a>
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
                </li>

                <?php

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
