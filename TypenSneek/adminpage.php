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

$result = mysqli_query($conn,"SELECT * FROM gebruikers WHERE Aangemeld = 0 ");

echo "<a href='index.php'>Terug</a>";
echo "<h2> Aanmeldingen: </h2>";
echo "<table border='1'>
<tr>
<th>Voornaam</th>
<th>Achternaam</th>
<th>Email</th>
<th>Telefoonnummer</th>
<th>GeboorteDatum</th>
<th>Straat</th>
<th>Postcode</th>
<th>Woonplaats</th>
<th>School</th>
<th>Opmerking</th>
<th>Gemaakt op</th>
<!-- <th>Gebruikersnaam</th> -->
<!--  <th>Wachtwoord</th> -->

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


    mysqli_close($conn);
?>



