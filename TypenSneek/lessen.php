<?php 
session_start();

if($_SESSION['usertype'] === "admin" || $_SESSION['usertype'] === "user" ){

}else{
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
        <link rel="stylesheet" href="style.css">
        <title>TypenSneek</title>
</head>
<body>
<button onclick="window.location.href='index.php'" class="btn btn-primary">Terug</button>

<h2 style="margin-left: 5%; margin-top:2%;">Les 1</h2>
<table class="table" style="width: 60%; margin-left: 5%;" >
  <thead>
    <tr>
      <th scope="col">Oefening</th>
      <th scope="col">Sterren</th>
      <th scope="col">Maken</th>
      <th scope="col">Resultaat</th>
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
      <button type="button" class="btn btn-primary" onclick="">Resultaat</button>
      
      </td>
    </tr>
    <tr>
      <td scope="row">2</td>
      <td>	</td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">3</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
    </tr>
    <tr>
      <td scope="row">4</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
    </tr>
    <tr>
      <td scope="row">5</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
    </tr>
    <tr>
      <td scope="row">6</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
    </tr>
    <tr>
      <td scope="row">7</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
    </tr>
  </tbody>
</table>


<h2 style="margin-left: 5%; margin-top:2%;">Les 2</h2>
<table class="table" style="width: 60%; margin-left: 5%;" >
  <thead>
    <tr>
      <th scope="col">Oefening</th>
      <th scope="col">Sterren</th>
      <th scope="col">Maken</th>
      <th scope="col">Resultaat</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row">1</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">2</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">3</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">4</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">5</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">6</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">7</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
  </tbody>
</table>


<h2 style="margin-left: 5%; margin-top:2%;">Les 3</h2>
<table class="table" style="width: 60%; margin-left: 5%;" >
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
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">2</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">3</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">4</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">5</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">6</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
    <tr>
      <td scope="row">7</td>
      <td></td>
      <td><button type="button" class="btn btn-primary" onclick="window.location.href='DeCursus.php';">Maken</button></td>
      <td></td>
    </tr>
  </tbody>
</table>

</body>
</html>

<?php 
$conn->close();
?>