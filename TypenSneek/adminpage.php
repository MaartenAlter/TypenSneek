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


$result = mysqli_query($conn,"SELECT * FROM gebruikers WHERE Aangemeld = 0 ");
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
<th>Gebruikersnaam</th>
<th>Wachtwoord</th>

</tr>";

while($row = mysqli_fetch_array($result))
{

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
echo "<td>" . "<input type='text' name='username'  id=" .$row['ID']."   >" . "</td>";
echo "<td>" . "<input type='password' name='password' id=" .$row['ID']." >". "</td>";
echo "<td>" . "<a href='adminpage.php?action=accept&id=".$row['ID']. "'>accepteer</a>" . "</td>";
echo "<td>" . "<a href='adminpage.php?action=delete&id=".$row['ID']."'onClick='return confirm(/Weet je zeker dat je de record wilt wissen?/)'>verwijder</a>" . "</td>";
echo "</tr>";


}
echo "</table>";



    if (isset($_GET['action']) && $_GET['action'] === 'accept') {
        $result = mysqli_query($conn, $sql);
        
     $username = $_POST["username"];
     $password = $_POST["password"];

     $sql = "UPDATE gebruikers SET Gebruikersnaam='$username', Wachtwoord='$password' WHERE ID=" .$_GET['ID'];
     $result = mysqli_query($conn, $sql);
     header("Location: adminpage.php");

     if (mysqli_query($conn, $sql)) {
         echo "New record created successfully";
       } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);      }

    }



    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        $sql = "DELETE FROM gebruikers WHERE  ID=" .$_GET['id'];
        $result = mysqli_query($conn, $sql);
    
        }
mysqli_close($conn);
?>



