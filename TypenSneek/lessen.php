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

<?php 
    if(isset($_POST['submit'])){
        $result = mysqli_query($conn, "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening FROM progressie WHERE userID  = "  .$_SESSION['id']);
       
      
        echo "<div class='container' s> 
        <h2 style='margin-left: 5%; margin-top:2%;'>Voortgang</h2>
        <table class='table table-striped'>
        <tr >
        <th scope='col'>Aanslagen per minuut</th>
        <th scope='col'>Woorden per minuut</th>
        <th scope='col'>Tijd</th>
        <th scope='col'>Fouten</th>
        <th scope='col'>Accuraatheid</th>
        <th scope='col'>Les</th>
        <th scope='col'>Oefening</th>
        <button type='button' class='close' aria-label='Close' onclick= window.location.href='lessen.php'><span aria-hidden='true'>&times;</span></button>

        </tr>";

        while($row = mysqli_fetch_array($result))
        {
            echo "<form action='adminpage.php' method='POST'>";
            echo "<tr>";
            echo "<td>" . $row['apm'] . "</td>";
            echo "<td>" . $row['wpm'] . "</td>";
            echo "<td>" . $row['tijd'] . "s</td>";
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
<table class="table" style="width: 60%; margin-left: 5%;" >
  <thead>
    <tr>
      <th scope="col">Oefening</th>
      <th scope="col">Sterren</th>
      <th scope="col">Maken</th>
    
      <th scope="col">
      
      <form action="lessen.php" method="post">
          <input type="submit" name="submit" id="1" class="btn btn-primary" value="Voortgang">
          </form>
      
      </th>
    

            
    </tr>
  </thead>

  <tbody>
    <tr>
      <td scope="row">1</td>
      <td>	<?php

      $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 1 AND userID  = '$_SESSION[id]'  ";
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

    </tr>
    <tr>
      <td scope="row">2</td>
      <td>	</td>
      <td>
                <?php
              
                        
                        $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 1 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                        $result = $conn->query($sql);
    
                        if (mysqli_num_rows($result) > 0){
                        while($row = $result->fetch_assoc()) {
                              
                        // 98 = 2
                        // 99= 3
                          
                            if($row['Gemaakt'] == 1){
    
                            echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o2.php';>Maken</button>";
    
                          }else{
                            echo "hoi";
                          }
    
                        }
                        }                  
                      

                    
                                     
                    
          
            ?>
        
      
      </td>
    
    </tr>
    <tr>
      <td scope="row">3</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 2 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o3.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">4</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 3 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o4.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">5</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 4 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o5.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">6</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 5 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o6.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">7</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 6 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o7.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">8</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 7 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o8.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">9</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 8 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o9.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">10</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 9 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o10.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">11</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 10 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o11.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">12</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 11 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o12.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">13</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 12 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o13.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">14</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 13 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o14.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">15</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 14 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o15.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">16</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 15 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o16.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">17</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 16 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o17.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">18</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 17 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/l1o18.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
    </tr>
    <tr>
      <td scope="row">19 - Toets</td>
      <td></td>
      <td>
                <?php

                    $sql = "SELECT ProgressieID, apm, wpm, tijd, fouten, accuraatheid, les, oefening, Gemaakt FROM progressie WHERE les = 1 AND oefening = 18 AND userID  = '$_SESSION[id]' LIMIT 1 ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc()) {
                          
                    // 98 = 2
                    // 99= 3
                      
                        if($row['Gemaakt'] == 1){

                        echo 	"<button type='button' class='btn btn-primary' onclick=window.location.href='Lessen/toets1.php';>Maken</button>";

                      }

                    }
                    }
          
            ?>
        
      
      </td>
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