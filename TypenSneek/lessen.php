<?php
session_start();

if ($_SESSION['usertype'] === "admin" || $_SESSION['usertype'] === "user") {

} else {
    header("Location: index.php");
}


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
?>

<html>
<head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--    external css -->
    <link rel="stylesheet" href="css/footer.css">
    <title>TypenSneek</title>
</head>
<body>
<button onclick="window.location.href='index.php'" class="btn btn-primary">Terug</button>

<?php 
    if(isset($_POST['submit'])){
        $result = mysqli_query($conn, "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening FROM progressie WHERE les = 1 AND oefening = 1 AND userID  = "  .$_SESSION['id']);
        echo "
        <div class='col'>
        <div class='table-responsive' > 
        
        <table class='table table-striped'>
        <tr >
        <th scope='col'>Aanslagen per minuut</th>
        <th scope='col'>Woorden per minuut</th>
        <th scope='col'>Tijd</th>
        <th scope='col'>Fouten</th>
        <th scope='col'>Accuraatheid</th>
        <th scope='col'>Les</th>
        <th scope='col'>Oefening</th>
        </div>
        <button type='button' class='close' aria-label='Close' onclick= window.location.href='lessen.php'><span aria-hidden='true'>&times;</span></button>

        </tr>";

        while($row = mysqli_fetch_array($result))
        {
            echo "<form action='adminpage.php' method='POST'>";
            echo "<tr>";
            echo "<td>" . $row['apm'] . "</td>";
            echo "<td>" . $row['wpm'] . "</td>";
            echo "<td>" . $row['tijd'] . "</td>";
            echo "<td>" . $row['fouten'] . "</td>";
            echo "<td>" . $row['accuraatheid'] . "%</td>";
            echo "<td>" . $row['les'] . "</td>";
            echo "<td>" . $row['oefening'] . "</td>";
            echo "</tr>";


          
        }
        
        echo "</table>";
        echo " </form>";
        echo " </div>";
      }

?>



<h2 style="margin-left: 5%; margin-top:2%;">Les 1</h2>
<table class="table" style="width: 60%; margin-left: 5%;">
    <thead>
    <tr>
        <th scope="col">Oefening</th>
        <th scope="col">Resultaat</th>
        <th scope="col">Maken</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td scope="row">1</td>
      <td>	<?php

      $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening FROM progressie WHERE les = 1 AND oefening = 1 AND userID  = "  .$_SESSION['id'];
      $result = $conn->query($sql);

       if (mysqli_num_rows($result) > 0){
       while($row = $result->fetch_assoc()) {
            
       // 98 = 2
       // 99= 3
        
          if($row['accuraatheid'] == 100){

          echo 	" &#11088; &#11088; &#11088;	";

         }else if($row['accuraatheid'] >= 98){
          echo 	"	 &#11088; &#11088; ";
        }else if($row['accuraatheid'] >= 95){

          echo " &#11088;";
        }




      }
    }
       
        ?>
        
  </td>
  
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td>
          <form action="lessen.php" method="post">
          <input type="submit" name="submit" id="1" placeholder="Resultaat">
          </form>
            
          
        
      
      </td>
    </tr>
    <tr>
        <td scope="row">2</td>
        <td> &#11088; &#11088;</td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">3</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">4</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">5</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">6</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">7</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    </tbody>
</table>


<h2 style="margin-left: 5%; margin-top:2%;">Les 2</h2>
<table class="table" style="width: 60%; margin-left: 5%;">
    <thead>
    <tr>
        <th scope="col">Oefening</th>
        <th scope="col">Resultaat</th>
        <th scope="col">Maken</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td scope="row">1</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">2</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">3</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">4</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">5</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">6</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">7</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    </tbody>
</table>


<h2 style="margin-left: 5%; margin-top:2%;">Les 3</h2>
<table class="table" style="width: 60%; margin-left: 5%;">
    <thead>
    <tr>
        <th scope="col">Oefening</th>
        <th scope="col">Resultaat</th>
        <th scope="col">Maken</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td scope="row">1</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">2</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">3</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">4</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">5</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">6</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    <tr>
        <td scope="row">7</td>
        <td></td>
        <td>
            <button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
