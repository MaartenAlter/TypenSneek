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

session_start();


if($_SESSION['usertype'] === "admin"){

}else{
    header("Location: index.php");
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

    <title>AdminPage</title>
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
<br>
<br>
<br>
<br>
<br>
<div style='padding-left: 10px; padding-right: 10px;'>

    <h2> Aanmeldingen </h2>
    <hr>
    <?php
    $result = mysqli_query($conn,"SELECT * FROM gebruikers WHERE Aangemeld = 0 ");
    echo "<table class='table table-striped'>
<tr >
<th scope='col'>Voornaam</th>
<th scope='col'>Achternaam</th>
<th scope='col'> Email</th>
<th scope='col'>Telefoonnummer</th>
<th scope='col'>GeboorteDatum</th>
<th scope='col'>Straat</th>
<th scope='col'>Postcode</th>
<th scope='col'>Woonplaats</th>
<th scope='col'>School</th>
<th scope='col'>Opmerking</th>
<th scope='col'>Gemaakt op</th>
<th scope='col'>Registreeren</th>
<th scope='col'>Verwijderen</th>
</tr>";

    while($row = mysqli_fetch_array($result))
    {
        echo "<form action='adminpage.php' method='POST'>";
        echo "<tr>";
        echo "<td>" . $row['Voornaam'] . "</td>";
        echo "<td>" . $row['Achternaam'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Telefoonnummer'] . "</td>";
        echo "<td>" . $row['GeboorteDatum'] . "</td>";
        echo "<td>" . $row['Straat'] . "</td>";
        echo "<td>" . $row['Postcode'] . "</td>";
        echo "<td>" . $row['Woonplaats'] . "</td>";
        echo "<td>" . $row['School'] . "</td>";
        echo "<td>" . $row['Opmerking'] . "</td>";
        echo "<td>" . $row['GemaaktOp'] . "</td>";
//echo "<td>" . "<input type='text' name='username'  id=" .$row['ID']."   >" . "</td>";
//echo "<td>" . "<input type='password' name='password' id=" .$row['ID']." >". "</td>";
        echo "<td>" . "<a href='adminpage.php?action=accept&id=".$row['ID']. "'>registreer</a>" . "</td>";
        echo "<td>" . "<a href='adminpage.php?action=delete&id=".$row['ID']."'onClick='return confirm(/Wilt u deze gebruiker wissen?/)'>verwijder</a>" . "</td>";
        echo "</tr>";


    }
    echo "</table>";
    echo " </form>";


    if (isset($_GET['action']) && $_GET['action'] === 'accept') {
        $sql = "SELECT * FROM gebruikers WHERE id=" .$_GET['id'];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<h2>Registreren:</h2> 
            <form action='adminpage.php?action=accept&id=".$_GET['id']."' method='POST'> <br>
              Naam: ". $row['Voornaam']. "<br>
              Achternaam: ". $row['Achternaam']. "<br>
              Email: ". $row['Email']. "<br>
            Gebruikersnaam: <input type='text'  required name='username' '><br>
            Wachtwoord:  <input type='password'  required name='password'  '><br>
            <input type='submit' name='Submit' value='Registreer' onClick='return confirm(/Weet u zeker dat u deze gebruiker wilt toevoegen?/) '><br>
            <br></form> <br>";
            }
            if (isset($_POST['Submit'])) {


                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql = "UPDATE gebruikers SET Gebruikersnaam= '$username', Wachtwoord= '$password', Aangemeld= 1 WHERE ID=" .$_GET['id'];
                $result = mysqli_query($conn, $sql);
                header("Location: adminpage.php");
            }



        }
    }


    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        $sql = "DELETE FROM gebruikers WHERE  ID=" .$_GET['id'];
        $result = mysqli_query($conn, $sql);
        header("Location: adminpage.php");
    }

    ?>


</div>

<h2>Geregistreerde gebruikers </h2>
    <hr>
    <?php
    $result = mysqli_query($conn,"SELECT * FROM gebruikers WHERE Aangemeld = 1 ");
    echo "<table class='table table-striped'>
<tr >
<th scope='col'>Voornaam</th>
<th scope='col'>Achternaam</th>
<th scope='col'> Email</th>
<th scope='col'>Telefoonnummer</th>
<th scope='col'>GeboorteDatum</th>
<th scope='col'>Straat</th>
<th scope='col'>Postcode</th>
<th scope='col'>Woonplaats</th>
<th scope='col'>School</th>
<th scope='col'>Opmerking</th>
<th scope='col'>Gemaakt op</th>
<th scope='col'>Registreeren</th>
<th scope='col'>Verwijderen</th>
</tr>";

    while($row = mysqli_fetch_array($result))
    {
        echo "<form action='adminpage.php' method='POST'>";
        echo "<tr>";
        echo "<td>" . $row['Voornaam'] . "</td>";
        echo "<td>" . $row['Achternaam'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Telefoonnummer'] . "</td>";
        echo "<td>" . $row['GeboorteDatum'] . "</td>";
        echo "<td>" . $row['Straat'] . "</td>";
        echo "<td>" . $row['Postcode'] . "</td>";
        echo "<td>" . $row['Woonplaats'] . "</td>";
        echo "<td>" . $row['School'] . "</td>";
        echo "<td>" . $row['Opmerking'] . "</td>";
        echo "<td>" . $row['GemaaktOp'] . "</td>";
//echo "<td>" . "<input type='text' name='username'  id=" .$row['ID']."   >" . "</td>";
//echo "<td>" . "<input type='password' name='password' id=" .$row['ID']." >". "</td>";
        echo "<td>" . "<a href='adminpage.php?action=accept&id=".$row['ID']. "'>registreer</a>" . "</td>";
        echo "<td>" . "<a href='adminpage.php?action=delete&id=".$row['ID']."'onClick='return confirm(/Wilt u deze gebruiker wissen?/)'>verwijder</a>" . "</td>";
        echo "</tr>";


    }
    echo "</table>";
    echo " </form>";
?>
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
