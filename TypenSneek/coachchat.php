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

$result = mysqli_query($conn,"SELECT * FROM gebruikers WHERE Aangemeld = 1 AND NOT ID= 15"); // Last ID needs to be admin id | admin = 15 on 30-10-2020

?><table class='table table-striped'>
        <tr>
            <th scope='col'>Voornaam</th>
            <th scope='col'>Achternaam</th>
            <th scope='col'>Email</th>
            <th scope='col'>Telefoonnummer</th>
            <th scope='col'>Bericht</th>
            <th scope='col'>Bericht versturen</th>
        </tr>
    </table>
    <?php
$rowid = 1;
while($row = mysqli_fetch_array($result))
{
?>
    <form action="processcoach.php" method="post">
        <table>
            <tr>
                <td><?php echo $row['Voornaam'];?></td>
                <td><?php echo $row['Achternaam'];?></td>
                <td><?php echo $row['Email'];?></td>
                <td><?php echo $row['Telefoonnummer'];?></td>


                <input type="hidden" name="chat_message_id" value=''>
                <input type="hidden" name="id" value='<?php echo $rowid;?>'>
                <input type="hidden" name="from_user_id" value='15'><!-- needs to be admin id | admin = 15 on 30-10-2020 -->
                <td><input type="hidden" name="to_user_id" value='<?php echo $row['ID'];?>'></td>
                <td> Message: <input type="text" pattern='.*\S+.*' title='Dit veld mag niet leeg zijn'
                        name="chat_message"></td>
                <input type="hidden" name="timestamp" value=''>
                <td><input type="submit" value="Verstuur bericht"></td>
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