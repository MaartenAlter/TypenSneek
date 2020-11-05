<?php 
session_start();
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


echo "<button onclick=\"window.location.href='index.php';\"class='btn btn-primary'>Terug</button>";
if($_SESSION['usertype'] === "admin"){



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>

<body>
    <?php

$result = mysqli_query($conn,"SELECT
Voornaam,
Achternaam,
Email,
Telefoonnummer,
ID
FROM
gebruikers
WHERE
Aangemeld = 1 AND NOT ID = 15"); 
// Last ID needs to be admin id | admin = 15 on 30-10-2020
//$result2 = mysqli_query($conn, "SELECT chat_message, timestamp FROM chat_message");
?><table class='table table-striped'>
        <tr>
            <th scope='col'>Voornaam</th>
            <th scope='col'>Achternaam</th>
            <th scope='col'>Email</th>
            <th scope='col'>Telefoonnummer</th>
            <th scope='col'>Berichten bekijken</th>
        </tr>
    </table>
    <?php
$rowid = 1;

while($row = mysqli_fetch_array($result))
{
?>
    <form action="coachchat.php" method="post">
        <table>
            <tr>
                <td><?php echo $row['Voornaam'];?></td>
                <td><?php echo $row['Achternaam'];?></td>
                <td><?php echo $row['Email'];?></td>
                <td><?php echo $row['Telefoonnummer'];?></td>

                <td><button type='button' class='btn-outline-danger btn border-2'>
                <?php
                    echo "<a href='coachchat.php?chosen_user=".$row['ID']."&surname=".$row['Voornaam']."&lastname=".$row['Achternaam']."'>Zie berichten</a>"
                ?>
                    </button>
                </td>
            </tr>
        </table>
    </form>
    <?php
    $rowid = $rowid + 1;
}

}else{
    header("Location: index.php");
}
?>
    
</body>
</html>