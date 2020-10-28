<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--    external css -->
    <link rel="stylesheet" href="css/footer.css">
    <title>Hello, world!</title>
</head>
<body>
<?php
include "include/navbar.php";

$databaseHost = 'localhost';
$databaseName = 'typensneek';
$databaseUsername = 'root';
$databasePassword = '';
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$result = mysqli_query($mysqli, "SELECT Title, Text FROM cms where id=3 ");

while ($user_data = mysqli_fetch_array($result)) {
$title =  $user_data['Title'];
$text = $user_data['Text'];

echo '<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-sm">
            <h4 class="mx-auto">';echo $title;'';echo '</h4>
            <hr>
            <p>   ';echo $text;'';echo '</p>


        </div>
';}
?>
        <div class="col-sm">
            <h4>Voordelen</h4>
            <hr>


        </div>
    </div>
</div>


<?php
require "include/footer.php";
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
