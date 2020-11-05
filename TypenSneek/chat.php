<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>

<button onclick="window.location.href='index.php';" class="btn btn-primary">Terug</button>

<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Voornaam</th><th>Achternaam</th><th>Chat bericht</th><th>Datum en tijd</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

$servername = "localhost";
$username = "root";

$user_id = $_SESSION["id"];
try {
    $conn = new PDO('mysql:host=localhost;dbname=typensneek', $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //replace user id = "2" with session user ID.
    
    $stmt = $conn->prepare("SELECT voornaam, achternaam, chat_message, timestamp FROM chat_message INNER JOIN gebruikers ON chat_message.from_user_id = gebruikers.ID WHERE from_user_id='$user_id' OR to_user_id='$user_id'");
    
    $stmt->execute();

    //set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}   
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
    <!-- Get time when page loads -->
    <form action="process.php" method="post">
    <?php $datenow = (date("Y-m-d H:i:s")); echo $datenow . "<br>";
    
    ?>
        <input type="hidden" name="chat_message_id" value=""/>
        <!--replace value 1 with admin's user ID. -->
        <input type="hidden" name="to_user_id" value="15">
        <!--replace user id = "2" with session user ID. -->
        <input type="hidden" name="from_user_id" value="<?php echo $_SESSION["id"]; ?>">
        <!-- Pattern blocks 'empty' form. Must have at least one non-whitespace character-->
        Message: <input type="text" required pattern=".*\S+.*" title="Dit veld mag niet leeg zijn" name="chat_message">
        <input type="hidden" name="timestamp" value="">

        <input type="submit">
    </form>
    <button onClick="window.location.reload();">Haal berichten op</button>
</body>
</html>