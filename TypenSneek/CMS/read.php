<?php

$databaseHost = 'localhost';
$databaseName = 'typensneek';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>

<?php

$result = mysqli_query($mysqli, "SELECT * FROM cms ");
?>


<!doctype html>
<html lang="nl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>cms</title>
</head>
<body>
<button type='button' class='btn-outline-danger btn border-2'><a class='nav-link' style='color: black'
                                                                 href='../index.php'>Terug</a></button>
<br>
<br>
<table class="table table-striped">

    <tr>
        <th>ID</th>
        <th>Naam pagina</th>
        <th>Titel</th>
        <th>Tekst</th>
        <th>Optie</th>
    </tr>
    <?php
    while ($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $user_data['id'] . "</td>";
        echo "<td>" . $user_data['NamePage'] . "</td>";
        echo "<td>" . $user_data['Title'] . "</td>";
        echo "<td style='width: 50%'>" . $user_data['Text'] . "</td>";
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a></td></tr>";
    }
    ?>

</table>


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
